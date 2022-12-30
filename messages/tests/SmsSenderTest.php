<?php

namespace Messages\tests;


use Messages\msgSender\SmsSender;
use Tests\TestCase;


class SmsSenderTest extends TestCase
{
    public function test_send_sms()
    {
        $sms = new SmsSender();
        $response = $sms->send("989377362289", "Welcome to our website.");
        $this->assertTrue($response);
    }

}
