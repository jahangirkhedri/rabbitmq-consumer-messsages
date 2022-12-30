<?php

namespace Messages\Log;

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class Mysql extends AbstractLogger implements LoggerInterface
{
    public function log($level, $message, array $context = array())
    {
        DB::table('messages_logs')
            ->insert([
                'to_user' => $message['to'],
                'type' => $message['type'],
                'name' => $message['name'],
                'message' => $message['message'],
                'success' => $message['success'],
                'sent' => Date::now(),

            ]);
    }
}
