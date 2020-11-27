<?php

namespace Couchjanus\Widget;

use Illuminate\Support\ServiceProvider;
use Couchjanus\Widget\Commands\WidgetMakeCommand;
use Blade;

class WidgetServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
        $this->registerBladeDirectives();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/widget.php', 'widget');

        // Register the service the package provides.
        $this->app->singleton('widget', function ($app) {
            return new Widget;
        });

        $this->app->singleton('command.widget.make', function ($app) {
            return new WidgetMakeCommand($app['files']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['widget'];
    }

    public function registerBladeDirectives()
    {
        Blade::directive('widget', function ($name) {			
			return "<?php echo app('widget')->show($name); ?>";
		});
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/widget.php' => config_path('widget.php'),
        ], 'widget.config');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/widgets'),
        ], 'widget.views');
        $this->publishes([__DIR__ . '/../resources/app/' => app_path() . '/'], 'widget.views');

        $this->commands('command.widget.make');
    }
}
