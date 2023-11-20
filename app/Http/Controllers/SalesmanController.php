<?php

namespace App\Http\Controllers;

use App\Models\Salesman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesmanController extends Controller
{
    public function index()
    {
        return view('salesman.index', ['salesman' => DB::table('salesman')->paginate()]);
    }

    public function show($id){
        return view('salesman.show', ['salesman' => Salesman::findOrFail($id)]);
    }

    public function search(Request $request)
    {
        $s = $request->s;
        $salesman = Salesman::where('name', 'LIKE', "%{$s}%")->orderBy('name')->paginate();
        return view('salesman.search', compact('salesman'));
    }

    public function add()
    {
        return view('salesman.add');
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
            'address' => 'required',
        ]);
        // добавляет в базу данных данные из формы
        $salesman = Salesman::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect('/salesman');
    }
}
