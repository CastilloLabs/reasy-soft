<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
| Note: These are fallback routes. Central routes are in routes/central.php
| and tenant routes are in routes/tenant.php
|
*/

// Fallback route - this should not normally be hit
Route::fallback(function () {
    return response()->json([
        'message' => 'Route not found. Check your domain configuration.',
        'current_domain' => request()->getHost(),
        'central_domains' => config('tenancy.central_domains'),
    ], 404);
});
