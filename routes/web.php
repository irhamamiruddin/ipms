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
Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [App\Http\Controllers\ContactController::class, 'create'])->name('contacts.create');
Route::post('/contacts', [App\Http\Controllers\ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/show/{id}', [App\Http\Controllers\ContactController::class, 'show'])->name('contacts.show');
Route::get('/contacts/{id}/edit', [App\Http\Controllers\ContactController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts', [App\Http\Controllers\ContactController::class, 'update'])->name('contacts.update');
Route::get('/contacts/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('contacts.destroy');

//Companies
Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('companies.create');
Route::post('/companies', [App\Http\Controllers\CompanyController::class, 'store'])->name('companies.store');
Route::get('/companies/show/{id}', [App\Http\Controllers\CompanyController::class, 'show'])->name('companies.show');
Route::get('/companies/{id}/edit', [App\Http\Controllers\CompanyController::class, 'edit'])->name('companies.edit');
Route::put('/companies', [App\Http\Controllers\CompanyController::class, 'update'])->name('companies.update');
Route::get('/companies/{id}', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('companies.destroy');

//Settings - Others
Route::get('/settings/others', [App\Http\Controllers\OtherController::class, 'index'])->name('settings.others.index');
//Business Natures
Route::post('/settings/others/business-nature', [App\Http\Controllers\OtherController::class, 'storeBusiness'])->name('business.store');
Route::put('/settings/others/business-nature', [App\Http\Controllers\OtherController::class, 'updateBusiness'])->name('business.update');
Route::get('/settings/others/business-nature/{id}', [App\Http\Controllers\OtherController::class, 'destroyBusiness'])->name('business.destroy');
//Categories of Land
Route::post('/settings/others/categories-of-land', [App\Http\Controllers\OtherController::class, 'storeCategory'])->name('category.store');
Route::put('/settings/others/categories-of-land', [App\Http\Controllers\OtherController::class, 'updateCategory'])->name('category.update');
Route::get('/settings/others/categories-of-land/{id}', [App\Http\Controllers\OtherController::class, 'destroyCategory'])->name('category.destroy');
//Consents
Route::post('/settings/others/consent', [App\Http\Controllers\OtherController::class, 'storeConsent'])->name('consent.store');
Route::put('/settings/others/consent', [App\Http\Controllers\OtherController::class, 'updateConsent'])->name('consent.update');
Route::get('/settings/others/consent/{id}', [App\Http\Controllers\OtherController::class, 'destroyConsent'])->name('consent.destroy');
//Consultant Roles
Route::post('/settings/others/consultant-role', [App\Http\Controllers\OtherController::class, 'storeRole'])->name('role.store');
Route::put('/settings/others/consultant-role', [App\Http\Controllers\OtherController::class, 'updateRole'])->name('role.update');
Route::get('/settings/others/consultant-role/{id}', [App\Http\Controllers\OtherController::class, 'destroyRole'])->name('role.destroy');
//Land Acquisition Status
Route::post('/settings/others/land-acquisition-status', [App\Http\Controllers\OtherController::class, 'storeStatus'])->name('status.store');
Route::put('/settings/others/land-acquisition-status', [App\Http\Controllers\OtherController::class, 'updateStatus'])->name('status.update');
Route::get('/settings/others/land-acquisition-status/{id}', [App\Http\Controllers\OtherController::class, 'destroyStatus'])->name('status.destroy');
//Land Classification
Route::post('/settings/others/land-classification', [App\Http\Controllers\OtherController::class, 'storeClassification'])->name('classification.store');
Route::put('/settings/others/land-classification', [App\Http\Controllers\OtherController::class, 'updateClassification'])->name('classification.update');
Route::get('/settings/others/land-classification/{id}', [App\Http\Controllers\OtherController::class, 'destroyClassification'])->name('classification.destroy');
//Library Types
Route::post('/settings/others/library-type', [App\Http\Controllers\OtherController::class, 'storeLibrary'])->name('library.store');
Route::put('/settings/others/library-type', [App\Http\Controllers\OtherController::class, 'updateLibrary'])->name('library.update');
Route::get('/settings/others/library-type/{id}', [App\Http\Controllers\OtherController::class, 'destroyLibrary'])->name('library.destroy');
//Project Status
Route::post('/settings/others/project-status', [App\Http\Controllers\OtherController::class, 'storeProject'])->name('project.store');
Route::put('/settings/others/project-status', [App\Http\Controllers\OtherController::class, 'updateProject'])->name('project.update');
Route::get('/settings/others/project-status/{id}', [App\Http\Controllers\OtherController::class, 'destroyProject'])->name('project.destroy');
//Type of Agreement
Route::post('/settings/others/type-of-agreement', [App\Http\Controllers\OtherController::class, 'storeAgreement'])->name('agreement.store');
Route::put('/settings/others/type-of-agreement', [App\Http\Controllers\OtherController::class, 'updateAgreement'])->name('agreement.update');
Route::get('/settings/others/type-of-agreement/{id}', [App\Http\Controllers\OtherController::class, 'destroyAgreement'])->name('agreement.destroy');