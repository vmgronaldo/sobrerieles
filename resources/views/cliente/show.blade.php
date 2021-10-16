@extends('layouts.cliente')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-5">

            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('images/backing-peru-sobrev2-1.jpg')}}" class="card-img-top" width="100%" alt="Image">
                    <div class="card-body">
                        <p class="card-text">Datos personales:</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-none">{{$participants->tipo}}: {{$participants->dni}}</li>
                            <li class="list-group-item">Nombre(s): {{$participants->firstname}} {{$participants->lastname}}</li>
                            <li class="list-group-item ">Email: {{$participants->email}}</li>
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
                                <th>Ver Certificado</th>
                                <th>Descargar</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($participants->certificates as $certificado )
                                <tr>
                                    <td>{{$certificado->id}} </td>
                                    <td> {{$certificado->course->curso}} </td>
                                    <td>{{$certificado->created_at}}</td>
                                    <td> <a target="_blank" href="{{route('certificados.show',$certificado->id)}}" class="btn btn-primary"><i class="fa fa-address-card mr-1" aria-hidden="true"></i>  Ver Certificado</a></td>
                                    <td> <a  href="{{route('certificados.show',$certificado->id)}}" class="btn btn-primary" title="Certificado_{{$participants->firstname}}_{{$participants->lastname}}" download><i class="fa fa-download mr-1" aria-hidden="true"></i>  Descargar</a></td>

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

