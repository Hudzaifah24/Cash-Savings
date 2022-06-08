<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\SavingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/dashboard')->group(function(){
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Tabungan
    Route::get('/tabungan', [SavingController::class, 'index'])->name('saving.index');
    Route::get('/tabungan/create', [SavingController::class, 'create'])->name('saving.create');
    Route::get('/tabungan/edit/{id}', [SavingController::class, 'edit'])->name('saving.edit');
    Route::post('/tabungan/store', [SavingController::class, 'store'])->name('saving.store');
    Route::post('/tabungan/update/{id}', [SavingController::class, 'update'])->name('saving.update');
    Route::get('/tabungan/destroy/{id}', [SavingController::class, 'destroy'])->name('saving.destroy');

    // Pemasukan
    Route::get('/pemasukan', [IncomeController::class, 'index'])->name('income.index');
    Route::get('/pemasukan/create', [IncomeController::class, 'create'])->name('income.create');
    Route::get('/pemasukan/edit/{id}', [IncomeController::class, 'edit'])->name('income.edit');
    Route::post('/pemasukan/store', [IncomeController::class, 'store'])->name('income.store');
    Route::post('/pemasukan/update/{id}', [IncomeController::class, 'update'])->name('income.update');
    Route::get('/pemasukan/destroy/{id}', [IncomeController::class, 'destroy'])->name('income.destroy');

    // Pengeluaran
    Route::get('/pengeluaran', [ExpenditureController::class, 'index'])->name('expenditure.index');
    Route::get('/pengeluaran/create', [ExpenditureController::class, 'create'])->name('expenditure.create');
    Route::get('/pengeluaran/edit/{id}', [ExpenditureController::class, 'edit'])->name('expenditure.edit');
    Route::post('/pengeluaran/store', [ExpenditureController::class, 'store'])->name('expenditure.store');
    Route::post('/pengeluaran/update/{id}', [ExpenditureController::class, 'update'])->name('expenditure.update');
    Route::get('/pengeluaran/destroy/{id}', [ExpenditureController::class, 'destroy'])->name('expenditure.destroy');

    // hutang
    Route::get('/hutang', [DebtController::class, 'index'])->name('debt.index');
    Route::get('/hutang/create', [DebtController::class, 'create'])->name('debt.create');
    Route::get('/hutang/edit/{id}', [DebtController::class, 'edit'])->name('debt.edit');
    Route::post('/hutang/store', [DebtController::class, 'store'])->name('debt.store');
    Route::post('/hutang/update/{id}', [DebtController::class, 'update'])->name('debt.update');
    Route::get('/hutang/destroy/{id}', [DebtController::class, 'destroy'])->name('debt.destroy');
    Route::post('/hutang/bayar/{id}', [DebtController::class, 'pay'])->name('debt.pay');
    Route::get('/hutang/ulang/{id}', [DebtController::class, 'refresh'])->name('debt.refresh');

    // User
    Route::get('/pengguna', [UserController::class, 'index'])->name('user.index');
});

Auth::routes();
