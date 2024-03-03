<?php

namespace Modules\Company\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Company\Repositories\CompanyRepository;

//csv
use Illuminate\Support\Facades\Response as LaravelResponse;
use Illuminate\Support\Facades\Storage;
use League\Csv\Writer;
use App\Models\User;

class CompanyController extends Controller
{

    private $company;

    function __construct(CompanyRepository $company)
    {
        $this->company= $company;
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->company->getDatatables()->datatables($request);
        }
        return view("company::index")->with([
            "columns" => $this->company->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('company::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('company::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('company::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }



    public function download()
    {
        $user = auth()->user();

        if ($user->hasRole('Company')) {
            $data = User::select('id', 'first_name', 'last_name', 'email', 'phone')
            ->where('company_id', $user->company_id)
            ->get();
        } else {
            $data = User::select('id', 'first_name', 'last_name', 'email', 'phone')->get();
        }

        $csv = Writer::createFromFileObject(new \SplTempFileObject());

        // Add CSV header
        $csv->insertOne(['id','first_name','last_name','email','phone']); // Replace with your actual column names

        // Add data to CSV
        foreach ($data as $row) {
            $csv->insertOne($row->toArray());
        }

        $filename = 'data.csv';

        return LaravelResponse::make($csv->output(), 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}
