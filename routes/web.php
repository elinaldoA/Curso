<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendEmailContaController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//Adminstrador
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');
//clientes
Route::get('/clientes/index', [ClientesController::class, 'index'])->name('cliente.index');
Route::get('/clientes/create', [ClientesController::class, 'create'])->name('cliente.create');
Route::post('/clientes/store', [ClientesController::class, 'store'])->name('cliente.store');
Route::get('/show-cliente/{cliente}', [ClientesController::class, 'show'])->name('cliente.show');
Route::get('/edit-cliente/{cliente}', [ClientesController::class, 'edit'])->name('cliente.edit');
Route::put('/update-cliente/{cliente}', [ClientesController::class, 'update'])->name('cliente.update');
Route::delete('/destroy-cliente/{cliente}', [ClientesController::class, 'destroy'])->name('cliente.destroy');
// CONTAS
Route::get('/contas/index', [ContaController::class, 'index'])->name('conta.index');
Route::get('/create-conta', [ContaController::class, 'create'])->name('conta.create');
Route::post('/store-conta', [ContaController::class, 'store'])->name('conta.store');
Route::get('/show-conta/{conta}', [ContaController::class, 'show'])->name('conta.show');
Route::get('/edit-conta/{conta}', [ContaController::class, 'edit'])->name('conta.edit');
Route::put('/update-conta/{conta}', [ContaController::class, 'update'])->name('conta.update');
Route::delete('/destroy-conta/{conta}', [ContaController::class, 'destroy'])->name('conta.destroy');

Route::post('/restore-conta', [ContaController::class, 'restore'])->name('conta.restore');
Route::get('/change-situation-conta/{conta}', [ContaController::class, 'changeSituation'])->name('conta.change-situation');

Route::get('/gerar-pdf-conta', [ContaController::class, 'gerarPdf'])->name('conta.gerar-pdf');

Route::get('/gerar-csv-conta', [ContaController::class, 'gerarCsv'])->name('conta.gerar-csv');

Route::get('/gerar-word-conta', [ContaController::class, 'gerarWord'])->name('conta.gerar-word');

Route::get('/send-email-pendente-conta', [SendEmailContaController::class, 'sendEmailPendenteConta'])->name('conta.send-email-pendente');

//Clientes
Route::prefix('cliente')->group(function () {
    Route::get('login', 'Clientes\AuthCliente\LoginController@showLoginForm')->name('cliente.login');
    Route::post('login', 'Clientes\AuthCliente\LoginController@login')->name('cliente.login.submit');
    Route::post('logout', 'Clientes\AuthCliente\LoginController@logout')->name('cliente.logout');

    Route::get('register', 'Clientes\AuthCliente\RegisterController@showRegistrationForm')->name('cliente.register');
    Route::post('register', 'Clientes\AuthCliente\RegisterController@register')->name('cliente.submit');

    Route::get('password/confirm', 'Clientes\AuthCliente\ConfirmPasswordController@showConfirmForm')->name('cliente.password.confirm');
    Route::post('password/confirm', 'Clientes\AuthCliente\ConfirmPasswordController@confirm')->name('cliente.confirm.submit');

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('cliente.password.request');
    Route::post('password/email', 'Clientes\AuthCliente\ForgotPasswordController@sendResetLinkEmail')->name('cliente.password.email');

    Route::get('password/reset/{token}', 'Clientes\AuthCliente\ResetPasswordController@showResetForm')->name('cliente.password.reset');
    Route::post('password/reset', 'Clientes\AuthCliente\ResetPasswordController@reset')->name('cliente.password.update');

    Route::get('email/verify', 'Clientes\Clientes\AuthCliente\VerificationController@show')->name('cliente.verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Clientes\AuthCliente\VerificationController@verify')->name('cliente.verification.verify');
    Route::post('email/resend', 'Clientes\AuthCliente\VerificationController@resend')->name('cliente.verification.resend');
});
Route::group(['prefix' => 'cliente', 'middleware' => ['auth']], function () {
    Route::get('/cliente/dashboard', ['Clientes\HomeController@index'])->name('dashboard');
    Route::get('/cliente/profile', ['Clientes\ProfileController@index'])->name('profile-cliente');
    Route::put('/cliente/profile', ['Clientes\HomeController@update'])->name('profile-cliente.update');
});
