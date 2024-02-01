<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\LigneController;
use App\Http\Controllers\Region;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ZoneController;
use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade ;
use Barryvdh\DomPDF\PDF as PDF;

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


Route::get('/', function () {
    // Vérifier si un utilisateur est authentifié
    if (auth()->check()) {
        if (auth()->user()->role_id === 1) {

            // tableau de bord de l'administrateur
            return redirect()->route('admins.index');
        } else {
            // Rediriger les utilisateurs normaux vers leur page d'accueil
            return redirect()->route('users.index');
        }
    } else {

        // Si aucun utilisateur n'est authentifié, rediriger vers la page d'accueil publique
        return redirect()->route('users.index');
    }
});

//Route::get('/', [UserController::class, 'index']);


//admin
Route::get('/liste-users', [AdminController::class,'adminListUsers'])->name('list-users');
Route::get('/admins/edit', [AdminController::class,'editPage'])->name('admins.editPage');
Route::put('/admins/edits/{user}', [AdminController::class,'updatePassword'])->name('admins.updatePassword');
Route::resource('admins', AdminController::class);;

//Lignes
Route::resource('lignes', LigneController::class);

//utilisateur
Route::get('/users/myReserve', [UserController::class,'myReserve'])->name('users.myReserve');
Route::get('/users/edit/', [UserController::class,'editPassword'])->name('users.editPassword');
Route::put('/users/edit/{user}', [UserController::class,'updatePassword'])->name('users.updatePassword');
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


//reservation
Route::patch('reservations/{reservations}', [ReservationController::class,'cancel'])->name('reservations.cancel');
Route::resource('reservations', ReservationController::class)->middleware('auth');






//pdf

Route::get('/view-pdf', function () {
    // Récupérer les données de l'URL
    $data = json_decode(request('data'));

    // Générer le contenu du PDF avec les informations de l'utilisateur
    $pdfContent = view('User.test', compact('data'))->render();

    // Obtenir une instance de la classe PDF
    $pdf = app('dompdf.wrapper');

    // Charger le contenu HTML dans le PDF
    $pdf->loadHtml($pdfContent);

    //si on veut telecharger
    // Charger le contenu HTML dans le PDF et le télécharger
    return $pdf->loadHtml($pdfContent)->download('user_information.pdf');

    // Retourner le PDF dans le navigateur au lieu de le télécharger
    //return $pdf->stream('user_information.pdf');
})->name('view-pdf');

Route::get('/download-pdf', function () {
    // Récupérer les données de l'URL
    $data = json_decode(request('data'));

    // Générer le contenu du PDF avec les informations de l'utilisateur
    $pdfContent = view('User.test', compact('data'))->render();

    // Obtenir une instance de la classe PDF
    $pdf = app('dompdf.wrapper');

    // Charger le contenu HTML dans le PDF
    $pdf->loadHtml($pdfContent);

    // Obtenir le fichier PDF sous forme de flux de données
    $output = $pdf->output();

    // Nom du fichier PDF à télécharger
    $pdfFileName = 'user_information.pdf';

    // Retourner le PDF avec en-têtes HTTP pour déclencher le téléchargement
    return response($output, 200)
        ->header('Content-Type', 'application/pdf')
        ->header('Content-Disposition', 'attachment; filename=' . $pdfFileName);
})->name('download-pdf');



