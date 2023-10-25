<?php

namespace App\Repositories;

interface DeviceRepositoryInterface
{
    public function loginDevice($deviceToken): object;

    public function findByToken($deviceToken): object;

    public function getDevices(): object;
}
