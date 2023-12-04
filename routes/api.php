<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\ConvocatoriaController;
use App\Http\Controllers\EleccionController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\FrenteController;
use App\Http\Controllers\JuradoController;
use App\Http\Controllers\MesaContoller;
use App\Http\Controllers\Miembros_ComiteController;
use App\Http\Controllers\Relacion_ELECCFRENTEController;
use App\Http\Controllers\Relacion_FCController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;


use App\Http\Controllers\VotosConstroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/generar-boleta', [BoletasController::class, 'generarBoleta']);

/*
instalar los siguientes comandos para el funcionaminto

composer require barryvdh/laravel-dompdf

php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"

composer dump-autoload

para la boleta de impresion esos comandos funcionara instalando
*/


use App\Http\Controllers\VotosController;

Route::get('/votos', [VotosController::class, 'index']);
Route::post('/votos',[VotosController::class, 'store']);
Route::put('/votos', [VotosController::class, 'update']);
Route::resource('votos', VotosController::class)->except([
    'create', 'edit'
]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/**
 * Al crear un tipo grupo se realiza un conjunto de rutas pero estas funcionan independientemente
 * en consola para mejor vision colocar: php artisan route:list
 */



/**
 * Obtiene los candidatos todos por completo: get
 * Inserta un nuevo candidato: store
 *
 * Para ver mejor la sintaxis ingresar a: CandidatoController.php
 */
Route::controller(CandidatoController::class)->group(
    function(){
        Route::get('/candidatos', 'index');
        Route::post('/postcandidato', 'store');
    }
);
/**
 * Obtiene todas las carreras
 */
Route::get('/carreras', [CarreraController::class, 'index']);
/**
 * Obtiene las convocatorias todas por completo: get
 * Inserta una nueva convocatoria: store
 *
 * Para ver mejor la sintaxis ingresar a: ConvocatoriaController.php
 */
Route::controller(ConvocatoriaController::class)->group(
    function(){
        Route::get('/convocatorias', 'index');
        Route::post('/postconvocatorias', 'store');
    }
);
/**
 * Obtiene las elecciones todas por completo: get
 * Inserta una nueva eleccion: store
 *
 * Para ver mejor la sintaxis ingresar a: EleccionController.php
 */
Route::controller(EleccionController::class)->group(
    function(){
        Route::get('/elecciones', 'index');
        Route::post('/posteleccion', 'store');
    }
);
/**
 * Obtiene las facultades todas por completo: get
 *
 * Para ver mejor la sintaxis ingresar a: FacultadController.php
 */
Route::get('/facultades', [FacultadController::class, 'index']);
/**
 * Obtiene los frentes todas por completo: get
 * Inserta un nuevo frente: store
 *
 * Para ver mejor la sintaxis ingresar a: FrenteController.php
 */
Route::controller(FrenteController::class)->group(
    function(){
        Route::get('/frentes', 'index');
        Route::post('/postfrente', 'store');
        Route::put('/updatefrente/{id}', 'update');
    }
);

/**
 *
 */
Route::controller(JuradoController::class)->group(
    function(){
        Route::get('/jurados', 'index');
        Route::post('/postjurado', 'store');
        Route::put('/randomJurado', 'storeJurado');
        Route::put('/deletejurado/{id}', 'destroy');
        Route::put('/modifyjurado/{id}', 'update');
    }
);

Route::get('/cargos', [CargoController::class, 'index']);

Route::controller(Miembros_ComiteController::class)->group(
    function(){
        Route::get('/comite', 'index');
        Route::post('/postmiembrocomite', 'store');
        Route::put('/modifymiembro/{id}', 'update');
        Route::put('/deletemiembro/{id}', 'destroy');
    }
);
Route::controller(MesaContoller::class)->group(
    function(){
        Route::get('/mesas', 'index');
        Route::put('/mesas/{id}', 'update');

    }
);

// Route::put('/mesas/{id}', [MesaContoller::class, 'update']);
/**
 * Inserta una nueva convocatoria: store
 *
 * Para ver mejor la sintaxis ingresar a: ConvocatoriaController.php
 */
Route::controller(Relacion_ELECCFRENTEController::class)->group(
    function(){
        Route::post('/postrelacion_elecc_frente', 'store');
    }
);

/**
 * Inserta una nueva convocatoria: store
 *
 * Para ver mejor la sintaxis ingresar a: ConvocatoriaController.php
 */
Route::controller(Relacion_FCController::class)->group(
    function(){
        Route::get('/relacion_fc', 'index');
    }
);
/**
 * Obtiene los usuarios todos por completo: get
 * Busca un usuario por id: show
 *
 * Para ver mejor la sintaxis ingresar a: UsuarioController.php
 */
Route::controller(UsuariosController::class)->group(
    function(){
        Route::get('/usuarios', 'index');
        Route::put('/putusuario', 'show');
        Route::get('/docentes', 'index_docentes');
        Route::get('/estudiantes', 'index_estudiantes');
        Route::put('/ids_usuarios/{cargo}/{id_car}', 'index_ids');
    }
);