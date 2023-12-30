<?php


namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\StatusRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\UserActivationTokenRepository;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\Contracts\StatusRepositoryContract;
use App\Repositories\Contracts\UserActivationTokenRepositoryContract;

class RepositoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //
    }
    
    public function register()
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(StatusRepositoryContract::class, StatusRepository::class);
        $this->app->bind(UserActivationTokenRepositoryContract::class, UserActivationTokenRepository::class);
    }
}