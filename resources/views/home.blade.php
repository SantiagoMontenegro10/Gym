@extends('layouts.app')

@section('content')
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

<style>
    /* ====== ESTILO GENERAL ====== */
    body {
        background: #cfd8ec;
        color: #070707;
    }

    h2 {
        font-weight: 700;
        color: #676786 !important;
    }

    /* ====== TARJETAS ESTADÍSTICAS ====== */
    .statistic-box {
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.35);
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .statistic-box:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.45);
    }

    .statistic-box .number {
        font-size: 36px;
        font-weight: 800;
    }

    .statistic-box .caption div {
        font-size: 13px;
        letter-spacing: 1px;
        opacity: .85;
    }

    .statistic-box.red { background: linear-gradient(135deg, #674646, #b91c1c); }
    .statistic-box.purple { background: linear-gradient(135deg, #31326b, #4338ca); }
    .statistic-box.green { background: linear-gradient(135deg, #22c55e, #15803d); }
    .statistic-box.yellow { background: linear-gradient(135deg, #704803, #b45309); }

    /* ====== FORMULARIO ASISTENCIA ====== */
    .container h2 {
        margin-bottom: 20px;
        color: #e5e7eb;
    }

    .form-control {
        border-radius: 14px;
        border: none;
        background: #57647b;
        color: #e5e7eb;
        box-shadow: inset 0 0 0 1px #435165;
    }

    .form-control::placeholder {
        color: #c4c6c9;
    }

    .form-control:focus {
        background: #b0b9c7;
        color: #fff;
        box-shadow: 0 0 0 2px #4c70a9;
    }

    .btn-primary {
        border-radius: 14px;
        font-weight: 700;
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        border: none;
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(37,99,235,.4);
    }

    /* ====== TABLAS ====== */
    .table {
        background: #020617;
        border-radius: 14px;
        overflow: hidden;
    }

    .table thead th {
        background: #020617 !important;
        color: #93c5fd;
        border-bottom: 1px solid #1e293b;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .table tbody tr {
        transition: background .2s ease;
    }

    .table tbody tr:hover {
        background: #020617;
    }

    .table td {
        color: #e5e7eb;
        border-top: 1px solid #1e293b;
    }

    /* ====== BLOQUES DE ALERTA ====== */
    .alert {
        border-radius: 14px;
        font-weight: 600;
    }

    .alert-success {
        background: #14532d;
        color: #bbf7d0;
        border: none;
    }

    .alert-danger {
        background: #f80e0e;
        color: #e6dbdb;
        border: none;
    }

    .alert-warning {
        background: #ff0909;
        color: #f2f1ee;
        border: none;
    }

    /* ====== OTROS ====== */
    .block {
        background: #7aa6ec;
        border-radius: 14px;
        padding: 15px;
    }

    .danger {
        color: #f87171 !important;
        font-weight: 800;
    }

/* Encabezado Miembros por renovar */
.table thead th {
    background: linear-gradient(135deg, #485e77, #1d2e54) !important;
    color: #ffffff !important;
    text-transform: uppercase;
    font-size: 13px;
}


/* Modo (diario, mensual, etc.) */
.user-card-row-status {
    color: #0d0d0e !important;
    font-size: 13px;
}

/* Texto rojo de precios o alertas */
.user-card-row .text-danger {
    color: #f87171 !important; /* rojo claro legible */
}

/* Días restantes */
.tbl-cell-action b {
    color: #7b6200 !important; /* amarillo suave */
}

</style>

    <!--.side-menu-->
    @if (session('CORRECTO'))
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "CORRECTO",
                    type: "success",
                    text: "{{ session('CORRECTO') }}",
                    styling: "bootstrap3"
                });
            });
        </script>
    @endif

    @if (session('INCORRECTO'))
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "INCORRECTO",
                    type: "error",
                    text: "{{ session('INCORRECTO') }}",
                    styling: "bootstrap3"
                });
            });
        </script>
    @endif

    @if (session('AVISO'))
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "AVISO",
                    type: "error",
                    text: "{{ session('AVISO') }}",
                    styling: "bootstrap3"
                });
            });
        </script>
    @endif
