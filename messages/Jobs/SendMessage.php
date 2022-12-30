<?php

namespace Messages\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Messages\Log\LogFacade;
use Messages\msgSender\MsgSenderFacade;
use Messages\validation\Validation;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle($payload)
    {
        Validation::validate($payload);

        $status = MsgSenderFacade::driver($payload['type'])
            ->send($payload['to'], $payload['message']);

        $payload['success']=$status;

        LogFacade::info($payload);

    }

}
