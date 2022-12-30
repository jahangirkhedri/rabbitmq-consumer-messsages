<?php

namespace Messages\msgSender;

interface MessageSender
{
    public function send($to, $message);
}
