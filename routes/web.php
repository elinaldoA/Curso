<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LimiteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceitaController;
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
    return view('site/index');
});

Auth::routes();
//Adminstrador
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

//clientes
Route::get('/clientes/index', [ClientesController::class, 'index'])->name('cliente.index');
Route::get('/clientes/create', [ClientesController::class, 'create'])->name('cliente.create');
Route::post('/clientes/store', [ClientesController::class, 'store'])->name('cliente.store');
Route::get('/clientes/show/{cliente}', [ClientesController::class, 'show'])->name('cliente.show');
Route::get('/clientes/edit/{cliente}', [ClientesController::class, 'edit'])->name('cliente.edit');
Route::put('/clientes/{cliente}', [ClientesController::class, 'update'])->name('cliente.update');
Route::delete('/destroy-cliente/{cliente}', [ClientesController::class, 'destroy'])->name('cliente.destroy');
Route::get('/change-situation-cliente/{cliente}', [ClientesController::class, 'changeSituation'])->name('cliente.change-situation');

//Exportações
Route::get('clientes/gerar-pdf-cliente', [ClientesController::class, 'gerarPdf'])->name('cliente.gerar-pdf');
Route::get('/gerar-csv-cliente', [ClientesController::class, 'gerarCsv'])->name('cliente.gerar-csv');
Route::get('/gerar-word-cliente', [ClientesController::class, 'gerarWord'])->name('cliente.gerar-word');

