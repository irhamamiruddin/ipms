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

//Lands
Route::get('/lands', [App\Http\Controllers\LandController::class, 'index'])->name('lands.index');
Route::get('/lands/create', [App\Http\Controllers\LandController::class, 'create'])->name('lands.create');
Route::post('/lands', [App\Http\Controllers\LandController::class, 'store'])->name('lands.store');
Route::get('/lands/show/{id}', [App\Http\Controllers\LandController::class, 'show'])->name('lands.show');
Route::get('/lands/{id}/edit', [App\Http\Controllers\LandController::class, 'edit'])->name('lands.edit');
Route::put('/lands', [App\Http\Controllers\LandController::class, 'update'])->name('lands.update');
Route::get('/lands/{id}', [App\Http\Controllers\LandController::class, 'destroy'])->name('lands.destroy');

//Projects
Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create');
Route::post('/projects', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store');
Route::get('/projects/show/{id}', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{id}/edit', [App\Http\Controllers\ProjectController::class, 'edit'])->name('projects.edit');
Route::put('/projects', [App\Http\Controllers\ProjectController::class, 'update'])->name('projects.update');
Route::get('/projects/{id}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects.destroy');

//Libraries
Route::get('/libraries', [App\Http\Controllers\LibraryController::class, 'index'])->name('libraries.index');
Route::get('/libraries/create', [App\Http\Controllers\LibraryController::class, 'create'])->name('libraries.create');
Route::post('/libraries', [App\Http\Controllers\LibraryController::class, 'store'])->name('libraries.store');
Route::get('/libraries/show/{id}', [App\Http\Controllers\LibraryController::class, 'show'])->name('libraries.show');
Route::get('/libraries/{id}/edit', [App\Http\Controllers\LibraryController::class, 'edit'])->name('libraries.edit');
Route::put('/libraries', [App\Http\Controllers\LibraryController::class, 'update'])->name('libraries.update');
Route::get('/libraries/{id}', [App\Http\Controllers\LibraryController::class, 'destroy'])->name('libraries.destroy');

//Settings - Development Components
Route::get('/settings/development-components', [App\Http\Controllers\ComponentController::class, 'index'])->name('settings.components.index');
//Type R1
Route::post('/settings/development-components/r1', [App\Http\Controllers\ComponentController::class, 'storeR1'])->name('r1.store');
Route::put('/settings/development-components/r1', [App\Http\Controllers\ComponentController::class, 'updateR1'])->name('r1.update');
Route::get('/settings/development-components/r1/{id}', [App\Http\Controllers\ComponentController::class, 'destroyR1'])->name('r1.destroy');
//Type R2
Route::post('/settings/development-components/r2', [App\Http\Controllers\ComponentController::class, 'storeR2'])->name('r2.store');
Route::put('/settings/development-components/r2', [App\Http\Controllers\ComponentController::class, 'updateR2'])->name('r2.update');
Route::get('/settings/development-components/r2/{id}', [App\Http\Controllers\ComponentController::class, 'destroyR2'])->name('r2.destroy');
//Type R3
Route::post('/settings/development-components/r3', [App\Http\Controllers\ComponentController::class, 'storeR3'])->name('r3.store');
Route::put('/settings/development-components/r3', [App\Http\Controllers\ComponentController::class, 'updateR3'])->name('r3.update');
Route::get('/settings/development-components/r3/{id}', [App\Http\Controllers\ComponentController::class, 'destroyR3'])->name('r3.destroy');
//Type A1
Route::post('/settings/development-components/a1', [App\Http\Controllers\ComponentController::class, 'storeA1'])->name('a1.store');
Route::put('/settings/development-components/a1', [App\Http\Controllers\ComponentController::class, 'updateA1'])->name('a1.update');
Route::get('/settings/development-components/a1/{id}', [App\Http\Controllers\ComponentController::class, 'destroyA1'])->name('a1.destroy');
//Type C1
Route::post('/settings/development-components/c1', [App\Http\Controllers\ComponentController::class, 'storeC1'])->name('c1.store');
Route::put('/settings/development-components/c1', [App\Http\Controllers\ComponentController::class, 'updateC1'])->name('c1.update');
Route::get('/settings/development-components/c1/{id}', [App\Http\Controllers\ComponentController::class, 'destroyC1'])->name('c1.destroy');
//Type O1
Route::post('/settings/development-components/o1', [App\Http\Controllers\ComponentController::class, 'storeO1'])->name('o1.store');
Route::put('/settings/development-components/o1', [App\Http\Controllers\ComponentController::class, 'updateO1'])->name('o1.update');
Route::get('/settings/development-components/o1/{id}', [App\Http\Controllers\ComponentController::class, 'destroyO1'])->name('o1.destroy');

//Settings - Logs
Route::get('/settings/logs', [App\Http\Controllers\LogSettingController::class, 'index'])->name('settings.logs.index');
//Log Nature
Route::post('/settings/logs/log-natures', [App\Http\Controllers\LogSettingController::class, 'storeNature'])->name('nature.store');
Route::put('/settings/logs/log-natures', [App\Http\Controllers\LogSettingController::class, 'updateNature'])->name('nature.update');
Route::get('/settings/logs/log-natures/{id}', [App\Http\Controllers\LogSettingController::class, 'destroyNature'])->name('nature.destroy');
//Level 1
Route::post('/settings/logs/level-1', [App\Http\Controllers\LogSettingController::class, 'storeLevel1'])->name('level1.store');
Route::put('/settings/logs/level-1', [App\Http\Controllers\LogSettingController::class, 'updateLevel1'])->name('level1.update');
Route::get('/settings/logs/level-1/{id}', [App\Http\Controllers\LogSettingController::class, 'destroyLevel1'])->name('level1.destroy');
//Level 2
Route::post('/settings/logs/level-2', [App\Http\Controllers\LogSettingController::class, 'storeLevel2'])->name('level2.store');
Route::put('/settings/logs/level-2', [App\Http\Controllers\LogSettingController::class, 'updateLevel2'])->name('level2.update');
Route::get('/settings/logs/level-2/{id}', [App\Http\Controllers\LogSettingController::class, 'destroyLevel2'])->name('level2.destroy');
//Level 3
Route::post('/settings/logs/level-3', [App\Http\Controllers\LogSettingController::class, 'storeLevel3'])->name('level3.store');
Route::put('/settings/logs/level-3', [App\Http\Controllers\LogSettingController::class, 'updateLevel3'])->name('level3.update');
Route::get('/settings/logs/level-3/{id}', [App\Http\Controllers\LogSettingController::class, 'destroyLevel3'])->name('level3.destroy');

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

//Settings - Users
Route::get('/settings/users', [App\Http\Controllers\UserSettingController::class, 'index'])->name('settings.users.index');
Route::get('/settings/users/create', [App\Http\Controllers\UserSettingController::class, 'create'])->name('users.create');
Route::post('/settings/users', [App\Http\Controllers\UserSettingController::class, 'store'])->name('users.store');
Route::get('/settings/users/{id}/edit', [App\Http\Controllers\UserSettingController::class, 'edit'])->name('users.edit');
Route::put('/settings/users', [App\Http\Controllers\UserSettingController::class, 'update'])->name('users.update');
Route::get('/settings/users/{id}', [App\Http\Controllers\UserSettingController::class, 'destroy'])->name('users.destroy');
//User Roles
Route::get('/settings/users/roles/index', [App\Http\Controllers\UserSettingController::class, 'roleIndex'])->name('roles.index');
Route::get('/settings/users/roles/create', [App\Http\Controllers\UserSettingController::class, 'roleCreate'])->name('roles.create');
Route::post('/settings/users/roles', [App\Http\Controllers\UserSettingController::class, 'roleStore'])->name('roles.store');
Route::get('/settings/users/roles/{id}/edit', [App\Http\Controllers\UserSettingController::class, 'roleEdit'])->name('roles.edit');
Route::put('/settings/users/roles', [App\Http\Controllers\UserSettingController::class, 'roleUpdate'])->name('roles.update');
Route::get('/settings/users/roles/{id}', [App\Http\Controllers\UserSettingController::class, 'roleDestroy'])->name('roles.destroy');