<?php

namespace App\Service;

use App\Repositories\DeviceRepositoryInterface;
use Justfeel\Response\ResponseCodes;
use Justfeel\Response\ResponseResult;

class DevicesService implements DevicesServiceInterface
{
    private DeviceRepositoryInterface $deviceRepository;

    public function __construct(DeviceRepositoryInterface $deviceRepositoryInterface)
    {
        $this->deviceRepository = $deviceRepositoryInterface;
    }

    public function getDevices(): object
    {
        try {
            return response()->json([
                'success' => true,
                'data' => $this->deviceRepository->getDevices(),
            ],ResponseCodes::HTTP_OK);
        } catch (\Exception $exception) {
            ResponseResult::generate(false, $exception->getMessage(), ResponseCodes::HTTP_BAD_REQUEST);
        }
    }
}
