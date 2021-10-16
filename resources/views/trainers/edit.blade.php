@extends('layouts.app')

@section('content')
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
                        <form class="form-participants"  enctype="multipart/form-data"  method="POST" action="{{route('trainers.update',$trainer->id)}}">
                            {{csrf_field()}} {{method_field('PUT')}}

                            <div class="card">
                                <div class="card-header">Editar profesor</div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                </span>
                                        </div>
                                        <input type="text" placeholder="Codigo DNI:" name="dni" max="8" maxlength="8"
                                               class="form-control" id="dni" value="{{old('dni',$trainer->dni)}}" aria-describedby="dni">

                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                </span>
                                        </div>
                                        <input type="text" name="firstname" value="{{old('firstname',$trainer->firstname)}}"  placeholder="Nombre(s)" class="form-control"
                                               id="firstname">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                </span>
                                        </div>
                                        <input type="text" name="lastname" value="{{old('lastname',$trainer->lastname)}}"  placeholder="Apellido(s)"
                                               class="form-control" id="lastname">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                       <i class="fa fa-envelope"></i>
                                                    </span>
                                        </div>
                                        <input type="email" value="{{old('email',$trainer->email)}}" name="email" placeholder="Email" class="form-control"
                                               id="email">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                       <i class="fa fa-envelope"></i>
                                                    </span>
                                        </div>
                                        <input type="text" name="profesion" value="{{old('profesion',$trainer->profesion)}}" placeholder="Profesión" class="form-control"
                                               id="profesion">
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                       <i class="fa fa-envelope"></i>
                                                    </span>
                                        </div>
                                        <input type="text" name="cip" value="{{old('cip',$trainer->cip)}}" placeholder="CIP (Opcional)" class="form-control"
                                               id="cip">
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firma">Firma</label>
                                            <input
                                                class="file-upload {{ $errors->has('firma') ? 'is-invalid' : '' }} "
                                                name="firma" id="firma" type="file" accept="image/*"/>
                                            {!! $errors->first('image',' <span id="titulo-error" class="error invalid-feedback" style="display:flex">:message</span>')!!}
                                        </div>
                                    </div>

                                    <img src="{{asset($trainer->firma)}}" width="100" height="80" alt="" class="mb-2">

                                    <button class="btn btn-block btn-primary" type="submit">Actualizar profesor</button>
                                </div>
                            </div>


                        </form>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection

