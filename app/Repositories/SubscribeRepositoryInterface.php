<?php

namespace App\Repositories;

interface SubscribeRepositoryInterface
{
    public function subscribe($deviceId, $receiptToken, $productId): object;
}
