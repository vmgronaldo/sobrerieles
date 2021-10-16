@extends('layouts.app')

@section('content')
    <div class="c-subheader mb-3 pl-3">
        <!-- Breadcrumb-->
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a> </li>
            <li class="breadcrumb-item"><a href="{{route('certificates.index')}}">Certificados</a></li>
            <li class="breadcrumb-item active">Crear</li>
            <!-- Breadcrumb Menu-->
        </ol>
    </div>
    @include('flash::message')
    <div class="container" id="certificado">
        <a href="{{route("import.create",["certificates"])}}"
           class="btn btn-success">Importar Certificados</a>
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
                        <form class="form-participants" method="POST" action="{{route('certificates.store')}}">
                            @csrf
                            <div class="card">
                                <div class="card-header">Crear Certificado</div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                               <i class="fa fa-calendar"></i>
                                </span>
                                                </div>

                                                <input type="date" name="date" id="date" class="form-control">


                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                               <i class="fa fa-book"></i>
                                </span>
                                                </div>
                                                <select name="course_id" id="course_id" class="form-control select2">
                                                    <option value="">Selecionar Curso</option>
                                                    @foreach($courses as $course)
                                                        <option
                                                            value="{{$course->id}}" {{old('model_id') == $course->id ? 'selected':'' }}>{{$course->curso}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button
                                                type="button"
                                                class="btn btn-secondary mb-3 w-100 d-flex align-items-center justify-content-center"
                                                @click="drawer=true">
                                                <i class="fa fa-user-plus mr-2"></i>
                                                Crear
                                                Participante
                                            </button>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                               <i class="fa fa-user"></i>
                                </span>
                                                </div>
                                                <select name="model_id" id="model_id" ref="model_id_select"
                                                        class="form-control select2">
                                                    <option value="">Selecionar Participante</option>
                                                    @foreach($participants as $participant)
                                                        <option
                                                            value="{{$participant->id}}" {{old('model_id') == $participant->id ? 'selected':'' }}>{{$participant->firstname}} {{$participant->lastname}}</option>
                                                    @endforeach
                                                </select>


                                            </div>

                                        </div>
                                    </div>


                                    <button class="btn btn-block btn-primary" type="submit">Crear Certificado</button>
                                </div>
                            </div>


                        </form>
                    </div>


                </div>
            </div>

        </div>

        @include("certificates.modal.drawer")
    </div>
@endsection

@push('scripts')

    <script>
        (function (w) {
            w.ViewManager.run("certificados")
        })(window)

        $(document).ready(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });

    </script>
@endpush
