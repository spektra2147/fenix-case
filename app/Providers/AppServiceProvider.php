<?php

namespace App\Providers;

use App\Models\Devices;
use App\Repositories\DeviceRepository;
use App\Repositories\DeviceRepositoryInterface;
use App\Repositories\SubscribeRepository;
use App\Repositories\SubscribeRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Service\DevicesService;
use App\Service\DevicesServiceInterface;
use App\Service\UserService;
use App\Service\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(DeviceRepositoryInterface::class, DeviceRepository::class);
        $this->app->bind(SubscribeRepositoryInterface::class, SubscribeRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(DevicesServiceInterface::class, DevicesService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
