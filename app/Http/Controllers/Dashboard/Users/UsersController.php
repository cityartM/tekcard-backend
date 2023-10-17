<?php

namespace App\Http\Controllers\Dashboard\Users;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\UserRepository;
use App\Support\Enum\UserStatus;
use App\Models\User;

/**
 * Class UsersController
 * @package Hoska\Http\Controllers
 */
class UsersController extends Controller
{
    /**
     * @var UserRepository
     */
    private $users;

    /**
     * UsersController constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * Display paginated list of all users.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function indexOld(Request $request)
    {
        //dd($request->all());
        $users = $this->users->paginate($perPage = 20, $request->search, $request->status);

        $statuses = ['' => __('All')] + UserStatus::lists();

        return view('dashboard.user.list', compact('users', 'statuses'));
    }

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->users->getDatatables()->datatables($request);
        }
        return view("dashboard.user.list")->with([
            "columns" => $this->users->getDatatables()::columns(),
        ]);
    }

    /**
     * Displays user profile page.
     *
     * @param User $user
     * @return Factory|View
     */
    public function show(User $user)
    {
        return view('dashboard.user.view', compact('user'));
    }

    /**
     * Displays form for creating a new user.
     *
     * @param RoleRepository $roleRepository
     * @return Factory|View
     */
    public function create( RoleRepository $roleRepository)
    {
        return view('dashboard.user.add', [
            'roles' => $roleRepository->lists(),
            'statuses' => UserStatus::lists()
        ]);
    }


    /**
     * Stores new user into the database.
     *
     * @param CreateUserRequest $request
     * @return mixed
     */
    public function store(CreateUserRequest $request)
    {
        // When user is created by administrator, we will set his
        // status to Active by default.
        $data = $request->all() + [
            'status' => UserStatus::ACTIVE,
            'email_verified_at' => now()
        ];


        // Username should be updated only if it is provided.
        if (! data_get($data, 'username')) {
            $data['username'] = null;
        }
        $this->users->create($data);

        return redirect()->route('users.index')
            ->withSuccess(__('User created successfully.'));
    }

    /**
     * Displays edit user form.
     *
     * @param User $user
     * @param RoleRepository $roleRepository
     * @return Factory|View
     */
    public function edit(User $user, RoleRepository $roleRepository)
    {
        return view('dashboard.user.edit', [
            'edit' => true,
            'user' => $user,
           // 'countries' => $this->parseCountries($countryRepository),
            'roles' => $roleRepository->lists(),
            'statuses' => UserStatus::lists(),
            'socialLogins' => $this->users->getUserSocialLogins($user->id)
        ]);
    }

    /**
     * Removes the user from database.
     *
     * @param User $user
     * @return $this
     */
    public function destroy(User $user)
    {
        if ($user->is(auth()->user())) {
            return redirect()->route('users.index')
                ->withErrors(__('You cannot delete yourself.'));
        }

        $this->users->delete($user->id);

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }
}
