<?php

use App\Http\Controllers\Api\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/orders/{order_id}/pay', [OrderController::class, 'pay']);
