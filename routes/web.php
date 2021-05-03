<?php

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
Auth::routes();

//Dashboard
Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

//Contacts
Route::get('/contacts', [App\Http\Controllers\ContactsController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [App\Http\Controllers\ContactsController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [App\Http\Controllers\ContactsController::class, 'store'])->name('contacts.store');
Route::get('/contacts/show/{id}', [App\Http\Controllers\ContactsController::class, 'show'])->name('contacts.show');
Route::get('/contacts/{id}/edit', [App\Http\Controllers\ContactsController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts', [App\Http\Controllers\ContactsController::class, 'update'])->name('contacts.update');
Route::get('/contacts/{id}', [App\Http\Controllers\ContactsController::class, 'destroy'])->name('contacts.destroy');

//Companies
Route::get('/companies', [App\Http\Controllers\CompaniesController::class, 'index'])->name('companies.index');
Route::get('/companies/create', [App\Http\Controllers\CompaniesController::class, 'create'])->name('companies.create');
Route::post('/companies', [App\Http\Controllers\CompaniesController::class, 'store'])->name('companies.store');
Route::get('/companies/show/{id}', [App\Http\Controllers\CompaniesController::class, 'show'])->name('companies.show');
Route::get('/companies/{id}/edit', [App\Http\Controllers\CompaniesController::class, 'edit'])->name('companies.edit');
Route::put('/companies', [App\Http\Controllers\CompaniesController::class, 'update'])->name('companies.update');
Route::get('/companies/{id}', [App\Http\Controllers\CompaniesController::class, 'destroy'])->name('companies.destroy');

//Settings - Others