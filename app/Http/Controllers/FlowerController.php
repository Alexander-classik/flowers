<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use App\Models\Provider;
use App\Models\SalesmanHasProviders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FlowerController extends Controller
{

    public function index()
    {
        $flower = Flower::all();
        return view('main.index', compact('flower'));
    }

    public function show($id){
        $salesman = DB::table('salesman')
            ->join('salesman_has_providers', 'salesman_has_providers.salesman_id', '=', 'salesman.id')
            ->join('provider_has_flowers', 'salesman_has_providers.provider_id', '=', 'provider_has_flowers.provider_id')
            ->where('provider_has_flowers.flower_id', '=', $id)->get();
//        $salesman = SalesmanHasProviders::all()->join('', '')
        return view('flower.show', ['flower' => Flower::findOrFail($id)], compact('salesman'));
    }

    public function search(Request $request)
    {
        $s = $request->s;
        $flower = Flower::where('country', 'LIKE', "%{$s}%")->orderBy('name')->paginate();
        return view('flower.search', compact('flower'));
    }

    public function search_date(Request $request)
    {
        $begin_date = $request->begin_date;
        $end_date = $request->end_date;
        $dates = Flower::where('end_date', '>=', $begin_date)->where('begin_date', '<=', $end_date)->orderBy('name')->paginate();
        return view('flower.search_date', compact('dates'));
    }

    public function add()
    {
        $flower = Flower::all();
        return view('flower.add', compact('flower'));
    }

//    public function del($id)
//    {
//        CarModel::find($id)->delete();
//        $blosks = Blocks::all();
//        return view('main.index', compact('blosks'));
//    }

    public function store(Request $request)
    {
        // проверяет на ошибки
        $this->validate($request, [
            'name' => 'required',
            'color'=> 'required',
            'begin_date'=> 'required',
            'end_date'=> 'required',
            'country'=> 'required',
            'price'=> 'required',
            'img' => '|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $imagePath = $request->hasFile('img')
            ? $request->file('img')->store('flowers_img', 'public')
            : 'default/default.jpg';

        // добавляет в базу данных данные из формы
        $main = Flower::create([
            'name' => $request->name,
            'color' => $request->color,
            'begin_date' => $request->begin_date,
            'end_date' => $request->end_date,
            'country' => $request->country,
            'price' => $request->price,
            'img' => $imagePath
        ]);

        return redirect()->route('/');
    }
}
