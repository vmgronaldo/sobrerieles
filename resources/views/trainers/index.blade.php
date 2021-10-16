@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">Listado de profesores</div>
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
