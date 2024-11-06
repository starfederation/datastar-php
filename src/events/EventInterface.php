<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\datastar\events;

use starfederation\datastar\enums\EventType;

/**
 * A Datastar event interface.
 */
interface EventInterface
{
    /**
     * Returns the event type for this event.
     */
    public function getEventType(): EventType;

    /**
     * Returns the data lines for this event.
     *
     * @return string[]
     */
    public function getDataLines(): array;
}
