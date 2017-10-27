<?php

namespace Bpocallaghan\Changelogs;

use Illuminate\Support\ServiceProvider;
use Bpocallaghan\Changelogs\Commands\PublishCommand;

class ChangelogsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views/admin', 'admin.changelogs');
        $this->loadViewsFrom(__DIR__ . '/../resources/views/website', 'website.changelogs');

        $this->registerCommand(PublishCommand::class, 'publish');
    }

    /**
     * Register a singleton command
     *
     * @param $class
     * @param $command
     */
    private function registerCommand($class, $command)
    {
        $path = 'bpocallaghan.changelogs.commands.';
        $this->app->singleton($path . $command, function ($app) use ($class) {
            return $app[$class];
        });

        $this->commands($path . $command);
    }
}
