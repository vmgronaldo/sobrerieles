<?php

namespace App\Http\Controllers;

use App\Certificates;
use App\Course;
use App\DataTables\CertificatesDatatable;
use App\Http\Requests\Common\Import as ImportRequest;
use App\Imports\Certificates as Import;
use App\Notifications\SeendCertificates;
use App\Participants;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CertificatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CertificatesDatatable $datatable)
    {
        return $datatable->render('certificates.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $participants = Participants::all();
        $courses = Course::all();
        return view('certificates.create', compact('participants', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        $request->validate([
            "date" => "required",
            "model_id" => "required",
            "course_id" => "required",
        ]);

        //$data = $request->all();
        $user_id = Participants::where('id', $request->get('model_id'))->first();
        $certificate = new Certificates();
        $certificate->model_type = Participants::class;
        $certificate->model_id = $user_id->id;
        $certificate->course_id = $request->get('course_id');
        $certificate->date = $request->get('date');
        $certificate->save();
        $certificate->model->notify(new SeendCertificates(compact('certificate')));

        //return $certificate;
        return redirect()->route("certificates.index")->withFlash("Certificado registrado");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Certificates $certificate)
    {
        /*$certificate = Inmueble::find($id)->published()->distinct()->with('ambiente')
          ->with('operacion')
          ->select("inmuebles.*")->first();*/
        $today = Carbon::now()->format('d/m/Y');
        $ano  = Carbon::now()->format('Y');

        $filename = 'Certificado(s)';

        //return $certificate->model;

       //return view('certificates.show',compact('certificate','today','ano'));
           $pdf = PDF::loadView('certificates.show',['certificate'=>$certificate,'today'=>$today,'filename'=>$filename,'ano'=>$ano])->setPaper('a4', 'landscape');
        return $pdf->stream($filename.'.pdf');
        //return $pdf->download($filename.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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




    /**
     * Import the specified resource.
     *
     * @param  ImportRequest  $request
     *
     * @return Response
     */
    public function import(ImportRequest $request)
    {

    //   return $request;
        Excel::import(new Import(), $request->file('import'));

        $message = "Certfificados importados!";

        flash($message)->success();

        return redirect()->route('certificates.index');
    }


}
