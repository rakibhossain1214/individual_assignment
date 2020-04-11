<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Bus;
use App\User;
use Illuminate\Support\Facades\Auth;


class BusController extends Controller
{
    
    public function index()
    {
        // $buses = Bus::all();
        $user = Auth::user();
        if($user != null){
            $buses = DB::table('buses')->join('users','users.id','buses.m_id')
            ->select('users.id as uid', 'users.name as manager','buses.*')
            ->get();
            return view('buses',['buses'=>$buses, 'layout'=>'index']);
        }else{
            return redirect('/');
        }
       
    }

    
    public function create()
    {
        $user = Auth::user();
        if($user != null){
            $buses = Bus::all();
            return view('buses',['buses'=>$buses, 'layout'=>'create']);
        }else{
            return redirect('/');
        }
        
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'bname'=>"required",
            'location'=>"required",
            'company'=>"required",
            'operator'=>"required",
            'seat_row'=>"required",
            'seat_column'=>"required"
        ]);

        print_r($request->input());

        $user = Auth::user();
        if($user != null){
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
        }else{
            return redirect('/');
        }
        
    }

    
    public function show($id)
    {
        $user = Auth::user();
        if($user != null){
            $buses = Bus::all();
            $bus = Bus::find($id);
    
            return view('buses', ['bus'=>$bus, 'buses'=>$buses,'layout'=>'show']);
        }else{
            return redirect('/');
        }
       
    }

    
    public function edit($id)
    {
        $user = Auth::user();
        if($user != null){
            $buses = Bus::all();
            $bus = Bus::find($id);
    
            return view('buses', ['bus'=>$bus, 'buses'=>$buses,'layout'=>'edit']);
        }else{
            return redirect('/');
        }
       
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'bname'=>"required",
            'location'=>"required",
            'company'=>"required",
            'operator'=>"required",
            'seat_row'=>"required",
            'seat_column'=>"required"
        ]);

        print_r($request->input());
        
        $user = Auth::user();
        if($user != null){
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
        }else{
            return redirect('/');
        }
       
    }

    
    public function destroy($id)
    {
        $user = Auth::user();
        if($user != null){
            $bus = Bus::find($id);
            $bus->delete();
            return redirect('/buses');
        }else{
            return redirect('/');
        }
        
    }

    public function search(Request $request)
    {
        $request->validate([
            'search'=>"required"
        ]);

        print_r($request->input());

        $user = Auth::user();
        if($user != null){
            if($request->search){
                $searchs = DB::table('buses')
                ->where('name','like','%'.$request->search.'%')
                ->orWhere('location','like','%'.$request->search.'%')
                ->get();
    
                if($searchs){
                    foreach($searches as $key => $search){
                        echo '<tr><td>'.$search->name.'</td><tr>'.'<td>'.$search->location.'</td></tr>';
                    }
                }
            }
        }else{
            return redirect('/');
        }
        
    }

}
