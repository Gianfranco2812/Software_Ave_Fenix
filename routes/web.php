<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\InicioController;

// CONTROLADORES DE VENTA
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\GraficoController;


/* CONTROLADORES DE MANTENIMIENTO */
use App\Http\Controllers\HerramientaController;
use App\Http\Controllers\TallerController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RecursoController;
use App\Http\Controllers\PrioridadController;
use App\Http\Controllers\BusController;

/* CONTROLADORES DE RECURSOS HUMANOS */
use App\Http\Controllers\PersonalController;

/* CONTROLADORES DE ENCOMIENDAS */
use App\Http\Controllers\AgenciaController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\EnvioController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\ReclamoController;

use App\Http\Controllers\PostulanteController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\VacacionesController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\ContratoController;
use App\Models\Cargo;


use App\Http\Controllers\PdfController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('layouts.plantilla');
}); */

Route::get('/', function () {
    return view('auth.login');
  });


/* IGNORAR LA SIGUIENTE RUTA  */
Route::get('/ejemplo', function () {
    return view('ejemplo.ejemplo');
});

/* INICIO RUTAS MANTENIMIENTO */

//RUTAS PARA HERRAMIENTA
        Route::resource('Herramienta', HerramientaController::class);

        Route::get('Cancelarh', function () {
            return redirect()->route('Herramienta.index')->with('datos','Acción Cancelada ..!');
        })->name('cancelarh');
        Route::get('herramienta/{id}/eliminar','HerramientaController@destroy')->name('Herramienta.destroy');

        //RUTAS PARA TALLER
        Route::resource('Taller', TallerController::class);

        Route::get('Cancelart', function () {
            return redirect()->route('Taller.index')->with('datos','Acción Cancelada ..!');
        })->name('cancelart');
        Route::get('taller/{id}/eliminar','TallerController@destroy')->name('Taller.destroy');

        //RUTAS PARA PROVEEDOR
        Route::resource('Proveedor', ProveedorController::class);

        Route::get('Cancelarpr', function () {
            return redirect()->route('Proveedor.index')->with('datos','Acción Cancelada ..!');
        })->name('cancelarpr');
        Route::get('proveedor/{id}/eliminar',[ProveedorController::class,'destroy'])->name('Proveedor.destroy');

        //RUTAS PARA RECURSO
        Route::resource('Recurso', RecursoController::class);

        Route::get('Cancelarr', function () {
            return redirect()->route('Recurso.index')->with('datos','Acción Cancelada ..!');
        })->name('cancelarr');
        Route::get('recurso/{id}/eliminar',[RecursoController::class,'destroy'])->name('Recurso.destroy');

        //RUTAS PARA PRIORIDAD
        Route::resource('Prioridad', PrioridadController::class);

        Route::get('Cancelarpri', function () {
            return redirect()->route('Prioridad.index')->with('datos','Acción Cancelada ..!');
        })->name('cancelarpri');
        Route::get('prioridad/{id}/eliminar',[PrioridadController::class,'destroy'])->name('Prioridad.destroy');

        //RUTAS PARA BUS
        Route::resource('Bus', BusController::class);

        Route::get('Cancelarb', function () {
            return redirect()->route('Bus.index')->with('datos','Acción Cancelada ..!');
        })->name('cancelarb');
        Route::get('bus/{id}/eliminar',[BusController::class,'destroy'])->name('Bus.destroy');

/* FIN RUTAS MANTENIMIENTO */



/* INICIO RUTAS CONTABILIDAD */

/* FIN RUTAS CONTABILIDAD */


/* INICIO RUTAS VENTAS*/
Route::resource('clientes', ClienteController::class)->names('cliente');

Route::resource('ventas', VentaController::class)->names('ventas');
Route::get('generaPdf/{id}', [PdfController::class, 'generaPdf'])->name('generaPdf');
Route::resource('Pdf', PdfController::class);

Route::get('graficos', [GraficoController::class, 'index'])->name('graficos.index');
/* FIN RUTAS VENTAS */



