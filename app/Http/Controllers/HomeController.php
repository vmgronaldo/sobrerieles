<?php

namespace App\Http\Controllers;

use App\Certificates;
use App\Course;
use App\Participants;
use App\Trainer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $certificados = Certificates::all()->count();
        $cursos = Course::all()->count();
        $profesores = Trainer::all()->count();
        $participantes = Participants::all()->count();
        return view('home',compact('certificados','cursos','profesores','participantes'));

    }
}
