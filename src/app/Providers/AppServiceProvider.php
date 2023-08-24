<?php

namespace App\Providers;

use App\Models\Consumption;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('new_consumption', function ($attribute, $value, $parameters, $validator) {
            $userId = auth()->id();
            $columnName = $parameters[0];
            $consumptionFirst = Consumption::where('user_id', $userId)->orderBy('id', 'desc')->first();

            return $consumptionFirst === null || $value > $consumptionFirst->$columnName;
        });
    }
}
