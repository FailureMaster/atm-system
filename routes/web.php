<?php

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

// routes/web.php
use App\Http\Controllers\ATMController;

Route::get('/', [ATMController::class, 'pinEntry'])->name('atm.pinEntry'); // PIN entry page
Route::post('/pin', [ATMController::class, 'enterPin'])->name('atm.checkPin'); // PIN submission

Route::middleware('auth')->group(function() {
    Route::get('/menu', [ATMController::class, 'menu'])->name('atm.menu'); // ATM menu
    Route::get('/balance', [ATMController::class, 'checkBalance'])->name('atm.checkBalance'); // Check balance
    Route::get('/deposit', [ATMController::class, 'depositForm'])->name('atm.depositForm'); // Show deposit form
    Route::post('/deposit', [ATMController::class, 'deposit'])->name('atm.deposit'); // Process  deposit
    Route::get('/withdraw', [ATMController::class, 'withdrawForm'])->name('atm.withdrawForm'); // Show withdrawal form
    Route::post('/withdraw', [ATMController::class, 'withdraw'])->name('atm.withdraw'); // Process withdrawal
    Route::get('/history', [ATMController::class, 'transactionHistory'])->name('atm.transactionHistory');
    Route::post('/logout', [ATMController::class, 'logout'])->name('atm.logout');

     // Show transaction history
});

