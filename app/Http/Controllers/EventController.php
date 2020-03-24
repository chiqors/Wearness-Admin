<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventInstructor;
use App\Instructor;
use Carbon\Carbon;
use Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['instructor'] = Instructor::all();
        return view('page.event.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = Event::all();
        return response()->json($event);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'event_start' => 'required|date|date_format:Y-m-d|before:event_end|',
            'event_end' => 'required|date|date_format:Y-m-d|after:event_start|',
            'desc' => 'required|max:150',                  
            'instructor' => 'required|',
        ]);
  
        if ($v->fails()) {
          $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
        }else{
            $event = Event::create([
                'title' => $request->title,
                'desc' => $request->desc,
                'start' => $request->event_start,
                'end' => Carbon::parse($request->event_end)->addDays(1)->format('Y-m-d'),
                'color' => $request->color,
            ]);
            for ($i=0; $i < count($request->instructor) ; $i++) {                                            
                EventInstructor::create([
                  'event_id' => $event->id,              
                  'instructor_id' => $request->instructor[$i],
                ]);
              }
  
          $arrayName = array('respon' => 'success', 'msg' => 'Saved', 'image' => true, 'data' => $request->all());
        }
  
  
        echo json_encode($arrayName);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $instructor = EventInstructor::where('event_id', $id)->get();
        $id = array();
        $name = array();
        foreach ($instructor as $key => $value) {
            array_push($id, $value->instructor_id);            
            array_push($name, $value->instructor->name);            
        }      
        $arrayName = array('event' => $event, 'instructor' => $id, 'instructor_name' => $name ,'end' => Carbon::parse($event->end)->addDays(-1)->format('Y-m-d'));

        echo json_encode($arrayName);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), [
            'title' => 'required|max:150',
            'event_start' => 'required|date|date_format:Y-m-d|before:event_end|',
            'event_end' => 'required|date|date_format:Y-m-d|after:event_start|',
            'desc' => 'required|max:150',                  
            'instructor' => 'required|',
        ]);
  
        if ($v->fails()) {
          $arrayName = array('respon' => 'error', 'msg' => $v->errors(), 'image' => false, 'data' => $request->all());
        }else{
            $event = Event::where('id', $id)->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'start' => $request->event_start,
                'end' => Carbon::parse($request->event_end)->addDays(1)->format('Y-m-d'),
                'color' => $request->color,
            ]);

            EventInstructor::where('event_id', $id)->delete();

            for ($i=0; $i < count($request->instructor) ; $i++) {                                            
                EventInstructor::create([
                  'event_id' => $id,              
                  'instructor_id' => $request->instructor[$i],
                ]);
              }
  
          $arrayName = array('respon' => 'success', 'msg' => 'Saved', 'image' => true, 'data' => $request->all());
        }
  
  
        echo json_encode($arrayName);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arrayName = array('respon' => 'success', 'msg' => 'Deleted', 'image' => true);
        $device = Event::find($id);            
        $device->delete();  
        echo json_encode($arrayName);
    }
}
