@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

            </div>

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('img/marte.jpg')}}" class="card-img-top" width="100%" alt="Image">
                    <div class="card-body">
                        <p class="card-text">Datos personales:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Dni: {{$participants->dni}}</li>
                            <li class="list-group-item">Nombre: {{$participants->name}}</li>
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
                                    <td> {{$certificado->curso}} </td>
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

