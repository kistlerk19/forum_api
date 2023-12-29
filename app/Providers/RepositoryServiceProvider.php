<?php


namespace App\Providers;

use App\Repositories\UserRepository;
use App\Repositories\StatusRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Repositories\Contracts\StatusRepositoryContract;

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
    }
}