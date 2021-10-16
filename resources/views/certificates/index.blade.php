@extends('layouts.app')

@section('content')
    <div class="c-subheader mb-3 pl-3">
        <!-- Breadcrumb-->
        <ol class="breadcrumb border-0 m-0">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a> </li>
            <li class="breadcrumb-item"><a href="{{route('certificates.index')}}">Certificados</a></li>
            <!-- Breadcrumb Menu-->
        </ol>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">


                    <div class="card-header">Listado de certificados</div>
                    <div class="card-body">
                        {!! $dataTable->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('plugins/buttons.server-side.js')}}"></script>

    {!! $dataTable->scripts() !!}
@endpush
