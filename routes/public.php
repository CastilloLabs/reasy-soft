<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Landing Routes
|--------------------------------------------------------------------------
|
| These routes are for the public-facing landing page of the SaaS platform.
| They run on the main domain (reasy.com) without any subdomain.
|
*/

Route::middleware(['web'])->group(function () {
   // Landing page
   Route::get('/', function () {
      return view('landing.home');
   })->name('landing.home');

   // About page
   Route::get('/about', function () {
      return view('landing.about');
   })->name('landing.about');

   // Pricing page
   Route::get('/pricing', function () {
      return view('landing.pricing');
   })->name('landing.pricing');

   // Contact page
   Route::get('/contact', function () {
      return view('landing.contact');
   })->name('landing.contact');

   // Features page
   Route::get('/features', function () {
      return view('landing.features');
   })->name('landing.features');

   // Sign up for the platform (leads to tenant creation)
   Route::get('/signup', function () {
      return view('landing.signup');
   })->name('landing.signup');

   // Legal pages
   Route::get('/privacy', function () {
      return view('landing.privacy');
   })->name('landing.privacy');

   Route::get('/terms', function () {
      return view('landing.terms');
   })->name('landing.terms');

   // API for platform (public endpoints)
   Route::prefix('api/public')->group(function () {
      // Public API endpoints (if needed)
      Route::get('/status', function () {
         return response()->json(['status' => 'online', 'service' => 'Reasy SaaS Platform']);
      });
   });
});
