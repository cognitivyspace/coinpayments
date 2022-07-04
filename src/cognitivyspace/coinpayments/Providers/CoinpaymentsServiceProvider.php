<?php namespace CognitivySpace\Coinpayments\Providers;

use CognitivySpace\LPSP\ServiceProvider;
use CognitivySpace\Coinpayments\Models\Deposit;
use CognitivySpace\Coinpayments\SDKCoinpayments;
use CognitivySpace\Coinpayments\Models\Withdrawal;
use CognitivySpace\Coinpayments\Models\Transaction;
use CognitivySpace\Coinpayments\Facades\Coinpayments;
use CognitivySpace\Coinpayments\Observables\DepositObservable;
use CognitivySpace\Coinpayments\Observables\WithdrawalObservable;
use CognitivySpace\Coinpayments\Observables\TransactionObservable;
use CognitivySpace\Coinpayments\Controllers\CoinpaymentsController;

class CoinpaymentsServiceProvider extends ServiceProvider
{
    const SINGLETON = 'coinpayments';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerConfig(__DIR__ . '/../../../config/coinpayments.php', 'coinpayments.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../../database/migrations');

        Deposit::observe(new DepositObservable());
        Withdrawal::observe(new WithdrawalObservable());
        Transaction::observe(new TransactionObservable());
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(self::SINGLETON, function ($app) {
            return new SDKCoinpayments($app);
        });

        $this->registerAlias(Coinpayments::class, 'Coinpayments');
        $this->registerRoute();

        $this->mergeConfigFrom(__DIR__ . '/../../../config/coinpayments.php', 'coinpayments');
    }

    private function registerRoute()
    {
        $is_enabled = config('coinpayments.route.enabled');
        $path = config('coinpayments.route.path');

        if (!$is_enabled) {
            return;
        }

        $router = $this->router();
        $router->post($path, ['as' => 'coinpayments.ipn', 'uses' => CoinpaymentsController::class . '@validateIPN']);
    }
}
