<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Bus;
use App\Schedule;
class ScheduleController extends Controller
{
    
    public function index()
    {
        $schedules = DB::table('schedules')->join('buses','buses.id','schedules.b_id')
        ->select('buses.id as bid', 'buses.bname as busname','buses.operator as operator', 'buses.location as location','schedules.*')
        ->get();
        return view('schedules',['schedules'=>$schedules, 'layout'=>'index']);
    }

    public function create()
    {
        $schedules = Schedule::all();
        return view('schedules',['schedules'=>$schedules, 'layout'=>'create']);
    }

    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->route = $request->input('route');
        $schedule->fare = $request->input('fare');
        $schedule->departure = $request->input('departure');
        $schedule->arrival = $request->input('arrival');
        $schedule->b_id = 1;
        $schedule->save();

        return redirect('/schedules');
    }

 
    public function show($id)
    {
        $schedules = Schedule::all();
        $schedule = Schedule::find($id);

        return view('schedules', ['schedule'=>$schedule, 'schedules'=>$schedules,'layout'=>'show']);
    }

 
    public function edit($id)
    {
        $schedules = Schedule::all();
        $schedule = Schedule::find($id);

        return view('schedules', ['schedule'=>$schedule, 'schedules'=>$schedules,'layout'=>'edit']);
    }

    
    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);
        $schedule->route = $request->input('route');
        $schedule->fare = $request->input('fare');
        $schedule->departure = $request->input('departure');
        $schedule->arrival = $request->input('arrival');
        $schedule->b_id = 1;
        $schedule->save();

        return redirect('/schedules');
    }

   
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect('/schedules');
    }
}
