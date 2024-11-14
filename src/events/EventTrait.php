<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

trait EventTrait
{
    public ?string $eventId = null;
    public ?int $retryDuration = null;
}
