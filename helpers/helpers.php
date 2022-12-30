<?php

use Messages\msgSender\MsgSender;

function msgSender()
{
    return app(MsgSender::class);
}
