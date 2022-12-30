<?php

namespace Messages\msgSender;

use Illuminate\Support\Facades\Http;

class SmsSender implements MessageSender
{

    public function send($to, $message)
    {
        echo "Sending by sms." . PHP_EOL;
        
        $this->sendSms();

        echo "Sent by sms." . PHP_EOL;

        return true;
    }

    public function sendSms()
    {
        
    }
}
