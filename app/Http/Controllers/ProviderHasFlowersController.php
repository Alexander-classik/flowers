<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Flower;
use App\Models\ProviderHasFlowers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProviderHasFlowersController extends Controller
{
    public function index()
    {
        $provider_has_flowers = DB::table('provider_has_flowers')
            ->join('flower', 'provider_has_flowers.flower_id', '=', 'flower.id')
            ->join('provider', 'provider_has_flowers.provider_id', '=', 'provider.id')
            ->select('flower.name as flower', 'provider.name as provider', 'provider_has_flowers.id as id')
            ->get();
        return view('pf.index', compact('provider_has_flowers'));
    }

    public function add()
    {
        $providers = Provider::all();
        $flowers = Flower::all();
        return view('pf.add', compact('flowers', 'providers'));
    }

    public function del($id)
    {
        ProviderHasFlowers::find($id)->delete();
        $pf = ProviderHasFlowers::all();
        return view('pf.index', compact('pf'));
    }

    public function store(Request $request)
    {
        // проверяет на ошибки
        $this->validate($request, [
            'flower_id' => 'required',
            'provider_id' => 'required',
        ]);
        // добавляет в базу данных данные из формы
        $provider = ProviderHasFlowers::create([
            'flower_id' => $request->flower_id,
            'provider_id' => $request->provider_id,
        ]);

        return redirect('/pf');
    }
}
