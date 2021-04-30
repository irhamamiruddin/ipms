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