<?php

namespace Hoska\Http\Controllers\Dashboard\Currency;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hoska\Currency;
use Hoska\Http\Controllers\Controller;
use Hoska\Http\Requests\Currency\CreateCurrencyRequest;
use Hoska\Http\Requests\Currency\UpdateCurrencyRequest;
use Hoska\Repositories\Currency\CurrencyRepository;

class CurrencyController extends Controller
{
    /**
     * @var CurrencyRepository
     */
    private $currencies;

    /**
     *CurrencyController constructor.
     * @param CurrencyRepository $currencies
     */
    public function __construct(CurrencyRepository $currencies)
    {
        $this->currencies = $currencies;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('dashboard.currency.index',['currencies' =>$this->currencies->paginate($perPage = 20, $request->search)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $edit = false;

        return view('dashboard.currency.add-edit', compact('edit'));
    }

    /**
     * @param CreateCurrencyRequest $request
     * @return mixed
     */

    public function store(CreateCurrencyRequest $request)
    {
        $data =$request->all();

        $this->currencies->create($data);

        return redirect()->route('currencies.index')
            ->withSuccess(trans('تمت عملية إنشاء العملة بنجاح'));
    }

    /**
     * @param Currency $currency
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Currency $currency)
    {
        $edit = true;

        return view('dashboard.currency.add-edit', compact('edit', 'currency'));
    }

    /**
     * @param Currency $currency
     * @param UpdateCurrencyRequest $request
     * @return mixed
     */
    public function update(Currency $currency, UpdateCurrencyRequest $request)
    {
         $data =$request->all();
        $this->currencies->update($currency->id, $data);

        return redirect()->route('currencies.index')
            ->withSuccess(trans('تمت عملية التحديث بنجاح'));
    }


    /**
     * @param Currency $currency
     */
    public function destroy(Currency $currency)
    {


    }
}