/* INICIO RUTAS RECURSOS HUMANOS */
//RUTAS PARA PERSONAL
        Route::resource('Personal', PersonalController::class);

        Route::get('Cancelarp', function () {
            return redirect()->route('Personal.index')->with('datos','Acción Cancelada ..!');
        })->name('cancelarp');
        Route::get('personal/{id}/eliminar',[PersonalController::class,'destroy'])->name('Personal.destroy');
        Route::get('personal/pos/{id}', [PersonalController::class, 'pos'])->name('Personal.pos');


        Route::resource('Postulante', PostulanteController::class);

        Route::get('Cancelarpos', function () {
            return redirect()->route('Postulante.index')->with('datos','Acción Cancelada ..!');
        })->name('cancelarpos');
        Route::get('postulante/{id}/eliminar',[PostulanteController::class,'destroy'])->name('Postulante.destroy');



    

        Route::get('Cancelarper', function () {
            return redirect()->route('permiso.index')->with('datos','Acción Cancelada ..!');
        })->name('cancelarper');

        Route::get('/permiso', [PermisosController::class, 'index'])->name('permiso.index');
        Route::get('/permiso/create', [PermisosController::class, 'create'])->name('permiso.create');
        Route::get('/permiso/edit/{id}', [PermisosController::class, 'edit'])->name('permiso.edit');
        Route::get('/permiso/destroy/{id}', [PermisosController::class, 'destroy'])->name('permiso.destroy');
        Route::put('/permisos/{id}', [PermisosController::class, 'update'])->name('permiso.update');
        Route::post('/permisos', [PermisosController::class, 'store'])->name('permiso.store');
        Route::post('/permisos/aceptar/{id}', [PermisosController::class, 'aceptar'])->name('permiso.aceptar');
        Route::post('/permisos/rechazar/{id}', [PermisosController::class, 'rechazar'])->name('permiso.rechazar');

        
        Route::get('Cancelarvac', function () {
            return redirect()->route('vacaciones.index')->with('datos','Acción Cancelada ..!');
        })->name('cancelarvac');

        Route::get('Cancelarcon', function () {
            return redirect()->route('contrato.index')->with('datos','Acción Cancelada ..!');
        })->name('cancelarcon');
    
        Route::get('/vacaciones', [VacacionesController::class, 'index'])->name('vacaciones.index');
        Route::get('/vacaciones/create', [VacacionesController::class, 'create'])->name('vacaciones.create');
        Route::get('/vacaciones/edit/{id}', [VacacionesController::class, 'edit'])->name('vacaciones.edit');
        Route::get('/vacaciones/destroy/{id}', [VacacionesController::class, 'destroy'])->name('vacaciones.destroy');
        Route::put('/vacaciones/{id}', [VacacionesController::class, 'update'])->name('vacaciones.update');
        Route::post('/vacaciones', [VacacionesController::class, 'store'])->name('vacaciones.store');


        Route::get('/sucursal', [SucursalController::class, 'index'])->name('sucursal.index');
        Route::get('/sucursal/registro', [SucursalController::class, 'create'])->name('sucursal.create');
        Route::get('/sucursal/edit/{id}', [SucursalController::class, 'edit'])->name('sucursal.edit');
        route::post('/sucursal/store', [SucursalController::class, 'store'] )->name('sucursal.store');
        route::put('/sucursal/update/{id}', [SucursalController::class, 'update'] )->name('sucursal.update');
        route::get('/sucursal/destroy/{id}', [SucursalController::class, 'destroy'] )->name('sucursal.destroy');

        Route::get('/area', [AreaController::class, 'index'])->name('area.index');
        Route::get('/area/registro', [AreaController::class, 'create'])->name('area.create');
        Route::get('/area/edit/{id}', [AreaController::class, 'edit'])->name('area.edit');
        route::post('/area/store', [AreaController::class, 'store'] )->name('area.store');
        route::put('/area/update/{id}', [AreaController::class, 'update'] )->name('area.update');
        route::get('/area/destroy/{id}', [AreaController::class, 'destroy'] )->name('area.destroy');

        Route::get('/cargo', [CargoController::class, 'index'])->name('cargo.index');
        Route::get('/cargo/registro', [CargoController::class, 'create'])->name('cargo.create');
        Route::get('/cargo/edit/{id}', [CargoController::class, 'edit'])->name('cargo.edit');
        route::post('/cargo/store', [CargoController::class, 'store'] )->name('cargo.store');
        route::put('/cargo/update/{id}', [CargoController::class, 'update'] )->name('cargo.update');
        route::get('/cargo/destroy/{id}', [CargoController::class, 'destroy'] )->name('cargo.destroy');

        Route::get('/contrato', [ContratoController::class, 'index'])->name('contrato.index');
        Route::get('/contrato/registro', [ContratoController::class, 'create'])->name('contrato.create');
        Route::get('/contrato/edit/{id}', [ContratoController::class, 'edit'])->name('contrato.edit');
        route::post('/contrato/store', [ContratoController::class, 'store'] )->name('contrato.store');
        route::put('/contrato/update/{id}', [ContratoController::class, 'update'] )->name('contrato.update');
        route::get('/contrato/destroy/{id}', [ContratoController::class, 'destroy'] )->name('contrato.destroy');
/* FIN RUTAS RECURSOS HUMANOS */



/* INICIO RUTAS ENCOMIENDA */
Route::resource('agencias', AgenciaController::class)->names('agencias');
Route::resource('comprobantes', ComprobanteController::class)->names('comprobantes');
Route::resource('envios', EnvioController::class)->names('envios');
Route::resource('paquetes', PaqueteController::class)->names('paquetes');
Route::resource('promociones', PromocionController::class)->names('promociones');
Route::resource('reclamos', ReclamoController::class)->names('reclamos');
Route::resource('rutas', RutaController::class)->names('rutas');
Route::resource('tarifas', TarifaController::class)->names('tarifas');
Route::resource('transportes', TransporteController::class)->names('transportes');
/* FIN RUTAS ENCOMIENDA */



/* RUTAS PARA LOGIN */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* RUTAS PARA USUARIOS Y ROLES */
Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles',RolController::class);
    Route::resource('usuarios',UsuarioController::class);


}); 
