<?php

namespace App\Http\Controllers;

use App\Calendar;
use App\Course;
use App\Http\Resources\CalendarReusorce;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('calendar.index');
    }

    public function allCalendar()
    {
        $data = Calendar::all();
        //return response()->json($data);
        //return response()->json(CalendarReusorce::collection(Calendar::query()->where('user_id','=',Auth::id())->get()));
        //return response()->json(collect($data));
        $events = $data->map(function ($item, $key) {
            return array(
                'id' => $item->id,
                'title' => $item->event_name,
                'start' => optional($item->start_date)->format('Y-m-d')  ,
                'end' =>  optional($item->fecha_fin)->format('Y-m-d'),
                'course_id' => $item->course_id,
            );
        });

        return response()->json($events);

    }
    public function allCourse()
    {
        $data = Course::all();

        $events = $data->map(function ($item, $key) {
            return array(
                'id' => $item->id,
                'curso' => $item->curso,
                'type' => $item->type,
            );
        });

        return response()->json($events);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //return $request;
        $rules = [
            'course_id' => 'required',
            'event_name' => 'required',
            'start_date' => 'required',
        ];
        $messages = [
            'event_name.required' => 'El titulo es requerido',
            'start_date.required' => 'Fecha inicio requerido',
        ];

        $request->validate($rules, $messages);
        //$new_calendar = Calendar::create($request->all());


        $data=$request->all();

        if ($request->get("fecha_fin") == null) {
            $data["fin"] = 0;
        }else{
            $data["fin"] = 1;
        }

        $new_calendar = Calendar::create($data);

        return response()->json([
            'data' => new CalendarReusorce($new_calendar),
            'message' => 'Successfully added new event!',
            'status' => Response::HTTP_CREATED
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Calendar $calendar)
    {
        return response($calendar, Response::HTTP_OK);
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
    public function update(Request $request,Calendar $calendar)
    {


        $data=$request->all();

        if ($request->get("fecha_fin") == null) {
            $data["fin"] = 0;
        }else{
            $data["fin"] = 1;
        }



        $calendar->update($data);
        return response()->json([
            'data' => new CalendarReusorce($calendar),
            'message' => 'Successfully updated event!',
            'status' => Response::HTTP_ACCEPTED
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calendar $calendar)
    {
        $calendar->delete();
        return response('Event removed successfully!', Response::HTTP_NO_CONTENT);
    }
}