// RECEITAS
Route::get('/receitas/index', [ReceitaController::class, 'index'])->name('receita.index');
Route::get('/create-receita', [ReceitaController::class, 'create'])->name('receita.create');
Route::post('/store-receita', [ReceitaController::class, 'store'])->name('receita.store');
Route::get('/show-receita/{receita}', [ReceitaController::class, 'show'])->name('receita.show');
Route::get('/edit-receita/{receita}', [ReceitaController::class, 'edit'])->name('receita.edit');
Route::put('/update-receita/{receita}', [ReceitaController::class, 'update'])->name('receita.update');
Route::delete('/destroy-receita/{receita}', [ReceitaController::class, 'destroy'])->name('receita.destroy');
// LIMITES
Route::get('/limites/index', [LimiteController::class, 'index'])->name('limite.index');
Route::get('/create-limite', [LimiteController::class, 'create'])->name('limite.create');
Route::post('/store-limite', [LimiteController::class, 'store'])->name('limite.store');
Route::get('/show-limite/{limite}', [LimiteController::class, 'show'])->name('limite.show');
Route::get('/edit-limite/{limite}', [LimiteController::class, 'edit'])->name('limite.edit');
Route::put('/update-limite/{limite}', [LimiteController::class, 'update'])->name('limite.update');
Route::delete('/destroy-limite/{limite}', [LimiteController::class, 'destroy'])->name('limite.destroy');
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
    Route::get('login', [App\Http\Controllers\Clientes\AuthCliente\LoginController::class, 'showLoginForm'])->name('cliente.login');
    Route::post('login', [App\Http\Controllers\Clientes\AuthCliente\LoginController::class, 'login'])->name('cliente.login.submit');
    Route::post('logout', [App\Http\Controllers\Clientes\AuthCliente\LoginController::class, 'logout'])->name('cliente.logout');

    Route::get('password/confirm', [App\Http\Controllers\Clientes\AuthCliente\ConfirmPasswordController::class, 'showConfirmForm'])->name('cliente.password.confirm');
    Route::post('password/confirm', [App\Http\Controllers\Clientes\AuthCliente\ConfirmPasswordController::class, 'confirm'])->name('cliente.confirm.submit');

    Route::get('password/reset', [App\Http\Controllers\Clientes\AuthCliente\ForgotPasswordController::class, 'showLinkRequestForm'])->name('cliente.password.request');
    Route::post('password/email', [App\Http\Controllers\Clientes\AuthCliente\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('cliente.password.email');

    Route::get('password/reset/{token}', [App\Http\Controllers\Clientes\AuthCliente\ResetPasswordController::class, 'showResetForm'])->name('cliente.password.reset');
    Route::post('password/reset', [App\Http\Controllers\Clientes\AuthCliente\ResetPasswordController::class, 'reset'])->name('cliente.password.update');

    Route::get('email/verify', [App\Http\Controllers\Clientes\AuthCliente\VerificationController::class, 'show'])->name('cliente.verification.notice');
    Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Clientes\AuthCliente\VerificationController::class, 'verify'])->name('cliente.verification.verify');
    Route::post('email/resend', [App\Http\Controllers\Clientes\AuthCliente\VerificationController::class, 'resend'])->name('cliente.verification.resend');

    Route::get('/dashboard', [App\Http\Controllers\Clientes\HomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [App\Http\Controllers\Clientes\ProfileController::class, 'index'])->name('profile-cliente');
    Route::put('/profile', [App\Http\Controllers\Clientes\ProfileController::class, 'update'])->name('profile-cliente.update');
    // RECEITAS
    Route::get('/receitas/index', [App\Http\Controllers\Clientes\ReceitaController::class, 'index'])->name('receita.cliente.index');
    Route::get('/create-receita', [App\Http\Controllers\Clientes\ReceitaController::class, 'create'])->name('receita.cliente.create');
    Route::post('/store-receita', [App\Http\Controllers\Clientes\ReceitaController::class, 'store'])->name('receita.cliente.store');
    Route::get('/show-receita/{receita}', [App\Http\Controllers\Clientes\ReceitaController::class, 'show'])->name('receita.cliente.show');
    Route::get('/edit-receita/{receita}', [App\Http\Controllers\Clientes\ReceitaController::class, 'edit'])->name('receita.cliente.edit');
    Route::put('/update-receita/{receita}', [App\Http\Controllers\Clientes\ReceitaController::class, 'update'])->name('receita.cliente.update');
    Route::delete('/destroy-receita/{receita}', [App\Http\Controllers\Clientes\ReceitaController::class, 'destroy'])->name('receita.cliente.destroy');
    // LIMITES
    Route::get('/limites/index', [App\Http\Controllers\Clientes\LimiteController::class, 'index'])->name('limite.cliente.index');
    Route::get('/create-limite', [App\Http\Controllers\Clientes\LimiteController::class, 'create'])->name('limite.cliente.create');
    Route::post('/store-limite', [App\Http\Controllers\Clientes\LimiteController::class, 'store'])->name('limite.cliente.store');
    Route::get('/show-limite/{limite}', [App\Http\Controllers\Clientes\LimiteController::class, 'show'])->name('limite.cliente.show');
    Route::get('/edit-limite/{limite}', [App\Http\Controllers\Clientes\LimiteController::class, 'edit'])->name('limite.cliente.edit');
    Route::put('/update-limite/{limite}', [App\Http\Controllers\Clientes\LimiteController::class, 'update'])->name('limite.cliente.update');
    Route::delete('/destroy-limite/{limite}', [App\Http\Controllers\Clientes\LimiteController::class, 'destroy'])->name('limite.cliente.destroy');
    // CONTAS
    Route::get('/contas/index', [App\Http\Controllers\Clientes\ContaController::class, 'index'])->name('conta.cliente.index');
    Route::get('/create-conta', [App\Http\Controllers\Clientes\ContaController::class, 'create'])->name('conta.cliente.create');
    Route::post('/store-conta', [App\Http\Controllers\Clientes\ContaController::class, 'store'])->name('conta.cliente.store');
    Route::get('/show-conta/{conta}', [App\Http\Controllers\Clientes\ContaController::class, 'show'])->name('conta.cliente.show');
    Route::get('/edit-conta/{conta}', [App\Http\Controllers\Clientes\ContaController::class, 'edit'])->name('conta.cliente.edit');
    Route::put('/update-conta/{conta}', [App\Http\Controllers\Clientes\ContaController::class, 'update'])->name('conta.cliente.update');
    Route::delete('/destroy-conta/{conta}', [App\Http\Controllers\Clientes\ContaController::class, 'destroy'])->name('conta.cliente.destroy');

    Route::post('/restore-conta', [App\Http\Controllers\Clientes\ContaController::class, 'restore'])->name('conta.cliente.restore');
    Route::get('/change-situation-conta/{conta}', [App\Http\Controllers\Clientes\ContaController::class, 'changeSituation'])->name('conta.cliente.change-situation');

    Route::get('/gerar-pdf-conta', [App\Http\Controllers\Clientes\ContaController::class, 'gerarPdf'])->name('conta.cliente.gerar-pdf');

    Route::get('/gerar-csv-conta', [App\Http\Controllers\Clientes\ContaController::class, 'gerarCsv'])->name('conta.cliente.gerar-csv');

    Route::get('/gerar-word-conta', [App\Http\Controllers\Clientes\ContaController::class, 'gerarWord'])->name('conta.cliente.gerar-word');
});
