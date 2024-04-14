<?php

namespace App\Models;

use Facades\App\Clients\ClientFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryService extends Model
{
    use HasFactory;

    public function client()
    {
        return ClientFactory::make($this);
    }
}
