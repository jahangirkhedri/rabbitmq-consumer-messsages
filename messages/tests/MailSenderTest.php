<?php

namespace Messages\tests;

use Illuminate\Support\Facades\Cache;
use Messages\msgSender\MailSender;
use PHPUnit\Framework\TestCase;

class mailSenderTest extends TestCase
{
    public function test_send_email()
    {
        $sms = new MailSender();
        $response = $sms->send("jahan@gmail.com", "Welcome to our website.");
        $this->assertTrue($response);
    }


}
