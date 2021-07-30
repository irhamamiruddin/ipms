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
Route::resource('contacts', ContactController::class);

//Companies
Route::resource('companies', CompanyController::class);

//Lands
Route::resource('lands', LandController::class);

Route::put('/lands/log/report', [LandLogController::class, 'check_report'])->name('lands.logs.check_report');
Route::resource('lands.logs', LandLogController::class);

//Projects
Route::resource('projects', ProjectController::class);

Route::put('/projects/log/report', [ProjectLogController::class, 'check_report'])->name('projects.logs.check_report');
Route::resource('projects.logs', ProjectLogController::class);

Route::resource('projects.consultants', ProjectConsultantController::class);

//Reports
Route::prefix('reports')->group(function() {
    Route::get('/land-logs', [ReportController::class, 'land_log'])->name('reports.land_log');
    Route::get('/project-logs', [ReportController::class, 'project_log'])->name('reports.project_log');
    Route::get('/land-ownerships', [ReportController::class, 'land_ownerships'])->name('reports.land_ownerships');
    Route::get('/system-log', [ReportController::class, 'system_log'])->name('reports.system_log');
});


//Libraries
Route::resource('libraries', LibraryController::class)->except([
    'create', 'show'
]);