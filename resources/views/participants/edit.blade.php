@extends('layouts.app')

@section('content')
    <div class="c-subheader mb-3 pl-3">
        <!-- Breadcrumb-->
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('participants.index')}}">Participante</a></li>
            <li class="breadcrumb-item active">Crear</li>
            <!-- Breadcrumb Menu-->
        </ol>
    </div>
    @include('flash::message')
    <div class="container">
        <div class="row justify-content-center">

            @if ($errors->any())
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            @endif

            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <form class="form-participants" method="POST"
                              action="{{route('participants.update',$participant->id)}}">
                            {{csrf_field()}} {{method_field('PUT')}}
                            <div class="card">
                                <div class="card-header">Actualizar participante</div>
                                <div class="card-body">
                                    <div class="">
                                        <select name="tipo" id="tipo" class="form-control mb-3">
                                            @if ($participant->tipo === "DNI")
                                                <option value="DNI" selected>DNI</option>
                                                <option value="RUC">RUC</option>
                                                <option value="C.E">C.E</option>
                                                <option value="PASAPORTE">PASAPORTE</option>
                                            @elseif ($participant->tipo === "RUC")
                                                <option value="DNI">DNI</option>
                                                <option value="RUC" selected>RUC</option>
                                                <option value="C.E">C.E</option>
                                                <option value="PASAPORTE">PASAPORTE</option>
                                            @elseif ($participant->tipo === "C.E")
                                                <option value="DNI">DNI</option>
                                                <option value="RUC">RUC</option>
                                                <option value="C.E" selected>C.E</option>
                                                <option value="PASAPORTE">PASAPORTE</option>
                                            @else
                                                <option value="DNI">DNI</option>
                                                <option value="RUC">RUC</option>
                                                <option value="C.E">C.E</option>
                                                <option value="PASAPORTE" selected>PASAPORTE</option>
                                            @endif

                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                </span>
                                        </div>
                                        <input type="text" placeholder="Codigo DNI:" name="dni"
                                               value="{{old('dni',$participant->dni)}}" max="8" maxlength="8"
                                               class="form-control" id="dni" aria-describedby="dni">

                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                </span>
                                        </div>
                                        <input type="text" name="firstname"
                                               value="{{old('firstname',$participant->firstname)}}"
                                               placeholder="Nombre(s)" class="form-control" id="firstname">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                </span>
                                        </div>
                                        <input type="text" name="lastname"
                                               value="{{old('lastname',$participant->lastname)}}"
                                               placeholder="Apellido(s)" class="form-control" id="lastname">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                               <i class="fa fa-user"></i>
                                </span>
                                        </div>
                                        <input type="email" name="email" placeholder="Email"
                                               value="{{old('email',$participant->email)}}" class="form-control"
                                               id="email">
                                    </div>


                                    <button class="btn btn-block btn-primary" type="submit">Actualizar Participante
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection

