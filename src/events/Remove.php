<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

use starfederation\datastar\enums\EventType;

class Remove implements EventInterface
{
    public string $selector;

    public function __construct(string $selector)
    {
        $this->selector = $selector;
    }

    /**
     * @inerhitdoc
     */
    public function getEventType(): EventType
    {
        return EventType::EventTypeRemove;
    }

    /**
     * @inerhitdoc
     */
    public function getDataLines(): array
    {
        return ['data: selector ' . $this->selector];
    }
}
