<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    use Illuminate\Support\Facades\Schema;

public function boot()
{
    try {
        if (!Schema::hasTable('membresia')) {
            return;
        }

        $totalMembresia = DB::table('membresia')->count();
        View::share('totalMembresia', $totalMembresia);

        $totalCliente = DB::table('cliente')
            ->where('tipo_usuario', 'cliente')
            ->count();
        View::share('totalCliente', $totalCliente);

        $totalUsuario = DB::table('cliente')
            ->where('tipo_usuario', '!=', 'cliente')
            ->count();
        View::share('totalUsuario', $totalUsuario);

        $fechaActual = now()->toDateString();
        $totalAsistencia = DB::table('asistencia')
            ->whereDate('fecha_hora', $fechaActual)
            ->count();
        View::share('totalAsistencia', $totalAsistencia);

        $miembrosPorRenovar = DB::select("
            SELECT cliente.id_cliente, cliente.nombre, cliente.foto,
                   DATEDIFF(hasta, NOW()) AS diferencia_fechas,
                   membresia.precio, membresia.modo
            FROM cliente
            INNER JOIN membresia ON cliente.id_membresia = membresia.id_membresia
            WHERE tipo_usuario='cliente'
              AND DATEDIFF(hasta, NOW()) <= 10
            ORDER BY diferencia_fechas DESC
        ");
        View::share('miembrosPorRenovar', $miembrosPorRenovar);

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
        View::share('cuentasPorCobrar', $cuentasPorCobrar);

    } catch (\Throwable $e) {
        // ⚠️ No hacemos nada si no hay DB (build, migrate, etc)
    }
}

}
