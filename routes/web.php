<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndustryController as AdminIndustryController;
use App\Http\Controllers\Admin\CaseStudyController as AdminCaseStudyController;
use App\Http\Controllers\Admin\WhitePaperController as AdminWhitePaperController;
use App\Http\Controllers\Front\IndustryController;
use App\Http\Controllers\Admin\PortalController as AdminPortalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AssetController as AdminAssetController;
use App\Http\Controllers\Front\MemberDashboardController;

Route::post('/login', [AuthController::class, 'login'])->name('login.custom');
Route::post('/login-by-phone', [AuthController::class, 'loginByPhone'])->name('login.phone');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function() {
        
        Route::prefix('assets')->name('assets.')->group(function () {
            Route::get('/', [AdminAssetController::class, 'index'])->name('index');
            Route::get('/create', [AdminAssetController::class, 'create'])->name('create');
            Route::post('/', [AdminAssetController::class, 'store'])->name('store');
            Route::get('/{asset}/edit', [AdminAssetController::class, 'edit'])->name('edit');
            Route::put('/{asset}', [AdminAssetController::class, 'update'])->name('update');
            Route::delete('/{asset}', [AdminAssetController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('case-studies')->name('case-studies.')->group(function () {
            Route::get('/', [AdminCaseStudyController::class, 'index'])->name('index');
        });

        Route::prefix('white-papers')->name('white-papers.')->group(function () {
            Route::get('/', [AdminWhitePaperController::class, 'index'])->name('index');
        });

        Route::prefix('industries')->name('industries.')->group(function () {
            Route::get('/', [AdminIndustryController::class, 'index'])->name('index');
            Route::get('/create', [AdminIndustryController::class, 'create'])->name('create');
            Route::post('/', [AdminIndustryController::class, 'store'])->name('store');
            Route::get('/{industry}/edit', [AdminIndustryController::class, 'edit'])->name('edit');
            Route::put('/{industry}', [AdminIndustryController::class, 'update'])->name('update');
            Route::delete('/{industry}', [AdminIndustryController::class, 'destroy'])->name('destroy');
        });


        Route::get('/dashboard', [AdminPortalController::class, 'dashboard'])->name('admin.dashboard');
        // Route::get('/case-studies', [AdminPortalController::class, 'caseStudies'])->name('case-studies');
        // Route::get('/white-papers', [AdminPortalController::class, 'whitePapers'])->name('white-papers');

});

Route::prefix('member-dashboard')->name('member-dashboard.')->group(function () {
    Route::get('/', [MemberDashboardController::class, 'index'])->name('index');
});

Route::prefix('services')->name('services.')->group(function () {
    Route::get('/audit', function () {
        return view('services.audit');
    })->name('audit');

    Route::get('cooling_towers', function () {
        return view('services.cooling_towers');
    })->name('cooling_towers');

    Route::get('/elara_ai', function () {
        return view('services.elara_ai');
    })->name('elara_ai');

    Route::get('/scope_studies', function () {
        return view('services.scope_studies');
    })->name('scope_studies');

    Route::get('/meter_accuracy_optimization', function () {
        return view('services.meter_accuracy_optimization');
    })->name('meter_accuracy_optimization');

    Route::get('/smart_water_monitoring', function () {
        return view('services.smart_water_monitoring');
    })->name('smart_water_monitoring');

    Route::get('/smart_water_recovery', function () {
        return view('services.smart_water_recovery');
    })->name('smart_water_recovery');
});

Route::prefix('opportunities')->name('opportunities.')->group(function () {
    Route::get('/property_owners_managers', function () {
        return view('opportunities.property_owners_managers');
    })->name('property_owners_managers');

    Route::get('/mep_installers', function () {
        return view('opportunities.mep_installers');
    })->name('mep_installers');

    Route::get('/esg', function () {
        return view('opportunities.esg');
    })->name('esg');

    Route::get('/careers', function () {
        return view('opportunities.careers');
    })->name('careers');

    Route::get('/agents', function () {
        return view('opportunities.agents');
    })->name('agents');

    Route::get('/about', function () {
        return view('opportunities.about');
    })->name('about');

    Route::get('/investor', function () {
        return view('opportunities.investor');
    })->name('investor');
});

Route::prefix('industries')->name('industries.')->group(function () {
    Route::get('/', [IndustryController::class, 'index'])->name('index');
    Route::get('/{slug}', [IndustryController::class, 'showCaseStudy'])->name('case_study');
});

Route::prefix('resources')->name('resources.')->group(function () {
    Route::get('/selection_tool', function () {
        return view('resources.water_consumption_tool.selection_tool');
    })->name('tools.selection_tool');

    Route::get('/cooling_tower', function () {
        return view('resources.water_consumption_tool.cooling_tower');
    })->name('tools.cooling_tower');

   Route::get('/whole_building', function () {
        return view('resources.water_consumption_tool.whole_building');
    })->name('tools.whole_building');

    Route::get('/white_papers', function () {
        return view('resources.white_papers');
    })->name('white_papers');

    Route::get('/my_city_rebates', function () {
        return view('resources.my_city_rebates');
    })->name('my_city_rebates');

    Route::get('/financing_form', function () {
        return view('resources.financing_form');
    })->name('financing_form');
});
