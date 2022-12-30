<?php

namespace Messages\Log;

use Illuminate\Support\Facades\Facade;

class LogFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'Logger';
    }
}
