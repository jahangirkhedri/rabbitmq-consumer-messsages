<?php

namespace App\Jobs;

use Illuminate\Queue\Jobs\JobName;
use Illuminate\Support\Str;
use VladimirYuldashev\LaravelQueueRabbitMQ\Queue\Jobs\RabbitMQJob as BaseJob;

class RabbitmqJob extends BaseJob
{

    private const QUEUE_ASSIGN_TO_JOB = [
        'messages' => 'Messages\Jobs\SendMessage',
    ];

    public function fire()
    {
        $payload = json_decode($this->getRawBody(), true);
        [$class, $method] = JobName::parse(self::QUEUE_ASSIGN_TO_JOB[$this->queue] . "@handle");
        ($this->instance = $this->resolve($class))->{$method}($payload);
        $this->delete();
    }

    public function payload()
    {
        $jobName = self::QUEUE_ASSIGN_TO_JOB[$this->queue];
        return [
            'uuid' => Str::random(20),
            "displayName" => $jobName,
            "job" => "Illuminate\Queue\CallQueuedHandler@call",
            "maxTries" => null,
            "maxExceptions" => null,
            "failOnTimeout" => false,
            "backoff" => null,
            "timeout" => null,
            "data" => json_decode($this->getRawBody(), true),
            "id" => Str::random(20),
        ];
    }
}
