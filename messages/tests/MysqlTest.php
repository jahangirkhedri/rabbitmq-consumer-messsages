<?php

namespace Messages\tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Messages\Log\Mysql;
use Tests\TestCase;

class MysqlTest extends TestCase
{
    use  RefreshDatabase;
    public function test_insert__to_mysql_database()
    {
        $message = ['to' => '989377362289', 'type' => 'sms', 'name' => 'jahan', 'message' => 'Your activation code is 22563.','success'=>true];
        $mysql = new Mysql();
        $mysql->log('info',$message);
        $this->assertDatabaseCount('messages_logs', 1);
    }
}
