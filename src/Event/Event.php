<?php

namespace App\Event;

use Symfony\Component\EventDispatcher\Event as SymfonyEvent;

/**
 * Class Event
 */
abstract class Event extends SymfonyEvent
{
    /**
     * @return string
     */
    abstract public function getEventName(): string;
}