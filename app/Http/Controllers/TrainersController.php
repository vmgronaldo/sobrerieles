<?php

namespace App\Http\Controllers;

use App\DataTables\TrainersDatatable;
use App\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TrainersDatatable $datatable)
    {
        return $datatable->render('trainers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
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
            "firstname" => "required",
            "lastname" => "required",
            "profesion" => "required",
            "firma" => "required",
            "dni" => "required|max:8|unique:trainers",
            "email" => "required|email|unique:trainers",

        ]);

        $data = $request->all();

        if ($request->hasFile("firma")) {
            $urlimage = $request->file("firma")->store("firmas","public");
            $data["firma"] = Storage::url($urlimage);
        } else {
            unset($data["image"]);
        }

        $trainer = Trainer::create($data);

        return redirect()->route("trainers.index")->withFlash("Trainer registrado");


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
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit', compact('trainer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        $data = $request->all();
        if ($request->hasFile("firma")) {
            $urlimage = $request->file("firma")->store("firmas","public");
            $data["firma"] = Storage::url($urlimage);
        } else {
            unset($data["image"]);
        }
        $trainer->update($data);

        return redirect()->route("trainers.edit", $trainer)->withFlash("Trainer Actualizado");


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
