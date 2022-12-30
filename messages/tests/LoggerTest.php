<?php

namespace Messages\tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Messages\Log\LogFacade;
use Messages\Log\Mysql;
use Tests\TestCase;

class LoggerTest extends TestCase
{
    public function test_insert_to_db_by_facade()
    {
        $message = ['to' => '989377362289', 'type' => 'sms', 'name' => 'jahan', 'message' => 'Your activation code is 22563.','success'=>true];
        $mock = \Mockery::mock('overload:Messages\Log\Mysql');
        $mock->shouldReceive('info')
            ->once();
        LogFacade::info($message);
    }
}
