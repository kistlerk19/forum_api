<?php


namespace App\Providers;

use App\Repositories\Contracts\PasswordResetRepositoryContract;
use App\Repositories\UserRepository;
use App\Repositories\StatusRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\UserActivationTokenRepository;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\Contracts\StatusRepositoryContract;
use App\Repositories\Contracts\UserActivationTokenRepositoryContract;
use App\Repositories\ImageRepository;
use App\Repositories\Contracts\ImageRepositoryContract;
use App\Repositories\PasswordResetRepository;

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
        $this->app->bind(PasswordResetRepositoryContract::class, PasswordResetRepository::class);
        $this->app->bind(UserActivationTokenRepositoryContract::class, UserActivationTokenRepository::class);
        $this->app->bind(ImageRepositoryContract::class, ImageRepository::class);
    }
}