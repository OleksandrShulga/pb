<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository
{
    public function exists(string $idClient): bool
    {
        return Client::where('idClient', $idClient)->exists();
    }

    public function create(array $data): Client
    {
        return Client::create($data);
    }
}
