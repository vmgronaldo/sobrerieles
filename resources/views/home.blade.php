@extends('layouts.app')

@section('content')

    <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="card text-white bg-gradient-primary">
                                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="text-value-lg">{{$certificados}}</div>
                                            <div>Certificados</div>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="c-icon">
                                                    <use xlink:href="{{asset('assets/sprites/free.svg')}}"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                                        </div>
                                    </div>
                                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                        <canvas class="chart" id="card-chart1" height="70"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                            <div class="col-sm-6 col-lg-3">
                                <div class="card text-white bg-gradient-info">
                                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="text-value-lg">{{$participantes}}</div>
                                            <div>Participantes</div>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="c-icon">
                                                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-settings"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                                        </div>
                                    </div>
                                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                        <canvas class="chart" id="card-chart2" height="70"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                            <div class="col-sm-6 col-lg-3">
                                <div class="card text-white bg-gradient-warning">
                                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="text-value-lg">{{$cursos}}</div>
                                            <div>Cursos / Capacitaciones</div>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="c-icon">
                                                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-settings"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                                        </div>
                                    </div>
                                    <div class="c-chart-wrapper mt-3" style="height:70px;">
                                        <canvas class="chart" id="card-chart3" height="70"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                            <div class="col-sm-6 col-lg-3">
                                <div class="card text-white bg-gradient-danger">
                                    <div class="card-body card-body pb-0 d-flex justify-content-between align-items-start">
                                        <div>
                                            <div class="text-value-lg">{{$profesores}}</div>
                                            <div>Profesores</div>
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn btn-transparent dropdown-toggle p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg class="c-icon">
                                                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-settings"></use>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a></div>
                                        </div>
                                    </div>
                                    <div class="c-chart-wrapper mt-3 mx-3" style="height:70px;">
                                        <canvas class="chart" id="card-chart4" height="70"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col-->
                        </div>
                    </div>
                </div>
            </main>
            <footer class="c-footer">
                <div><a href="https://coreui.io">Lidera EHSQ</a> &copy; 2020 mevisoft.</div>
                <div class="ml-auto">Powered by&nbsp;<a href="https://coreui.io/">Gabriel Viza.</a></div>
            </footer>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
@endsection
