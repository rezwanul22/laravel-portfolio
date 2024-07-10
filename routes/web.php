<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForntendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PortfolioMainController;
use App\Http\Controllers\ServiceMainController;







// Fornt-end start**

Route::get('/',[ForntendController::class,'index'])->name('Fornt-end');

// Fornt-end end**



// Back-end start***

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('/dashboard',[DashboardController::class,'index'])->name('Dashboard');
    Route::get('dashboard/main',[MainController::class,'index'])->name('Main');
    Route::put('dashboard/main',[MainController::class,'update'])->name('main.update');
    Route::get('dashboard/services/create',[ServiceMainController::class,'create'])->name('main.create');
    Route::post('dashboard/services/create',[ServiceMainController::class,'store'])->name('main.create.store');
    Route::get('dashboard/services/list',[ServiceMainController::class,'list'])->name('main.create.list');
    Route::get('dashboard/services/edit/{id}',[ServiceMainController::class,'edit'])->name('main.service.edit');
    Route::post('dashboard/services/update/{id}',[ServiceMainController::class,'update'])->name('main.service.update');
    Route::delete('dashboard/services/destroy/{id}',[ServiceMainController::class,'destroy'])->name('main.service.destroy');

    ///portfolios part *******

    Route::get('dashboard/portfolios/create',[PortfolioMainController::class,'create'])->name('portfolios.create');
    Route::put('dashboard/portfolios/create',[PortfolioMainController::class,'store'])->name('portfolios.create.store');
    Route::get('dashboard/portfolios/list',[PortfolioMainController::class,'list'])->name('portfolios.create.list');
    Route::get('dashboard/portfolios/edit/{id}',[PortfolioMainController::class,'edit'])->name('portfolios.edit');
    Route::post('dashboard/portfolios/update/{id}',[PortfolioMainController::class,'update'])->name('portfolios.update');
    Route::delete('dashboard/portfolios/destroy/{id}',[PortfolioMainController::class,'destroy'])->name('portfolios.destroy');


});

// Backend-end end**
