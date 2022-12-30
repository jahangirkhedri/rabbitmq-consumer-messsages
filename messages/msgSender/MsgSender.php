<?php

namespace Messages\msgSender;

use Illuminate\Support\Manager;

class MsgSender extends Manager
{

    public function getDefaultDriver()
    {
        return config('messages.default_msg_driver');
    }

    public function createSmsDriver()
    {
        return new SmsSender();
    }

    public function createEmailDriver()
    {
        return new MailSender();
    }
}
