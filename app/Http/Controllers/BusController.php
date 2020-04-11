<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Bus;
use App\User;
class BusController extends Controller
{
    
    public function index()
    {
        // $buses = Bus::all();

        $buses = DB::table('buses')->join('users','users.id','buses.m_id')
        ->select('users.id as uid', 'users.name as manager','buses.*')
        ->get();
        return view('buses',['buses'=>$buses, 'layout'=>'index']);
    }

    
    public function create()
    {
        $buses = Bus::all();
        return view('buses',['buses'=>$buses, 'layout'=>'create']);
    }

    
    public function store(Request $request)
    {
        $bus = new Bus();
        $bus->bname = $request->input('bname');
        $bus->location = $request->input('location');
        $bus->company = $request->input('company');
        $bus->operator = $request->input('operator');
        $bus->seat_row = $request->input('seat_row');
        $bus->seat_column = $request->input('seat_column');
        $bus->m_id = 2;
        $bus->save();

        return redirect('/buses');
    }

    
    public function show($id)
    {
        $buses = Bus::all();
        $bus = Bus::find($id);

        return view('buses', ['bus'=>$bus, 'buses'=>$buses,'layout'=>'show']);
    }

    
    public function edit($id)
    {
        $buses = Bus::all();
        $bus = Bus::find($id);

        return view('buses', ['bus'=>$bus, 'buses'=>$buses,'layout'=>'edit']);
    }

    
    public function update(Request $request, $id)
    {
        $bus = Bus::find($id);
        $bus->bname = $request->input('bname');
        $bus->location = $request->input('location');
        $bus->company = $request->input('company');
        $bus->operator = $request->input('operator');
        $bus->seat_row = $request->input('seat_row');
        $bus->seat_column = $request->input('seat_column');
        $bus->m_id = 2;
        $bus->save();

        return redirect('/buses');
    }

    
    public function destroy($id)
    {
        $bus = Bus::find($id);
        $bus->delete();
        return redirect('/buses');
    }
}
