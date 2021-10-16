<?php

namespace App\Http\Controllers;


use App\Certificates;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ImprimirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function imprimir(Certificates $certificate){

        /*$certificate = Inmueble::find($id)->published()->distinct()->with('ambiente')
            ->with('operacion')
            ->select("inmuebles.*")->first();*/
        $today = Carbon::now()->format('d/m/Y');
        $ano  = Carbon::now()->format('Y');

        $filename = 'Certificado(s)';
        $pdf = PDF::loadView('certificates.show',['certificate'=>$certificate,'today'=>$today,'filename'=>$filename,'ano'=>$ano])->setPaper('a4', 'portrait');
        return $pdf->stream($filename.'.pdf');

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
        //
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
        //
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
