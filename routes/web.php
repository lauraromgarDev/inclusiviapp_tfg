<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\InterpretationRequestController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;




//inicio de la aplicacion
Route::group(['prefix' => '{locale}'], function (){
    Route::get('/', function () {
        return view('main.index');
    })->middleware('SetLocale');
});


//Route::get('/{locale}/login', [LoginController::class, 'showLoginForm'])->name('login.form');
//Route::post('/{locale}/login/submit', [LoginController::class, 'login'])->name('login.post');


//rutas desde fuera de la aplicacion
Route::group(['prefix' => '{locale}'], function (){

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login/submit', [LoginController::class, 'login'])->name('login.post');

    // Ruta para mostrar la lista de equipos para usuarios
    Route::get('/user/equipo', [TeamController::class, 'userIndex'])->name('user.teams');

    Route::get('/user/equipo/{slug}', [TeamController::class, 'userShow'])->name('user.team');

    Route::get('/contacto', [ContactController::class, 'contact'])->name('emails.contact');
    Route::post('/contacto', [ContactController::class, 'sendEmail'])->name('contact.sendEmail');

    Route::get('/user/proyectos', [ProjectController::class, 'userIndex'])->name('user.projects');
    Route::get('/user/proyectos/{slug}', [ProjectController::class, 'userShow'])->name('user.project');

    Route::get('/formulario-inscripcion', [InscriptionController::class, 'create'])->name('user.students.create');
    Route::post('/formulario-inscripcion', [InscriptionController::class, 'store'])->name('students.store');

    Route::get('/get-interpreters', [InterpretationRequestController::class, 'getInterpreters'])->name('user.get_interpreters');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/acerca-de', [MainController::class, 'about'])->name('main.about');

});

Route::group(['prefix' => '{locale}'], function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/registro', [RegisterController::class, 'register'])->name('register.submit');
});


Auth::routes();
Route::get('/', [MainController::class, 'index'])->name('main.index');
//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


/**
 * User Routes
 */

Route::middleware(['auth:web'])->group(function () {
    Route::get('{locale}/usuario', [HomeController::class, 'index'])->name('user.welcome');
    Route::get('/{locale}/user/solicitar-interprete', [InterpretationRequestController::class, 'create'])->name('user.ask_for_date');
    Route::post('/{locale}/user/solicitar-interprete', [InterpretationRequestController::class, 'store'])->name('requests.store');
    Route::get('/{locale}/user/mis-solicitudes', [InterpretationRequestController::class, 'userRequests'])->name('user.my_requests');
    Route::get('/{locale}/mis-proyectos', [InscriptionController::class, 'showUserProjects'])->name('user.students.mis-proyectos');

});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('{locale}/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('{locale}/projects', 'App\Http\Controllers\ProjectController');
    Route::get('{locale}/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('{locale}/projects/{id}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::get('{locale}/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::get('{locale}/projects/{project}', [ProjectController::class, 'show'])->name('admin.projects.show');
    Route::post('{locale}/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::put('{locale}/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('{locale}/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');

    Route::resource('{locale}/teams', 'App\Http\Controllers\TeamController');
    Route::get('{locale}/teams', [TeamController::class, 'index'])->name('admin.teams.index');
    Route::get('{locale}/teams/create', [TeamController::class, 'create'])->name('admin.teams.create');
    Route::get('{locale}/teams/{slug}', [TeamController::class, 'show'])->name('admin.teams.show');
    Route::get('{locale}/teams/{team}/edit', [TeamController::class, 'edit'])->name('admin.teams.edit');
    Route::post('{locale}/teams', [TeamController::class, 'store'])->name('admin.teams.store');
    Route::put('{locale}/teams/{team}', [TeamController::class, 'update'])->name('admin.teams.update');
    Route::delete('{locale}/teams/{team}', [TeamController::class, 'destroy'])->name('admin.teams.destroy');

    Route::get('{locale}/alumnos', [InscriptionController::class, 'index'])->name('admin.students.index');
    Route::get('{locale}/alumnos/{id}', [InscriptionController::class, 'show'])->name('admin.students.show');
    Route::get('{locale}/alumnos/{student}/edit', [InscriptionController::class, 'edit'])->name('admin.students.edit');
    Route::put('{locale}/alumnos/{student}', [InscriptionController::class, 'update'])->name('admin.students.update');
    Route::delete('{locale}/alumnos/{student}', [InscriptionController::class, 'destroy'])->name('admin.students.destroy');

    Route::get('{locale}/solicitudes', [InterpretationRequestController::class, 'index'])->name('admin.requests.index');
    Route::get('{locale}/solicitudes/{id}', [InterpretationRequestController::class, 'show'])->name('admin.requests.show');
    Route::get('{locale}/solicitudes/{id}/edit', [InterpretationRequestController::class, 'edit'])->name('admin.requests.edit');
    Route::put('{locale}/solicitudes/{id}', [InterpretationRequestController::class, 'update'])->name('admin.requests.update');
    Route::delete('{locale}/solicitudes/{id}', [InterpretationRequestController::class, 'destroy'])->name('admin.requests.destroy');

});



