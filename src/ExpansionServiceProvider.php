<?php

namespace LaravelExpansions\Function;

use Illuminate\Support\ServiceProvider;
use LaravelExpansions\Function\Commands\ConsoleMakeFunctionCommand;

class ExpansionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->publishes([
            __DIR__ . '/handler' => $this->app->basePath('handler'),
        ], 'expantion-function');
        $this->publishes([
            __DIR__ . '/Commands/stubs/function.stub' => $this->app->basePath('stubs/function.stub'),
        ], 'expantion-function-stub');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ConsoleMakeFunctionCommand::class,
            ]);
        }
    }
}
