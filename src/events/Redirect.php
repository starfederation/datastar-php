<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

use putyourlightson\datastar\events\EventInterface;
use starfederation\datastar\enums\EventType;

class Redirect implements EventInterface
{
    public string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    /**
     * @inerhitdoc
     */
    public function getEventType(): EventType
    {
        return EventType::EventTypeRedirect;
    }

    /**
     * @inerhitdoc
     */
    public function getDataLines(): array
    {
        return ['data: url ' . $this->url];
    }
}
