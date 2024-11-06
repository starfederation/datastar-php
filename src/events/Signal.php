<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

use putyourlightson\datastar\events\EventInterface;
use starfederation\datastar\enums\EventType;

class Signal implements EventInterface
{
    public string $data;
    public ?bool $onlyIfMissing = null;

    public function __construct(string $data, ?bool $onlyIfMissing = null)
    {
        $this->data = $data;
        $this->onlyIfMissing = $onlyIfMissing;
    }

    /**
     * @inerhitdoc
     */
    public function getEventType(): EventType
    {
        return EventType::EventTypeSignal;
    }

    /**
     * @inerhitdoc
     */
    public function getDataLines(): array
    {
        $dataLines = [];

        if ($this->onlyIfMissing === true) {
            $dataLines[] = 'data: onlyIfMissing true';
        }

        $dataLines[] = 'data: store ' . $this->data;

        return $dataLines;
    }
}
