<?php

namespace App\Repositories;

use App\Models\Devices;

class DeviceRepository implements DeviceRepositoryInterface
{
    public function loginDevice($deviceToken): object
    {
        return Devices::updateOrCreate(['device_token' => $deviceToken], ['last_activity' => now()]);
    }

    public function findByToken($deviceToken): object
    {
        return Devices::where('device_token', $deviceToken)->first();
    }

    public function getDevices(): object
    {
        return Devices::orderByDesc('id')->get();
    }
}
