<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

use starfederation\datastar\Constants;

trait EventTrait
{
    public ?string $eventId = null;
    public ?int $retryDuration = null;

    /**
     * @inerhitdoc
     */
    public function getOptions(): array
    {
        $options = [];

        if (!empty($this->eventId)) {
            $options['eventId'] = $this->eventId;
        }

        if (!empty($this->retryDuration) && $this->retryDuration != Constants::DefaultSSERetryDuration) {
            $options['retryDuration'] = $this->retryDuration;
        }

        return $options;
    }

    /**
     * @inerhitdoc
     */
    public function getDataLine(string|int ...$parts): string
    {
        if (!empty($parts[0])) {
            $parts[0] = trim($parts[0]);
        }

        return 'data: ' . implode(' ', $parts);
    }
}
