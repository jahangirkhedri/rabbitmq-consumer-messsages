<?php

namespace Messages;

use Illuminate\Support\ServiceProvider;
use Messages\commands\PublishMessages;
use Messages\Log\LogManager;
use Messages\msgSender\MsgSender;


class MessageSenderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([PublishMessages::class]);
        $this->mergeConfigFrom(__DIR__ . '/config.php', 'messages');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations/');

        app()->singleton(MsgSender::class);

        $this->app->singleton('msgSender', function ($app) {
            return new MsgSender($app);
        });

        $this->app->singleton('Logger', function ($app) {
            return new LogManager($app);
        });

    }
}
