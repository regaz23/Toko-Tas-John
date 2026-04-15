<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\DefaultViewData;

Route::middleware(([
    "auth",
    DefaultViewData::class
]))->group(function() {
    Route::get('/', [DashboardController::class, "index"])->name("dashboard");
    Route::prefix("category")->name("category.")->middleware("can:admin")->group(function() {
        Route::get("/", [CategoryController::class, "index"])->name("index");
        Route::get("/create", [CategoryController::class, "create"])->name("create");
        Route::post("/store", [CategoryController::class, "store"]);
        Route::get("/edit/{id}", [CategoryController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [CategoryController::class, "update"]);
        Route::get("/destroy/{id}", [CategoryController::class, "destroy"]);
    });
    Route::prefix("product")->name("product.")->group(function() {
        Route::get("/", [ProductController::class, "index"])->name("index");
        Route::get("/create", [ProductController::class, "create"])->name("create");
        Route::post("/store", [ProductController::class, "store"]);
        Route::get("/edit/{id}", [ProductController::class, "edit"])->name("edit");
        Route::post("/update/{id}", [ProductController::class, "update"]);
        Route::get("/destroy/{id}", [ProductController::class, "destroy"]);
    });
    Route::prefix("transaction")->name("transaction.")->group(function() {
        Route::get("/sales", [TransactionController::class, "index"])->name("saled");
        Route::get("/purchase", [TransactionController::class, "purchase"])->name("purchase");
        Route::post("/sales/store", [TransactionController::class, "store"]);
        Route::post("/purchase/store", [TransactionController::class, "purchase_store"]);
    });
    Route::prefix("setting")->name("setting.")->middleware("can:admin")->group(function() {
        Route::get("/", [SettingController::class, "index"])->name("index");
        Route::post("/", [SettingController::class, "store"])->name("store");
    });
    Route::prefix("report")->name("report.")->middleware("can:admin")->group(function() {
        Route::get("/", [ReportController::class, "index"]);
    });
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, "login"])->name("login");
    Route::post('/signin', [AuthController::class, "signin"]);
    Route::get('/logout', [AuthController::class, "logout"]);
});