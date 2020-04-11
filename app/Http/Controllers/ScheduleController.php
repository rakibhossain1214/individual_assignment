<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Bus;
use App\Schedule;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
            if($user != null){
            $schedules = DB::table('schedules')->join('buses','buses.id','schedules.b_id')
            ->select('buses.id as bid', 'buses.bname as busname','buses.operator as operator', 'buses.location as location','schedules.*')
            ->get();
            return view('schedules',['schedules'=>$schedules, 'layout'=>'index']);
        }else{
            return redirect('/');
        }
    }

    public function create()
    {
        $user = Auth::user();
        if($user != null){
            $schedules = Schedule::all();
            return view('schedules',['schedules'=>$schedules, 'layout'=>'create']);
        }else{
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'route'=>"required",
            'fare'=>"required",
            'departure'=>"required",
            'arrival'=>"required"
        ]);

        print_r($request->input());

        $user = Auth::user();
        if($user != null){
            $schedule = new Schedule();
            $schedule->route = $request->input('route');
            $schedule->fare = $request->input('fare');
            $schedule->departure = $request->input('departure');
            $schedule->arrival = $request->input('arrival');
            $schedule->b_id = 1;
            $schedule->save();
    
            return redirect('/schedules');
        }else{
            return redirect('/');
        }
       
    }

 
    public function show($id)
    {
        $user = Auth::user();
        if($user != null){
            $schedules = Schedule::all();
            $schedule = Schedule::find($id);

            return view('schedules', ['schedule'=>$schedule, 'schedules'=>$schedules,'layout'=>'show']);
        }else{
            return redirect('/');
        }
        
    }

 
    public function edit($id)
    {
        $user = Auth::user();
        if($user != null){
            $schedules = Schedule::all();
            $schedule = Schedule::find($id);

            return view('schedules', ['schedule'=>$schedule, 'schedules'=>$schedules,'layout'=>'edit']);
        }else{
            return redirect('/');
        }
        
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'route'=>"required",
            'fare'=>"required",
            'departure'=>"required",
            'arrival'=>"required"
        ]);

        print_r($request->input());

        $user = Auth::user();
        if($user != null){
            $schedule = Schedule::find($id);
            $schedule->route = $request->input('route');
            $schedule->fare = $request->input('fare');
            $schedule->departure = $request->input('departure');
            $schedule->arrival = $request->input('arrival');
            $schedule->b_id = 1;
            $schedule->save();
    
            return redirect('/schedules');
        }else{
            return redirect('/');
        }
       
    }

   
    public function destroy($id)
    {
        $user = Auth::user();
        if($user != null){
            $schedule = Schedule::find($id);
            $schedule->delete();
            return redirect('/schedules');
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
