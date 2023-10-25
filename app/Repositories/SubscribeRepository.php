<?php

namespace App\Repositories;


use App\Models\Subscribes;

class SubscribeRepository implements SubscribeRepositoryInterface
{
    public function subscribe($deviceId, $receiptToken, $productId): object
    {
        return Subscribes::create([
            'device_id' => $deviceId,
            'receipt_token' => $receiptToken,
            'product_id' => $productId,
        ]);
    }
}
