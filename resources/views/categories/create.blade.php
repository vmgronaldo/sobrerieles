@extends('layouts.app')

@section('content')
    <div class="c-subheader mb-3 pl-3">
        <!-- Breadcrumb-->
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a> </li>
            <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categoría</a></li>
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
                        <form class="form-participants" method="POST" action="{{route('categories.store')}}">
                            @csrf
                            <div class="card">
                                <div class="card-header">Crear categoria</div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-user"></i>
                                </span>
                                        </div>
                                        <input type="text" name="name" placeholder="Nombre de categoria" class="form-control"
                                               id="name">
                                    </div>

                                    <button class="btn btn-block btn-primary" type="submit">Crear categoria</button>
                                </div>
                            </div>


                        </form>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection

