<?php

namespace App\Clients;

use Illuminate\Support\Facades\Http;

class NovaPoshta implements Client
{
    private string $key = '';

    public function __construct()
    {
        $this->key = config('services.clients.nova_poshta.key');
    }

    public function index(array $attributes)
    {
        return Http::withToken($this->key)
            ->post(sprintf('%s/index', $this->endpoint()), $attributes)->json();
    }

    public function findById(array $attributes)
    {
        return Http::withToken($this->key)
            ->post(sprintf('%s/findById', $this->endpoint()), $attributes)->json();
    }

    public function store(array $attributes)
    {
        return Http::withToken($this->key)
            ->post(sprintf('%s/store', $this->endpoint()), $attributes)->json();
    }

    public function update(array $attributes)
    {
        return Http::withToken($this->key)
            ->put(sprintf('%s/update', $this->endpoint()), $attributes)->json();
    }

    public function delete(array $attributes)
    {
        return Http::withToken($this->key)
            ->put(sprintf('%s/delete', $this->endpoint()), $attributes)->json();
    }

    public function endpoint(): string
    {
        return "https://api.novaposhta.ua/";
    }
}
