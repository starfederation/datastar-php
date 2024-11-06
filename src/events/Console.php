<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

use starfederation\datastar\enums\EventType;

class Console implements EventInterface
{
    public string $mode;
    public string $message;

    public function __construct(string $mode, string $message)
    {
        $this->mode = $mode;
        $this->message = $message;
    }

    /**
     * @inerhitdoc
     */
    public function getEventType(): string
    {
        return EventType::CONSOLE;
    }

    /**
     * @inerhitdoc
     */
    public function getDataLines(): array
    {
        return ['data: ' . $this->mode . ' ' . $this->message];
    }
}
