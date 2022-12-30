<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('/blogs', BlogController::class);
});
?>