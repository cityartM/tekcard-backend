<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\TestRequest;
use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\UserRepository;
use App\Support\Enum\BannerType;
use App\Support\Enum\UserStatus;
use App\Support\Plugins\Cards;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Modules\Card\Models\Card;
use Modules\Card\Repositories\CardContactRepository;
use Modules\Plan\Models\Plan;
use Modules\Plan\Repositories\UserPlanRepository;
use Modules\Plan\Support\Enum\PlanDuration;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * @var UserRepository
     */
    private $users;

    /**
     * @var RoleRepository
     */
    private $roles;
    private $userPlans;
    private $cardContacts;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $users,UserPlanRepository $userPlans,CardContactRepository $cardContacts)
    {
        $this->users = $users;
        $this->userPlans = $userPlans;
        $this->cardContacts = $cardContacts;
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(RegisterRequest $request)
    {
        
        $user = User::create(
            array_merge($request->validFormData(),
                ['role' => BannerType::USER,
                'status'=> UserStatus::ACTIVE,
                'email_verified_at'=> Carbon::now()
            ])
        );
        $message = setting('reg_email_confirmation')
            ? __('Your account is created successfully! Please confirm your email.')
            : __('Your account is created successfully!');

        

        \Auth::login($user);

        return redirect('/dashboard')->with('success', $message);
    }


    public function registerUserFromShareCard(Request $request)
    {
        $role = Role::where('name', 'User')->first();


        $user = $this->users->create(
            [
                'role_id' => $role->id,
                'password' => Hash::make('password123'),
                'username' => $request->username,
                'email' => $request->email,
                'status'=>UserStatus::UNCONFIRMED,
                'avatar' => null,
                'device_token' => $request->device_token ?? '',
                'device_id' => $request->device_id ?? '',
                'device_name' => $request->device_name ?? '',
                'brand' => $request->brand ?? '',
                'app_version' => $request->app_version ?? '',
                'os' => $request->os ?? '',
                'currency_id' => $request->currency_id ?? null,
                'free_days' => (int) setting('free_days'),
                'timezone' => $request->timezone ?? null,
                //'email_verified_at' => Carbon::now()->format('Y-m-d'),
            ]
        );

        $plan = Plan::where([
            'type' =>'Client' ,
            'price' => 0
        ])->first();

        $dataPlan = [
            'display_name'=> $plan->getTranslations('display_name'),
            'type' => $plan->type,
            'duration' => $plan->duration,
            'purchase_date' => now()->format('Y-m-d'),
            'expired_date' => $plan->duration == PlanDuration::YEARLY ? now()->addYear()->format('Y-m-d') : now()->addMonth()->format('Y-m-d'),
            'price' => $plan->price,
            'nbr_user' => $plan->nbr_user,
            'nbr_card_user' => $plan->nbr_card_user,
            'has_dashboard' => $plan->has_dashboard,
            'has_video' => $plan->has_video ?? 0,
            'has_pdf' => $plan->has_pdf ?? 0,
            'has_multiple_image' => $plan->has_multiple_image ?? 0,
            'has_water_mark' => $plan->has_water_mark ?? 0,
            'has_share_offline' => $plan->has_share_offline ?? 0,
            'share_with_image' => $plan->share_with_image ?? 0,
            'has_scan_ia' => $plan->has_scan_ia ?? 0,
            'has_group_contact' => $plan->has_group_contact ?? 0,
            'has_scan_location' => $plan->has_scan_location ?? 0,
            'has_note_contact' => $plan->has_note_contact ?? 0,
            'has_statistic' => $plan->has_statistic ?? 0,
            'features' => $plan->features,
            'user_id' => $user->id,
            'plan_id' => $plan->id,
        ];


        $this->userPlans->create($dataPlan);

        $card = Card::where('reference', $request->reference)->first();

        $dataContact['card_id'] = $card->id;
        $dataContact['user_id'] = $user->id;
        $dataContact['group'] = "Peoples";
        $dataContact['type'] = "Work";
        $this->cardContacts->create($dataContact);

        Mail::to($request->email)->send(new \App\Mail\UserRegistered($user,'password123'));

        return back()->with('success', 'Message sent successfully!');
    }

    
}