<title> GIMNASIO TAURO</title>
    <h2 class="text-center text-secondary pb-2">PANEL DE CONTROL</h2>
    <audio controls hidden src="{{ asset('mp3/pitido.mp3') }}" id="audio"></audio>
    <div class="container-fluid text-center">
        <div class="row col-12">

            <div class="col-12 col-sm-7 col-md-9">
                <!--.col-->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-lg-3">
                            <article class="statistic-box red">
                                <div>
                                    <div class="number text-light">{{ $totalMembresia }}</div>
                                    <div class="caption">
                                        <div>MEMBRESIAS</div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!--.col-->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <article class="statistic-box purple">
                                <div>
                                    <div class="number text-light">{{ $totalCliente }}</div>
                                    <div class="caption">
                                        <div>CLIENTES REGISTRADOS</div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!--.col-->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <article class="statistic-box green">
                                <div>
                                    <div class="number text-light">{{ $totalUsuario }}</div>
                                    <div class="caption">
                                        <div>USUARIOS DEL SISTEMA</div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!--.col-->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <article class="statistic-box yellow">
                                <div>
                                    <div class="number text-light">{{ $totalAsistencia }}</div>
                                    <div class="caption">
                                        <div>ASISTENCIAS DE HOY</div>
                                    </div>
                                </div>
                            </article>
                        </div>

                        <!--.col-->
                    </div>
                    <!--.row-->
                </div>
                <!--.col-->
                <div class="container">
                    <h2>Registra tu Asistencia</h2>
                    <form action="{{ route('asistencia.store') }}" method="POST">
                        @csrf
                        <div class="form-group row col-12">
                            @error('txtdni')
                                <div class="alert alert-danger">{{ $errors->first('txtdni') }}</div>
                            @enderror

                            @if (session('CORRECTO'))
                                <div class="alert alert-success">{{ session('CORRECTO') }}</div>
                            @endif

                            @if (session('INCORRECTO'))
                                <div class="alert alert-danger">{{ session('INCORRECTO') }}</div>
                            @endif

                            @if (session('AVISO'))
                                <div class="alert alert-warning">{{ session('AVISO') }}</div>
                            @endif


                            <div class="col-12 col-md-8 col-lg-9 mb-3">
                                <input type="number" class="form-control p-4 border-secondary"
                                    placeholder="Ingrese la cédula del cliente" name="txtdni" required>
                            </div>
                            <div class="col-12 col-md-4 col-lg-3" style="min-width: 200px">
                                <button type="submit" class="form-control btn btn-primary p-4">Marcar
                                    Asistencia</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!--.col-->
            </div>

            <div class="col-12 col-sm-5 col-md-3 overflow-scroll" style="height: 60vh">
                <table class="table mb-2">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="2" class="text-center bg-primary col-12" scope="col">Miembros por renovar
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($miembrosPorRenovar as $item)
                            @if ($item->diferencia_fechas <= 7 && $item->diferencia_fechas > 0)
                                <tr>
                                    <td colspan="2">
                                        <div class="user-card-row">
                                            <div class="tbl-row">
                                                <div class="tbl-cell tbl-cell-photo">
                                                    <a href="#">
                                                        @if ($item->foto != '')
                                                            <img src="data:image/jpg;base64,{{ base64_encode($item->foto) }}"
                                                                alt="">
                                                        @else
                                                            <img src="{{ asset('img-inicio/user.jpg') }}" alt="">
                                                        @endif

                                                    </a>
                                                </div>
                                                <div class="tbl-cell">
                                                    <p class="text-dark font-weight-bold"><a
                                                            href="{{ route('cliente.show', $item->id_cliente) }}"
                                                            class="text-dark">{{ $item->nombre }}</a>
                                                    </p>
                                                    <p class="user-card-row-status">{{ $item->modo }}</p>
                                                </div>
                                                <div class="tbl-cell tbl-cell-action"><b>
                                                        Quedan {{ $item->diferencia_fechas }}
                                                        dias
                                                    </b>
                                                    <p>
                                                    </p>
                                                    <p class="text-danger font-weight-bold">S/. {{ $item->precio }} .00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif

                            @if ($item->diferencia_fechas <= 0 && $item->diferencia_fechas >= -10)
                                <tr style="background:#FFDADA;">
                                    <td colspan="2">
                                        <div class="user-card-row">
                                            <div class="tbl-row">
                                                <div class="tbl-cell tbl-cell-photo">
                                                    <a href="#">
                                                        @if ($item->foto != '')
                                                            <img src="data:image/jpg;base64,{{ base64_encode($item->foto) }}"
                                                                alt="">
                                                        @else
                                                            <img src="{{ asset('img-inicio/user.jpg') }}" alt="">
                                                        @endif

                                                    </a>
                                                </div>
                                                <div class="tbl-cell">
                                                    <p class="text-dark font-weight-bold"><a
                                                            href="{{ route('cliente.show', $item->id_cliente) }}"
                                                            class="text-dark">{{ $item->nombre }}</a>
                                                    </p>
                                                    <p class="user-card-row-status">{{ $item->modo }}</p>
                                                </div>
                                                <div class="tbl-cell tbl-cell-action"><b>
                                                        Caducado hace {{ abs($item->diferencia_fechas) }} días
                                                    </b>
                                                    <p>
                                                    </p>
                                                    <p class="text-danger font-weight-bold">S/. {{ $item->precio }} .00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif

                            {{-- @if ($item->diferencia_fechas < -10)
                                <tr style="background:#FFDADA;">
                                    <td colspan="2">
                                        <div class="user-card-row">
                                            <div class="tbl-row">
                                                <div class="tbl-cell tbl-cell-photo">
                                                    <a href="#">
                                                        @if ($item->foto != '')
                                                            <img src="data:image/jpg;base64,{{ base64_encode($item->foto) }}"
                                                                alt="">
                                                        @else
                                                            <img src="{{ asset('img-inicio/user.jpg') }}" alt="">
                                                        @endif

                                                    </a>
                                                </div>
                                                <div class="tbl-cell">
                                                    <p class="text-dark font-weight-bold"><a
                                                            href="{{ route('cliente.show', $item->id_cliente) }}"
                                                            class="text-dark">{{ $item->nombre }}</a>
                                                    </p>
                                                    <p class="user-card-row-status">{{ $item->modo }}</p>
                                                </div>
                                                <div class="tbl-cell tbl-cell-action"><b>
                                                        Archivado hace {{ abs($item->diferencia_fechas + 10) }} días
                                                    </b>
                                                    <p>
                                                    </p>
                                                    <p class="text-danger font-weight-bold">S/. {{ $item->precio }} .00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif --}}
                        @endforeach

                    </tbody>
                </table>

                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th colspan="2" class="text-center bg-info" scope="col">Cuentas por cobrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cuentasPorCobrar as $key => $item2)
                            @if ($item2->diferencia_fechas <= 15 && $item2->diferencia_fechas > 0)
                                <tr>
                                    <td colspan="2">
                                        <div class="user-card-row">
                                            <div class="tbl-row">
                                                <div class="tbl-cell tbl-cell-photo">
                                                    <a href="#">
                                                        @if ($item2->foto != '')
                                                            <img src="data:image/jpg;base64,{{ base64_encode($item2->foto) }}"
                                                                alt="">
                                                        @else
                                                            <img src="{{ asset('img-inicio/user.jpg') }}" alt="">
                                                        @endif

                                                    </a>
                                                </div>
                                                <div class="tbl-cell">
                                                    <p class="text-dark font-weight-bold"><a
                                                            href="{{ route('cliente.pagoCliente', $item2->id_cliente) }}">{{ $item2->nombre }}</a>
                                                    </p>
                                                    <p class="user-card-row-status">{{ $item2->modo }}</p>
                                                </div>
                                                <div class="tbl-cell tbl-cell-action"><b>{{ $item2->diferencia_fechas }}
                                                        dias</b>
                                                    <p>
                                                    </p>
                                                    <p class="text-danger font-weight-bold">S/. {{ $item2->debe }} .00
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- <button onclick="activarCamara()" class="btn btn-primary mb-2"><i class="fas fa-qrcode"></i>
                ESCANEAR QR</button> --}}


            {{-- <div class="col-8 vistaCamara"><video id="preview"></video></div> --}}


        </div>
    </div>

    <!--.container-fluid-->
    <!--.page-content-->

    <script>
        let pagacon = document.querySelectorAll(".pagacon");
        pagacon.forEach(function(e, index) {
            e.addEventListener("input", function(el) {
                let precio = document.querySelector(`.precio${index}`).value
                let pagacon = el.target.value
                let debe = precio - pagacon
                if (debe < 0) {
                    debe = 0;
                }
                document.querySelector(`.debe${index}`).value = debe
                console.log(debe)
            })
        });
    </script>
    <script>
        const scanButton = document.getElementById('scanButton');
        scanButton.addEventListener('click', () => {
            // Abre el escáner
            const scanner = new window.Scanner();
            scanner.scan((result) => {
                // Maneja el resultado del escaneo
                console.log(result);
            });
        });
    </script>

    </body>

   
@endsection

@section('content-vendedor')
    @if (session('CORRECTO'))
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "CORRECTO",
                    type: "success",
                    text: "{{ session('CORRECTO') }}",
                    styling: "bootstrap3"
                });
            });
        </script>
    @endif



    @if (session('INCORRECTO'))
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "INCORRECTO",
                    type: "error",
                    text: "{{ session('INCORRECTO') }}",
                    styling: "bootstrap3"
                });
            });
        </script>
    @endif

    @if (session('AVISO'))
        <script>
            $(function notificacion() {
                new PNotify({
                    title: "AVISO",
                    type: "error",
                    text: "{{ session('AVISO') }}",
                    styling: "bootstrap3"
                });
            });
        </script>
    @endif
    
@endsection
