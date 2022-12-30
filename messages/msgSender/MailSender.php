<?php

namespace Messages\msgSender;

use Illuminate\Support\Facades\Cache;

class MailSender implements MessageSender
{
    public function send($to, $message)
    {
        echo "Sending by email." . PHP_EOL;
        $this->mail();
        echo "Sent by email." . PHP_EOL;
        return true;
    }

    public function mail()
    {

    }
}
