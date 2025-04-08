<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LawyerController;
use Illuminate\Support\Facades\Route;

//  Authenticated Routes
Route::middleware('auth:sanctum')->group(function () {

    //  Profile & Logout
    Route::get('/user', [AuthController::class, 'userProfile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    //  Admin Only Routes
    Route::middleware('role:admin')->group(function () {

        //   employees managment 
        Route::apiResource('/employees', EmployeeController::class);
        Route::post('/employees/create/{id}', [EmployeeController::class, 'store']);

        //   lawyers managment
        Route::apiResource('/lawyers', LawyerController::class);
        Route::post('/lawyers/create/{id}', [LawyerController::class, 'store']);

   
    });

    // 📌 Shared routes (لجميع المستخدمين المسجلين)
   
    
});

