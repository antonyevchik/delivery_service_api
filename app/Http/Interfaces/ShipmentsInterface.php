<?php

namespace App\Http\Interfaces;

use App\Http\Requests\DeleteShipmentRequest;
use App\Http\Requests\FindByIdShipmentRequest;
use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\DeliveryService;

interface ShipmentsInterface
{
    public function findById(DeliveryService $delivery, int $shipment, FindByIdShipmentRequest $request);
    public function store(DeliveryService $delivery, StoreShipmentRequest $request);
    public function update(DeliveryService $delivery, int $shipment, UpdateShipmentRequest $request);
    public function destroy(DeliveryService $delivery, int $shipment, DeleteShipmentRequest $request);
}
