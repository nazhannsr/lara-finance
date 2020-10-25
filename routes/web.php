<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\TransactionController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\CompanyController;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
Route::get('/company/{id}', [CompanyController::class, 'show'])->name('company.show');

Route::get('/company/create/invoice/{id}', [CompanyController::class, 'createInvoice'])->name('company.create.invoice');
Route::post('/company/store/invoice/{id}', [CompanyController::class, 'storeInvoice'])->name('company.store.invoice');

Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/customer/company/{id}', [CustomerController::class, 'joinCompany'])->name('customer.company');

Route::get('/customer/transaction', [TransactionController::class, 'customerIndex'])->name('customer.transaction.index');
Route::get('/customer/transaction/{id}', [TransactionController::class, 'show'])->name('customer.transaction.show');
Route::post('/customer/transaction/{id}', [TransactionController::class, 'store'])->name('customer.transaction.store');

Route::get('/customer/payment', [PaymentController::class, 'index'])->name('customer.payment.index');



