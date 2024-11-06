<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

interface EventInterface
{
    /**
     * Returns the event type for this event.
     */
    public function getEventType(): string;

    /**
     * Returns the data lines for this event.
     *
     * @return string[]
     */
    public function getDataLines(): array;
}
