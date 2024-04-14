<?php

namespace App\Http\Interfaces;

use App\Http\Requests\DeleteShipmentRequest;
use App\Http\Requests\IndexShipmentRequest;
use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\DeliveryService;

interface ShipmentsInterface
{
    public function index(DeliveryService $delivery, IndexShipmentRequest $request);
    public function store(DeliveryService $delivery, StoreShipmentRequest $request);
    public function update(DeliveryService $delivery, UpdateShipmentRequest $request);
    public function destroy(DeliveryService $delivery, DeleteShipmentRequest $request);
}
