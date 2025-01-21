<?php

namespace App\Providers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\ClientRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\SaleRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ClientRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SalesRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(UserRepositoryInterface::class,UserRepository::class);
        app()->bind(CategoryRepositoryInterface::class,CategoryRepository::class);
        app()->bind(ProductRepositoryInterface::class,ProductRepository::class);
        app()->bind(ClientRepositoryInterface::class,ClientRepository::class);
        app()->bind(SaleRepositoryInterface::class,SalesRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
