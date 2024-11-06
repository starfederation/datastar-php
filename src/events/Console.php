<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

use putyourlightson\datastar\events\EventInterface;
use starfederation\datastar\enums\ConsoleMode;
use starfederation\datastar\enums\EventType;

class Console implements EventInterface
{
    public ConsoleMode $mode;
    public string $message;

    public function __construct(ConsoleMode $mode, string $message)
    {
        $this->mode = $mode;
        $this->message = $message;
    }

    /**
     * @inerhitdoc
     */
    public function getEventType(): EventType
    {
        return EventType::EventTypeConsole;
    }

    /**
     * @inerhitdoc
     */
    public function getDataLines(): array
    {
        return ['data: ' . $this->mode->value . ' ' . $this->message];
    }
}
