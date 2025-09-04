<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Central Routes
|--------------------------------------------------------------------------
|
| Here you can register the central routes for your application.
| These routes are for platform administration and central functionality.
|
*/

Route::middleware(['web'])->group(function () {
   // Landing page for platform
   Route::get('/', function () {
      return view('welcome');
   })->name('home');

   // Auth routes for platform administrators
   require __DIR__ . '/auth.php';

   // Dashboard for platform administrators
   Route::view('dashboard', 'dashboard')
      ->middleware(['auth', 'verified'])
      ->name('dashboard');

   // Settings routes
   Route::middleware(['auth'])->group(function () {
      Route::redirect('settings', 'settings/profile');

      Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
      Volt::route('settings/password', 'settings.password')->name('settings.password');
      Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
   });

   // API routes for platform management
   Route::prefix('api/v1')->group(function () {
      // Platform admin APIs will go here
   });
});
