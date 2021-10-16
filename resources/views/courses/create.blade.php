@extends('layouts.app')

@section('content')
    <div class="c-subheader mb-3 pl-3">
        <!-- Breadcrumb-->
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('courses.index')}}">Curso</a></li>
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
                        <form class="form-participants" method="POST" action="{{route('courses.store')}}">
                            @csrf
                            <div class="card">
                                <div class="card-header">Crear Curso</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                               <i class="fa fa-user"></i>
                                </span>
                                                </div>
                                                <select name="trainer_id" id="trainer_id" class="form-control select2">
                                                    <option value="">Selecionar profesor</option>
                                                    @foreach($trainers as $trainer)
                                                        <option
                                                            value="{{$trainer->id}}" {{old('trainer_id') == $trainer->id ? 'selected':'' }}>{{$trainer->firstname}} {{$trainer->lastname}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                                   <i class="fa fa-list-alt"></i>
                                                    </span>
                                                </div>
                                                <select name="type" id="type"
                                                        class="form-control">
                                                    <option value="">Selecionar Tipo</option>
                                                    <option
                                                        value="Capacitación">Capacitación
                                                    </option>
                                                    <option
                                                        value="Curso">Curso
                                                    </option>
                                                </select>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                                   <i class="fa fa-list-alt"></i>
                                                    </span>
                                                </div>
                                                <select name="category_id" id="category_id"
                                                        class="form-control select2">
                                                    <option value="">Selecionar categoría</option>
                                                    @foreach($categories as $category)
                                                        <option
                                                            value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected':'' }}>{{$category->name}}</option>
                                                    @endforeach
                                                </select>


                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-certificate"></i>
                                </span>
                                                </div>
                                                <input type="text" name="curso" placeholder="Nombre del curso"
                                                       class="form-control"
                                                       id="curso">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                               <i class="fa fa-clock-o"></i>
                                </span>
                                                </div>
                                                <input type="number" name="time" placeholder="Duración"
                                                       class="form-control"
                                                       id="time">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                               <i class="fa fa-clock-o"></i>
                                </span>
                                                </div>
                                                <select name="extension" id="extension" class="form-control">
                                                    <option value="Minuto(s)">Minuto(s)</option>
                                                    <option value="Hora(s)">Hora(s)</option>
                                                    <option value="Días(s)">Días(s)</option>
                                                    <option value="Semana(s)">Semanas(s)</option>
                                                    <option value="Meses(s)">Meses(s)</option>
                                                </select>


                                            </div>
                                        </div>
                                    </div>


                                    <button class="btn btn-block btn-primary" type="submit">Crear Curso</button>
                                </div>
                            </div>


                        </form>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
//Initialize Select2 Elements
            $('.select2').select2();
        });

    </script>
@endpush
