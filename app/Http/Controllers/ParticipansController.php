<?php

namespace App\Http\Controllers;

use App\Certificates;
use App\DataTables\ParticipantsDatatable;
use App\Participants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ParticipansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ParticipantsDatatable $datatable)
    {
        return $datatable->render('participants.index');
        //return view('participants.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('participants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            "firstname" => "required",
            "lastname" => "required",
            "dni" => "required|max:8|unique:participants",
            "email" => "required|email|unique:participants",

        ]);

        $data = $request->all();


        $participans = Participants::create($data);

        if($request->expectsJson()){
            return response()->json($participans);
        }

        return redirect()->route("participants.index")->withFlash("Participante registrado");



    }


    public function storeCertificate(Request $request)
    {
        $request->validate([
            "dni" => "required|max:8",
            "firstname" => "required",
            "lastname" => "required",
            "email" => "required|email",

        ]);

        $data = $request->all();

        if (Participants::where('dni', $request->get('dni'))->first()) {
            $user_id = Participants::where('dni', $request->get('dni'))->first();
            $certificates = new Certificates();
            $certificates->model_type = Participants::class;
            $certificates->model_id = $user_id->id;
            $certificates->curso = $request->get('curso');
            $certificates->save();
            return $certificates;
        }else{
            $create = new Participants();
            $create->firstname = $request->get('firstname');
            $create->lastname = $request->get('lastname');
            $create->tipo = $request->get('tipo');
            $create->dni = $request->get('dni');
            $create->email = $request->get('email');
            $create->save();
            $create->certificates()->create($data);
            return $create;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participants = Participants::where('id', $id)->first();
        return view('participants.show',compact('participants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Participants $participant)
    {
        return view('participants.edit', compact('participant'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participants $participant)
    {
        $data = $request->all();

        $participant->update($data);

        return redirect()->route("participants.edit", $participant)->withFlash("Participante Actualizado");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
