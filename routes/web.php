<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\LigneController;
use App\Http\Controllers\Region;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ZoneController;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('User.index');
// });


// // Routes pour les utilisateurs
// Route::middleware(['web', 'auth', 'user'])->group(function () {
//     Route::get('/index', 'UserController@index')->name('user.index');
// });

// // Routes pour les administrateurs
// Route::middleware(['web', 'auth', 'admin'])->group(function () {
//     Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
// });

// Route::middleware(['web', 'auth'])->group(function () {
//     if (auth()->check()) {
//         // Utilisateur connecté
//         if (auth()->user()->role === 'admin') {
//             // Rediriger l'administrateur vers le tableau de bord
//             Route::get('/',  [UserController::class,'dashboard']);
//         } else {
//             // Rediriger les utilisateurs normaux vers leur page d'accueil
//             Route::get('/', [UserController::class,'index']);
//         }
//     } else {
//         // Utilisateur non connecté, rediriger vers la page de connexion
//         Route::get('/', [UserController::class,'index']);
//     }
// });


Route::get('/', [UserController::class, 'index']);


//admin
Route::get('/liste-users', [AdminController::class,'adminListUsers'])->name('list-users');
Route::get('/admins/edit', [AdminController::class,'editPage'])->name('admins.editPage');
Route::put('/admins/edits/{user}', [AdminController::class,'updatePassword'])->name('admins.updatePassword');
Route::resource('admins', AdminController::class);;

//Lignes
Route::resource('lignes', LigneController::class);

//utilisateur
Route::get('/users/reserve', [UserController::class,'reserve'])->name('users.reserve')->middleware('auth');
Route::get('/users/myReserve', [UserController::class,'myReserve'])->name('users.myReserve');
Route::resource('users', UserController::class);




//Login
//par convention on appelle se chemin auth.login
Route::get('/login',[AuthController::class,'loginForm'])->name('auth.login');
Route::post('/login',[AuthController::class,'login']);
Route::delete('/logout',[AuthController::class,'logout'])->name('auth.logout');


//region
Route::resource('regions', RegionController::class);

//classe
Route::resource('classes', ClasseController::class);

//Tarif
Route::resource('tarifs', TarifController::class);

//Zones
Route::resource('zones', ZoneController::class);

