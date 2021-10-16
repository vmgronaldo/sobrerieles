<?php

namespace App\Http\Controllers;

use App\Course;
use App\Categories;
use App\DataTables\CoursesDatatable;
use App\Trainer;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CoursesDatatable $datatable)
    {
        return $datatable->render('courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        $trainers = Trainer::all();
        return view('courses.create',compact('categories','trainers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "curso" => "required",
            "type" => "required",
        ]);

        //return $request;
        $data = $request->all();

        $course = Course::create($data);

        return redirect()->route("courses.index")->withFlash("Curso registrado");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $categories = Categories::all();
        $trainers = Trainer::all();
        return view('courses.edit', compact('course','categories','trainers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            "curso" => "required",
            "type" => "required",
        ]);

        $data = $request->all();

        $course->update($data);

        return redirect()->route("courses.edit", $course)->withFlash("Curso Actualizado");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
