<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use App\Http\Requests\Subscribe;
use App\Http\Resources\LoginResource;
use App\Repositories\DeviceRepositoryInterface;
use App\Repositories\SubscribeRepositoryInterface;
use Justfeel\Response\ResponseCodes;
use Justfeel\Response\ResponseResult;

class FenixController extends Controller
{
    private DeviceRepositoryInterface $deviceRepository;
    private SubscribeRepositoryInterface $subscribeRepository;

    public function __construct(
        DeviceRepositoryInterface    $deviceRepository,
        SubscribeRepositoryInterface $subscribeRepository
    )
    {
        $this->deviceRepository = $deviceRepository;
        $this->subscribeRepository = $subscribeRepository;
    }

    public function login(Login $request): object
    {
        try {
            $request->validated();

            $deviceToken = $request->get('deviceToken');

            $device = $this->deviceRepository->loginDevice($deviceToken);

            $resource = new LoginResource($device);

            return $resource->generate();

        } catch (\Exception $exception) {
            return ResponseResult::generate(false, $exception->getMessage(), ResponseCodes::HTTP_BAD_REQUEST);
        }
    }

    public function subscribe(Subscribe $request): object
    {
        try {
            $request->validated();

            $deviceToken = $request->get('deviceToken');
            $productId = $request->get('productId');
            $receiptToken = $request->get('receiptToken');

            if (!$device = $this->deviceRepository->findByToken($deviceToken)) {
                return ResponseResult::generate(false, 'Device not found', ResponseCodes::HTTP_BAD_REQUEST);
            }

            $this->subscribeRepository->subscribe($device->getID(), $receiptToken, $productId);
            $device->setPremium(true);

            return ResponseResult::generate(true, 'Subscription completed', ResponseCodes::HTTP_OK);
        } catch (\Exception $exception) {
            return ResponseResult::generate(false, $exception->getMessage(), ResponseCodes::HTTP_BAD_REQUEST);
        }
    }
}
