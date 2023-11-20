<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Salesman;
use App\Models\SalesmanHasProviders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesmanHasProvidersController extends Controller
{
    public function index()
    {
        return view('sp.index', ['salesman_has_providers' => DB::table('salesman_has_providers')->paginate(10)]);
    }

    public function add()
    {
        $providers = Provider::all();
        $salesmans = Salesman::all();
        return view('sp.add', compact('salesmans', 'providers'));
    }

//    public function del($id)
//    {
//        Sprav::find($id)->delete();
//        $blosks = Blocks::all();
//        return view('main.index', compact('blosks'));
//    }

    public function store(Request $request)
    {
        // проверяет на ошибки
        $this->validate($request, [
            'salesman_id' => 'required',
            'provider_id' => 'required',
        ]);
        // добавляет в базу данных данные из формы
        $salesman = SalesmanHasProviders::create([
            'salesman_id' => $request->salesman_id,
            'provider_id' => $request->provider_id,
        ]);

        return redirect('/sp');
    }
}
