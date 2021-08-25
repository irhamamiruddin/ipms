<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingDevelopmentController;
use App\Http\Controllers\SettingLogController;
use App\Http\Controllers\SettingOtherController;
use App\Http\Controllers\SettingUserController;
use App\Http\Controllers\UserRoleController;

Route::prefix('settings')->group(function() {
    //Development Components
    Route::prefix('development-components')->group(function() {
        Route::get('', [SettingDevelopmentController::class, 'index'])->name('settings.components.index');

        //Type R1
        Route::prefix('r1')->group(function() {
            Route::post('', [SettingDevelopmentController::class, 'storeR1'])->name('r1.store');
            Route::put('', [SettingDevelopmentController::class, 'updateR1'])->name('r1.update');
            Route::get('/{id}', [SettingDevelopmentController::class, 'destroyR1'])->name('r1.destroy');
        });
        
        //Type R2
        Route::prefix('r2')->group(function() {
            Route::post('', [SettingDevelopmentController::class, 'storeR2'])->name('r2.store');
            Route::put('', [SettingDevelopmentController::class, 'updateR2'])->name('r2.update');
            Route::get('/{id}', [SettingDevelopmentController::class, 'destroyR2'])->name('r2.destroy');
        });
        
        //Type R3
        Route::prefix('r3')->group(function() {
            Route::post('', [SettingDevelopmentController::class, 'storeR3'])->name('r3.store');
            Route::put('', [SettingDevelopmentController::class, 'updateR3'])->name('r3.update');
            Route::get('/{id}', [SettingDevelopmentController::class, 'destroyR3'])->name('r3.destroy');
        });
        
        //Type A1
        Route::prefix('a1')->group(function() {
            Route::post('', [SettingDevelopmentController::class, 'storeA1'])->name('a1.store');
            Route::put('', [SettingDevelopmentController::class, 'updateA1'])->name('a1.update');
            Route::get('/{id}', [SettingDevelopmentController::class, 'destroyA1'])->name('a1.destroy');
        });
        
        //Type C1
        Route::prefix('c1')->group(function() {
            Route::post('', [SettingDevelopmentController::class, 'storeC1'])->name('c1.store');
            Route::put('', [SettingDevelopmentController::class, 'updateC1'])->name('c1.update');
            Route::get('/{id}', [SettingDevelopmentController::class, 'destroyC1'])->name('c1.destroy');
        });
        
        //Type O1
        Route::prefix('o1')->group(function() {
            Route::post('', [SettingDevelopmentController::class, 'storeO1'])->name('o1.store');
            Route::put('', [SettingDevelopmentController::class, 'updateO1'])->name('o1.update');
            Route::get('/{id}', [SettingDevelopmentController::class, 'destroyO1'])->name('o1.destroy');
        });
    });

    //Logs
    Route::prefix('logs')->group(function() {
        Route::get('', [SettingLogController::class, 'index'])->name('settings.logs.index');

        //Log Nature
        Route::prefix('log-natures')->group(function() {
            Route::post('', [SettingLogController::class, 'storeNature'])->name('nature.store');
            Route::put('', [SettingLogController::class, 'updateNature'])->name('nature.update');
            Route::get('/{id}', [SettingLogController::class, 'destroyNature'])->name('nature.destroy');
        });

        //Level 1
        Route::prefix('level-1')->group(function() {
            Route::post('', [SettingLogController::class, 'storeLevel1'])->name('level1.store');
            Route::put('', [SettingLogController::class, 'updateLevel1'])->name('level1.update');
            Route::get('/{id}', [SettingLogController::class, 'destroyLevel1'])->name('level1.destroy');
        });

        //Level 2
        Route::prefix('level-2')->group(function() {
            Route::post('', [SettingLogController::class, 'storeLevel2'])->name('level2.store');
            Route::put('', [SettingLogController::class, 'updateLevel2'])->name('level2.update');
            Route::get('/{id}', [SettingLogController::class, 'destroyLevel2'])->name('level2.destroy');
        });

        //Level 3
        Route::prefix('level-3')->group(function() {
            Route::post('', [SettingLogController::class, 'storeLevel3'])->name('level3.store');
            Route::put('', [SettingLogController::class, 'updateLevel3'])->name('level3.update');
            Route::get('/{id}', [SettingLogController::class, 'destroyLevel3'])->name('level3.destroy');            
        });
    });

    //Others
    Route::prefix('others')->group(function() {
        Route::get('', [SettingOtherController::class, 'index'])->name('settings.others.index');

        //Business Natures
        Route::prefix('business-nature')->group(function() {
            Route::post('', [SettingOtherController::class, 'storeBusiness'])->name('business.store');
            Route::put('', [SettingOtherController::class, 'updateBusiness'])->name('business.update');
            Route::get('/{id}', [SettingOtherController::class, 'destroyBusiness'])->name('business.destroy');
        });

        //Categories of Land
        Route::prefix('categories-of-land')->group(function() {
            Route::post('', [SettingOtherController::class, 'storeCategory'])->name('category.store');
            Route::put('', [SettingOtherController::class, 'updateCategory'])->name('category.update');
            Route::get('/{id}', [SettingOtherController::class, 'destroyCategory'])->name('category.destroy');
        });

        //Consents
        Route::prefix('consent')->group(function() {
            Route::post('', [SettingOtherController::class, 'storeConsent'])->name('consent.store');
            Route::put('', [SettingOtherController::class, 'updateConsent'])->name('consent.update');
            Route::get('/{id}', [SettingOtherController::class, 'destroyConsent'])->name('consent.destroy');
        });

        //Consultant Roles
        Route::prefix('consultant-role')->group(function() {
            Route::post('', [SettingOtherController::class, 'storeRole'])->name('role.store');
            Route::put('', [SettingOtherController::class, 'updateRole'])->name('role.update');
            Route::get('/{id}', [SettingOtherController::class, 'destroyRole'])->name('role.destroy');
        });

        //Land Acquisition Status
        Route::prefix('land-acquisition-status')->group(function() {
            Route::post('', [SettingOtherController::class, 'storeStatus'])->name('status.store');
            Route::put('', [SettingOtherController::class, 'updateStatus'])->name('status.update');
            Route::get('/{id}', [SettingOtherController::class, 'destroyStatus'])->name('status.destroy');
        });

        //Land Classification
        Route::prefix('land-classification')->group(function() {
            Route::post('', [SettingOtherController::class, 'storeClassification'])->name('classification.store');
            Route::put('', [SettingOtherController::class, 'updateClassification'])->name('classification.update');
            Route::get('/{id}', [SettingOtherController::class, 'destroyClassification'])->name('classification.destroy');
        });

        //Library Types
        Route::prefix('library-type')->group(function() {
            Route::post('', [SettingOtherController::class, 'storeLibrary'])->name('library.store');
            Route::put('', [SettingOtherController::class, 'updateLibrary'])->name('library.update');
            Route::get('/{id}', [SettingOtherController::class, 'destroyLibrary'])->name('library.destroy');
        });

        //Project Status
        Route::prefix('project-status')->group(function() {
            Route::post('', [SettingOtherController::class, 'storeProject'])->name('project.store');
            Route::put('', [SettingOtherController::class, 'updateProject'])->name('project.update');
            Route::get('/{id}', [SettingOtherController::class, 'destroyProject'])->name('project.destroy');
        });

        //Type of Agreement
        Route::prefix('type-of-agreement')->group(function() {
            Route::post('', [SettingOtherController::class, 'storeAgreement'])->name('agreement.store');
            Route::put('', [SettingOtherController::class, 'updateAgreement'])->name('agreement.update');
            Route::get('/{id}', [SettingOtherController::class, 'destroyAgreement'])->name('agreement.destroy');
        });
    });

    //Users
    Route::resource('users', SettingUserController::class)->except([
        'show'
    ]);
    Route::resource('user-roles', UserRoleController::class)->except([
        'show'
    ]);
});
?>