@extends('layouts.app')

@section('content')
    <div class="c-subheader mb-3 pl-3">
        <!-- Breadcrumb-->
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a> </li>
            <li class="breadcrumb-item"><a href="{{route('participants.index')}}">Participante</a></li>
            <li class="breadcrumb-item active">{{$participants->id}}</li>
            <!-- Breadcrumb Menu-->
        </ol>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('img/foto-para-certificados-pagina-como-objeto-inteligente-1.png')}}" class="card-img-top" width="100%" alt="Image">
                    <div class="card-body">
                        <p class="card-text">Datos personales:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{$participants->tipo}}: {{$participants->dni}}</li>
                            <li class="list-group-item">Nombre(s): {{$participants->firstname}} {{$participants->lastname}}</li>
                            <li class="list-group-item">Email: {{$participants->email}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Certificados</div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-hover table-outline mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th>ID:</th>
                                <th>Curso</th>
                                <th>Fecha</th>
                                <th>Certificado</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($participants->certificates as $certificado )
                                <tr>
                                    <td>{{$certificado->id}} </td>
                                    <td> {{$certificado->course->curso}} </td>
                                    <td>{{$certificado->created_at}}</td>
                                    <td> <a href="{{route('certificates.show',$certificado->id)}}" class="btn btn-primary"><i class="fa fa-address-card mr-1" aria-hidden="true"></i>  Ver Certificado</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection

