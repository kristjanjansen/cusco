<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
  

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        Collection::macro('render', function ($callback) {
            return $this
                ->map($callback)
                ->map(function($item) {
                    return (string) $item;
                })
                ->implode('');
        });

        Collection::macro('withoutLast', function () {
            return $this->slice(0, $this->count() - 1);
        });

        Collection::macro('withoutFirst', function () {
            return $this->slice(1, $this->count());
        });

        Collection::macro('pushIf', function ($condition, $item) {
            if ($condition) $this->push($item);
            return $this;
        });
    
    }
}
