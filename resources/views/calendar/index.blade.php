
@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <calendar-component user="{{auth()->id()}}"> </calendar-component>
        </div>
    </section>
@endsection


@push('scripts')

    <script>
        (function (w) {
            w.ViewManager.run("calendar")
        })(window);
        $(document).ready(function () {
//Initialize Select2 Elements
            $('.select2').select2();
        });

    </script>
@endpush
