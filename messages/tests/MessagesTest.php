<?php

namespace Messages\tests;

use Messages\Jobs\SendMessage;
use Messages\Log\LogFacade;
use Messages\msgSender\MsgSenderFacade;
use Tests\TestCase;


class MessagesTest extends TestCase
{

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_send_sms()
    {
        $message = ['to' => '989377362289', 'type' => 'sms', 'name' => 'jahan', 'message' => 'Your activation code is 22563.'];

        $mock = \Mockery::mock('overload:Messages\validation\Validation');
        $mock->shouldReceive('validate')
            ->once()
            ->andReturnTrue();

        MsgSenderFacade::shouldReceive('driver->send')
            ->once()
            ->andReturnTrue();

        LogFacade::shouldReceive('info')
            ->once();
        $job = new SendMessage();
        $job->handle($message);


    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function test_send_email()
    {
        $message = ['to' => 'jahan@gmail.com', 'type' => 'email', 'name' => 'jahan', 'message' => 'Your activation code is 22563.'];

        $mock = \Mockery::mock('overload:Messages\validation\Validation');
        $mock->shouldReceive('validate')
            ->once()
            ->andReturnTrue();

        MsgSenderFacade::shouldReceive('driver->send')
            ->once()
            ->andReturnTrue();

        LogFacade::shouldReceive('info')
            ->once();
        $job = new SendMessage();
        $job->handle($message);


    }


}
