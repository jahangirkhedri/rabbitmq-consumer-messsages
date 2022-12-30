<?php

namespace Messages\commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Queue;

class PublishMessages extends Command
{
    protected $signature = 'publish:message';

    protected $description = 'Publish messages for test consumer';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $messages = [
            ['to' => 'jahan@gmail.com', 'type' => 'email', 'name' => 'jahan', 'message' => 'This is a message for test.'],
            ['to' => 'jahan@gmail.com', 'type' => 'email', 'name' => 'jahan', 'message' => 'This is a message for test.'],
            ['to' => '989377362289', 'type' => 'sms', 'name' => 'jahan', 'message' => 'Your activation code is 22563.'],
            ['to' => '219189262231', 'type' => 'sms', 'name' => 'jahan', 'message' => 'Welcome to our application.'],
            ['to' => 'jahan@gmail.com', 'type' => 'sms', 'name' => 'jahan', 'message' => 'Hi dear jahan.'], // This is incorrect message ('to' is email but 'type' is sms)
            ['to' => 'jahan@gmail.com', 'type' => 'email', 'name' => 'jahan', 'message' => 'This is an email for active account.'],
        ];
        foreach ($messages as $message)
            Queue::connection('rabbitmq')->pushRaw(json_encode($message), 'messages');
    }
}
