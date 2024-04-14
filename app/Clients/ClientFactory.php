<?php

namespace App\Clients;

use App\Models\DeliveryService;
use Illuminate\Support\Str;

class ClientFactory
{
    public function make(DeliveryService $delivery): Client
    {
        $class = "App\\Clients\\" . Str::studly($delivery->name);

        if (!class_exists($class)) {
            throw new ClientException('Client not found for ' . $delivery->name);
        }

        return new $class;
    }
}
