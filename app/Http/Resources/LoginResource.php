<?php

namespace App\Http\Resources;

use App\Models\Devices;
use Justfeel\Response\ResponseCodes;

class LoginResource
{

    protected $device;

    public function __construct(Devices $device)
    {
        $this->device = $device;
    }

    public function generate()
    {
        return response()->json([
            'success' => true,
            'message' => 'Login success',
            'data' => [
                'config' => $this->device->config ?? array(),
                'is_premium' => $this->device->is_premium,
            ]
        ], ResponseCodes::HTTP_OK);
    }
}
