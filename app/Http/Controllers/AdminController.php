<?php

namespace App\Http\Controllers;

use App\Service\DevicesServiceInterface;

class AdminController extends Controller
{
    private DevicesServiceInterface $devicesService;
    public function __construct(DevicesServiceInterface $devicesServiceInterface)
    {
        $this->devicesService = $devicesServiceInterface;
    }

    public function getDevices(): object
    {
        return $this->devicesService->getDevices();
    }
}
