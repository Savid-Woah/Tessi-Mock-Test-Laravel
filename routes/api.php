<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\SkillController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::controller(EmployeeController::class)->group(function () {

    Route::post('/employees/post', 'addEmployee');
    Route::get('/employees', 'getAllEmployees');
    Route::get('/employees/get-all-by-salary-range/{min}/{max}', 'getEmployeesBySalaryRange');
    Route::get('/employees/get-details-by-id/{id}', 'getEmployeeDetails');
    Route::get('/employees/get-employee-by-email/{email}', 'getEmployeeByEmail');

});

Route::controller(SkillController::class)->group(function () {

    Route::get('/skills', 'getAllSkills');
});
