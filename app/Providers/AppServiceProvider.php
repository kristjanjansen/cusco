<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::directive('component', function($expression) {
            return "<?php echo App\Helpers\Blade::bladeComponent{$expression} ?>";
        });

        Blade::directive('vuecomponent', function($expression) {
            return "<?php echo App\Helpers\Blade::vueComponent{$expression} ?>";
        });

    }
  

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
