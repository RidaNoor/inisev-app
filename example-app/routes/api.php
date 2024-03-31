<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\SubscriptionsController;


// Post Routes
Route::post('posts', [PostsController::class, 'store']);

// Subscription Routes
Route::post('subscription', [SubscriptionsController::class, 'subscribe']);