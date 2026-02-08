<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Throwable;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            try {
                $totalMembresia = DB::table('membresia')->count();
                $totalCliente = DB::table('cliente')
                    ->where('tipo_usuario', 'cliente')
                    ->count();

                $totalUsuario = DB::table('cliente')
                    ->where('tipo_usuario', '!=', 'cliente')
                    ->count();

                $fechaActual = Carbon::now()->toDateString();
                $totalAsistencia = DB::table('asistencia')
                    ->whereDate('fecha_hora', $fechaActual)
                    ->count();

                $miembrosPorRenovar = DB::select("
                    SELECT cliente.id_cliente, cliente.nombre, cliente.foto,
                           DATEDIFF(hasta, NOW()) AS diferencia_fechas,
                           membresia.precio, membresia.modo
                    FROM cliente
                    INNER JOIN membresia ON cliente.id_membresia = membresia.id_membresia
                    WHERE tipo_usuario = 'cliente'
                      AND DATEDIFF(hasta, NOW()) <= 10
                    ORDER BY diferencia_fechas DESC
                ");

                $cuentasPorCobrar = DB::select("
                    SELECT cliente.id_cliente, cliente.nombre, debe, cliente.foto,
                           DATEDIFF(NOW(), desde) AS diferencia_fechas,
                           membresia.nombre AS nomMem,
                           membresia.precio, membresia.modo
                    FROM cliente
                    INNER JOIN membresia ON cliente.id_membresia = membresia.id_membresia
                    WHERE debe > 0
                    ORDER BY diferencia_fechas DESC
                ");

                $view->with(compact(
                    'totalMembresia',
                    'totalCliente',
                    'totalUsuario',
                    'totalAsistencia',
                    'miembrosPorRenovar',
                    'cuentasPorCobrar'
                ));
            } catch (Throwable $e) {
                // Evita que el build falle si no hay DB
                $view->with([
                    'totalMembresia' => 0,
                    'totalCliente' => 0,
                    'totalUsuario' => 0,
                    'totalAsistencia' => 0,
                    'miembrosPorRenovar' => [],
                    'cuentasPorCobrar' => [],
                ]);
            }
        });
    }
}
