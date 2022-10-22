<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\AuthInterface;
use App\Interfaces\WalletInterface;
use App\Repositories\AuthRepository;
use App\Repositories\WalletRepository;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AuthInterface::class, AuthRepository::class);
        $this->app->bind(WalletInterface::class, WalletRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
