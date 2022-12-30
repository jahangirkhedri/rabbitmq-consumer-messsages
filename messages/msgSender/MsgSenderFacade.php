<?php

namespace Messages\msgSender;

use Illuminate\Support\Facades\Facade;

class MsgSenderFacade extends Facade
{
    public static function getFacadeAccessor()
    {
        return 'msgSender';
    }
}
