<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar;

class ServerSentEventData
{
    public string $eventType;
    public ?string $id;
    public array $data;
    public ?int $retry;

    public function __construct(
        string $eventType,
        ?string $id = null,
        array $data,
        ?int $retry = null,
    ) {
        $this->eventType = $eventType;
        $this->id = $id;
        $this->data = $data;
        $this->retry = $retry;
    }
}
