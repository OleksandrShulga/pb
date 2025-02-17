<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CreditRequest;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    private $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Отримую всі записи з таблиці клієнтів та повертає їх у форматі JSON.
     *
     * @return \Illuminate\Http\JsonResponse JSON-відповідь з усіма клієнтами.
     */
    public function index(): JsonResponse
    {
        return response()->json(Client::all());
    }

    /**
     * Створює нового клієнта та розраховує кредитний ліміт.
     *
     * Метод перевіряє вік клієнта, наявність клієнта з таким ідентифікатором, конвертує валюту, визначає коефіцієнт
     * на основі номеру телефону і розраховує кредитний ліміт. Якщо всі перевірки проходять успішно, клієнт зберігається.
     *
     * @param  \App\Http\Requests\CreditRequest  $request Валідований запит з даними клієнта.
     * @return \Illuminate\Http\JsonResponse Відповідь у форматі JSON з результатом операції.
     */
    public function store(CreditRequest $request): JsonResponse
    {
        $data = $request->validated();
        $result = $this->clientService->storeClient($data);

        if (isset($result['error'])) {
            return response()->json(['error' => $result['error']], 400);
        }

        return response()->json($result);
    }

    /**
     * Видаляю клієнта за його унікальним ID.
     *
     * @param  int  $id Ідентифікатор клієнта, якого потрібно видалити.
     * @return \Illuminate\Http\JsonResponse JSON-відповідь з повідомленням про успішне видалення.
     */
    public function destroy($id): JsonResponse
    {
        Client::where('idClient', $id)->delete();
        return response()->json(['message' => 'Клієнт видалений']);
    }
}
