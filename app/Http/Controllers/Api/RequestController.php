<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\JsonResponse;

class RequestController extends Controller {

    /**
     * Отримую список клієнтів з полями "Ref" та "limitItog" та повертає їх у форматі JSON.
     *
     * @return \Illuminate\Http\JsonResponse JSON-відповідь зі списком клієнтів.
     */
    public function index(): JsonResponse {
        return response()->json(Client::select('Ref', 'limitItog')->get());
    }
}
