@extends('layouts/app')
@section('titulo', 'info empresa')

@section('content')

   <style>
    /* ===== CONTENEDOR GENERAL ===== */
    body {
        background: #f5f7fb;
    }

    /* ===== TÍTULO ===== */
    h4 {
        font-weight: 700;
        color: #1f2937;
        letter-spacing: 1px;
    }

    /* ===== SECCIÓN PRINCIPAL ===== */
    .bg-white {
        background: #ffffff !important;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
    }

    /* ===== BLOQUE IMAGEN PERFIL ===== */
    .img {
        background: linear-gradient(135deg, #eef2ff, #f8fafc);
        border-radius: 16px;
        padding: 30px;
    }

    /* ===== IMAGEN PERFIL ===== */
    img.logo {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        border: 4px solid #ffffff;
    }

    /* ===== ICONO CUANDO NO HAY FOTO ===== */
    .logo {
        font-size: 130px;
        color: #9ca3af;
    }

    /* ===== TEXTOS ===== */
    h6 {
        color: #111827;
        font-weight: 600;
    }

    /* ===== ALERTA INFO ===== */
    .alert-secondary {
        background: #eef2ff;
        color: #1e3a8a;
        border: none;
        border-radius: 10px;
    }

    /* ===== INPUTS ===== */
    .input {
        background: #f9fafb !important;
        border: 1px solid #d1d5db;
        border-radius: 12px;
        padding: 14px 16px;
        font-size: 15px;
        color: #111827;
        transition: all 0.3s ease;
    }

    .input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        background: #ffffff !important;
    }

    .input[readonly] {
        background: #e5e7eb !important;
        color: #374151;
    }

    /* ===== ERRORES ===== */
    .error__text {
        color: #dc2626;
        font-size: 13px;
        padding-left: 8px;
    }

    /* ===== BOTONES ===== */
    .btn {
        border-radius: 14px;
        font-weight: 600;
        padding: 10px 18px;
        transition: all 0.3s ease;
    }

    .btn-success {
        background: linear-gradient(135deg, #22c55e, #16a34a);
        border: none;
    }

    .btn-success:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(34, 197, 94, 0.4);
    }

    .btn-danger {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        border: none;
    }

    .btn-danger:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
    }

    .btn-primary {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        border: none;
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }
</style>


    {{-- notificaciones --}}


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

    <title>GIMNASIO TAURO</title>

    <h4 class="text-center text-secondary">MI PERFIL</h4>

    <div class="mb-0 col-12 bg-white p-5 pt-0">
        @foreach ($sql as $item)
            <div class="d-flex justify-content-around align-items-center flex-wrap gap-5 pt-5 pb-3 mb-3 img">
                <div class="text-center">
                    @if ($item->foto == null)
                        <p class="logo">
                            <i class="far fa-frown"></i>
                        </p>
                    @else
                        <img class="logo" src="{{ asset("foto/usuario/$item->foto") }}" alt="">
                    @endif
                </div>
                <div>
                    <h6 class="text-dark font-weight-bold">Modificar imagen</h6>
                    <form action="{{ route('profile.updateImg') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id_cliente }}">
                        <div class="alert alert-secondary">Selecciona una imagen no muy <b>pesado</b> y en un formato
                            <b>válido</b> ...!
                        </div>
                        <div class="fl-flex-label mb-4 col-12">
                            <input type="file" name="foto" class="input form-control-file input__text" value="">
                            @error('foto')
                                <small class="error error__text">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end gap-4">
                            <div class="text-right mt-0">
                                <button type="submit" class="btn btn-rounded btn-success"><i
                                        class="fas fa-save"></i>&nbsp;&nbsp; Modificar perfil</button>
                            </div>
                            <div class="text-right mt-0">
                                <a href="{{ route('profile.destroy', $item->id_cliente) }}"
                                    class="btn btn-rounded btn-danger"><i class="fas fa-trash"></i>&nbsp;&nbsp; Eliminar
                                    foto</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <form action="{{ route('profile.update', $item->id_cliente) }}" method="POST">
                @csrf
                <div class="row">
                    <input type="hidden" name="id" value="{{ $item->id_cliente }}">
                    <div class="fl-flex-label mb-4 col-12 col-lg-6">
                        <input type="text" class="input input__text bg-light" readonly
                            value="{{ $item->tipo_usuario }}">
                    </div>
                    <div class="fl-flex-label mb-4 col-12 col-lg-6">
                        <input type="number" name="dni" class="input input__text" id="dni" placeholder="Cédula"
                            value="{{ $item->dni }}">
                    </div>
                    <div class="fl-flex-label mb-4 col-12 col-lg-6">
                        <input type="text" name="nombre" class="input input__text" id="nombre"
                            placeholder="Nombres y Apellidos" value="{{ $item->nombre }}">
                    </div>

                    <div class="fl-flex-label mb-4 col-12 col-lg-6">
                        <input type="text" name="usuario" class="input input__text" placeholder="Usuario *"
                            value="{{ old('usuario', $item->usuario) }}">
                        @error('usuario')
                            <small class="error error__text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="fl-flex-label mb-4 col-12 col-lg-6">
                        <input type="text" name="telefono" class="input input__text" placeholder="Telefono"
                            value="{{ $item->telefono }}">
                    </div>
                    <div class="fl-flex-label mb-4 col-12 col-lg-6">
                        <input type="text" name="direccion" class="input input__text" placeholder="Dirección"
                            value="{{ $item->direccion }}">
                    </div>
                    <div class="fl-flex-label mb-4 col-12 col-lg-6">
                        <input type="email" name="correo" class="input input__text" placeholder="Correo *"
                            value="{{ old('correo', $item->correo) }}">
                        @error('correo')
                            <small class="error error__text">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="text-right mt-0">
                        <button type="submit" class="btn btn-rounded btn-primary">Guardar</button>
                    </div>
                </div>

            </form>
        @endforeach
    </div>




@endsection
