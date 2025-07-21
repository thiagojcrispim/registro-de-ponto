<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClienteApiController;
use App\Http\Controllers\Api\RepresentanteApiController;

Route::get('/', fn () => response()->json(['message' => 'API ativa']));
