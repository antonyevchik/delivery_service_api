<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ShipmentsInterface;
use App\Http\Requests\DeleteShipmentRequest;
use App\Http\Requests\IndexShipmentRequest;
use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\DeliveryService;

class ShipmentsController extends Controller implements ShipmentsInterface
{
    public function index(DeliveryService $delivery, IndexShipmentRequest $request)
    {
        return $delivery->client()->index([
            'sender' => $request['sender']
        ]);
    }

    public function store(DeliveryService $delivery, StoreShipmentRequest $request)
    {
        $delivery->client()->store([
            'sender' => $request['sender'],
            'receiver' => $request['receiver'],
            'shipment' => $request['shipment']
        ]);

        return response()->json([
            'message' => 'Shipment created!'
        ], 201);
    }

    public function update(DeliveryService $delivery, UpdateShipmentRequest $request)
    {
        $delivery->client()->update([
            'sender' => $request['sender'],
            'receiver' => $request['receiver'],
            'shipment' => $request['shipment']
        ]);

        return response()->json([
            'message' => 'Shipment updated!'
        ]);
    }

    public function destroy(DeliveryService $delivery, DeleteShipmentRequest $request)
    {
        $delivery->client()->update([
            'shipment' => $request['shipment']
        ]);

        return response()->json([
            'message' => 'Shipment deleted!'
        ], 204);
    }
}
