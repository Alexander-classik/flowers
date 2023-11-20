<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use App\Models\Provider;
use App\Models\Salesman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProviderController extends Controller
{

    public function index()
    {
        return view('provider.index', ['provider' => DB::table('provider')->paginate()]);
    }

    public function show($id){
        $flower = Flower::all();
        return view('provider.show', ['provider' => Provider::findOrFail($id)], compact('flower', 'salesman'));
    }

    public function search(Request $request)
    {
        $s = $request->s;
        $provider = Provider::where('name', 'LIKE', "%{$s}%")->orderBy('name')->paginate();
        return view('provider.search', compact('provider'));
    }

    public function add()
    {
        return view('provider.add');
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
            'name' => 'required',
            'phone' => 'required',
        ]);
        // добавляет в базу данных данные из формы
        $provider = Provider::create([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect('/provider');
    }
}
