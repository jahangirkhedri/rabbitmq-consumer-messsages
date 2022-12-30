<?php

namespace Messages\Log;

use Illuminate\Support\Manager;

class LogManager extends Manager
{

    public function getDefaultDriver()
    {
        return config('messages.default_log_driver');
    }

    public function createMysqlDriver()
    {
        return new Mysql();
    }
}
