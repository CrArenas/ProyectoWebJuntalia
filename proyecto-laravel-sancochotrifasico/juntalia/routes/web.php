<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Inscription;


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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/my-events', [EventController::class, 'userIndexEvents'])->name('userIndexEvents');
    Route::delete('/my-events/{id}', [EventController::class, 'userDeleteEvents'])->name('userDeleteEvents');
    Route::get('/my-events/{id}/edit', [EventController::class, 'editarEvento'])->name('events.edit');
    Route::post('/my-events/{id}/update', [EventController::class, 'actualizarEvento'])->name('events.update');

    Route::get('/my-inscriptions', [InscriptionController::class, 'userInscriptions'])->name('user.inscriptions');
    Route::post('/inscriptions/cancel/{id}', [InscriptionController::class, 'cancelInscription'])->name('inscriptions.cancel');

    Route::get('/event/{id}', [EventController::class, 'showDetails'])->name('events.details');
    Route::post('/event/{id}/comment', [EventController::class, 'storeComment'])->name('events.comment');

    Route::get('/eventos-cercanos', [EventController::class, 'obtenerEventosCercanos']); 
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/events/{id}', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::resource('inscriptions', InscriptionController::class);
    Route::resource('comments', CommentController::class);

    Route::get('/eventos/categoria/{id}', [EventController::class, 'byCategory'])->name('events.byCategory');
    Route::get('/eventos/{id}', [EventController::class, 'show'])->name('events.show');
});


Auth::routes();

Route::middleware('auth', 'role:admin')->group(callback: function(): void {
     
    Route::get('/administration', function () {
        return view('administration');
    })->name('administration');

    //Route::get('/events', [EventController::class, 'index'])->name('events.index');
    //Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    //Route::get('/events/{id}/', [EventController::class, 'edit'])->name('events.edit');
    //Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');

    Route::resource('roles', RolController::class);
    //Route::resource('users', UserController::class);
    Route::resource('cities', CityController::class);
    //Route::resource('categories', CategoryController::class);

    Route::get('/reports', [ReportController::class,'index'])->name('reports.index');
    Route::get('/events_pdfview', [EventController::class, 'indexreport'])->name('reports.events');
    Route::post('/events_pdf', [EventController::class, 'pdf'])->name('generateReportevents');
    Route::get('/inscriptions_pdfview', [InscriptionController::class, 'indexreport'])->name('reports.inscriptions');
    Route::post('/inscriptions_pdf', [InscriptionController::class, 'pdf'])->name('generateReportinscriptions');
    Route::post('/reports/user-inscriptions', [InscriptionController::class, 'userInscriptionsReport'])
    ->name('generateUserInscriptionReport');


   Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/reports/events/chart', function () {
        return view('reports.events_chart');
    })->name('reports.events.chart');

    Route::get('/reports/inscriptions/chart', function () {
        return view('reports.inscriptions_chart');
    })->name('reports.inscriptions.chart');
    }); 


});
   
/*Route::middleware('auth', 'role:user')->group(callback: function(): void {*/
      
    // Editar y eliminar solo eventos creados por el usuario
    /*Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('events.edit')
        ->middleware('can:update,event');  // Aquí agregamos el middleware de autorización para asegurar que solo el creador pueda editar
    Route::put('events/{event}', [EventController::class, 'update'])->name('events.update')
        ->middleware('can:update,event');
    Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy')
        ->middleware('can:delete,event');*/

     // Inscripciones
     /*
    Route::resource('inscriptions', InscriptionController::class)->only([
    'index', 'store', 'show', 'destroy']);  // Solo permitir ver inscripciones, inscribirse, y cancelar inscripciones
    Route::delete('inscriptions/{inscription}', [InscriptionController::class, 'destroy'])->name('inscriptions.destroy')
        ->middleware('can:delete,inscription');  // Asegurarse de que el usuario solo pueda eliminar sus inscripciones
    
        */
    // Comentarios

    /*Route::resource('comments', CommentController::class)->only([
        'store', 'index'  // Solo permitir ver y agregar comentarios
    ]);
    Route::get('comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit')
        ->middleware('can:update,comment');  // Solo el creador del comentario puede editarlo
    Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comments.update')
        ->middleware('can:update,comment');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy')
        ->middleware('can:delete,comment');  // Solo el creador del comentario puede eliminarlo
    */
     
/*});*/



// Route::get('/rols', [RolController::class, 'index'])->name('rols.index');
// Route::post('/rols', [RolController::class, 'store'])->name('rols.store');
// Route::delete('/rols/{id}', [RolController::class, 'destroy'])->name('rols.destroy');
// Route::get('/rols/{id}/', [RolController::class, 'edit'])->name('rols.edit');
// Route::put('/rols/{id}', [RolController::class, 'update'])->name('rols.update');

// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
// Route::get('/users/{id}/', [UserController::class, 'edit'])->name('users.edit');
// Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

// Route::get('/cities', [CityController::class, 'index'])->name('cities.index');
// Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
// Route::delete('/cities/{id}', [CityController::class, 'destroy'])->name('cities.destroy');
// Route::get('/cities/{id}/', [CityController::class, 'edit'])->name('cities.edit');
// Route::put('/cities/{id}', [CityController::class, 'update'])->name('cities.update');

// Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
// Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
// Route::get('/categories/{id}/', [CategoryController::class, 'edit'])->name('categories.edit');
// Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

// Route::get('/events', [EventController::class, 'index'])->name('events.index');
// Route::post('/events', [EventController::class, 'store'])->name('events.store');
// Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
// Route::get('/events/{id}/', [EventController::class, 'edit'])->name('events.edit');
// Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');

// Route::get('/inscriptions', [InscriptionController::class, 'index'])->name('inscriptions.index');
// Route::post('/inscriptions', [InscriptionController::class, 'store'])->name('inscriptions.store');
// Route::delete('/inscriptions/{id}', [InscriptionController::class, 'destroy'])->name('inscriptions.destroy');
// Route::get('/inscriptions/{id}/', [InscriptionController::class, 'edit'])->name('inscriptions.edit');
// // Route::put('/inscriptions/{id}', [InscriptionController::class, 'update'])->name('inscriptions.update');

// Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
// Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
// Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
// Route::get('/comments/{id}/', [CommentController::class, 'edit'])->name('comments.edit');
// Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
// /*
// |ROUTAS PARA LAS VISTAS
// */
// Route::get('/reports', [ReportController::class,'index'])->name('reports.index');

// Route::get('/events_pdfview', [EventController::class, 'indexreport'])->name('reports.events');
// Route::post('/events_pdf', [EventController::class, 'pdf'])->name('generateReportevents');

// Route::get('/inscriptions_pdfview', [InscriptionController::class, 'indexreport'])->name('reports.inscriptions');
// Route::post('/inscriptions_pdf', [InscriptionController::class, 'pdf'])->name('generateReportinscriptions');


