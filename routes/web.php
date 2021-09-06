<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\LandLogController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectConsultantController;
use App\Http\Controllers\ProjectLogController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LibraryController;

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
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

//Contacts
Route::get('/contacts/export/', [ContactController::class, 'export'])->name('contacts.export');
Route::resource('contacts', ContactController::class);

//Companies
Route::get('/companies/export/', [CompanyController::class, 'export'])->name('companies.export');
Route::resource('companies', CompanyController::class);

//Lands
Route::get('/lands/download/{id}', [LandController::class, 'download'])->name('lands.download');
Route::get('/lands/export/', [LandController::class, 'export'])->name('lands.export');
Route::resource('lands', LandController::class);

Route::put('/lands/log/report', [LandLogController::class, 'check_report'])->name('lands.logs.check_report');
Route::resource('lands.logs', LandLogController::class);

//Projects
Route::get('/projects/export/', [ProjectController::class, 'export'])->name('projects.export');
Route::resource('projects', ProjectController::class);

Route::put('/projects/{project_id}/log/{log_id}/report', [ProjectLogController::class, 'update_report'])->name('projects.logs.update_report');
Route::put('/projects/{project_id}/log/{log_id}/noty', [ProjectLogController::class, 'update_noty'])->name('projects.logs.update_noty');
Route::resource('projects.logs', ProjectLogController::class);

Route::get('/projects/consultants/download/{id}', [ProjectConsultantController::class, 'download'])->name('projects.consultants.download');
Route::put('/projects/{project_id}/kap/{kap_id}/noty', [ProjectConsultantController::class, 'update_noty'])->name('projects.consultants.update_noty');
Route::resource('projects.consultants', ProjectConsultantController::class);

//Reports
Route::prefix('reports')->group(function() {
    Route::get('/land-logs', [ReportController::class, 'land_log'])->name('reports.land_log');
    Route::get('/land-logs/export/', [ReportController::class, 'land_log_export'])->name('reports.land_log.export');

    Route::get('/project-logs', [ReportController::class, 'project_log'])->name('reports.project_log');
    Route::get('/project-logs/export/', [ReportController::class, 'project_log_export'])->name('reports.project_log.export');
    
    Route::get('/land-ownerships', [ReportController::class, 'land_ownerships'])->name('reports.land_ownerships');
    Route::get('/land-ownerships/export/', [ReportController::class, 'land_ownerships_export'])->name('reports.land_ownerships.export');

    Route::get('/system-log', [ReportController::class, 'system_log'])->name('reports.system_log');
});


//Libraries
Route::get('/libraries/download/{id}', [LibraryController::class, 'download'])->name('libraries.download');
Route::resource('libraries', LibraryController::class)->except([
    'create', 'show'
]);