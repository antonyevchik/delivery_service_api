<?php

namespace App\Clients;

interface Client
{
    public function index(array $attributes);
    public function store(array $attributes);
}
