<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

use starfederation\datastar\enums\EventType;

class Signal implements EventInterface
{
    use EventTrait;

    public string $data;
    public ?bool $onlyIfMissing = null;

    public function __construct(string $data, array $options = [])
    {
        $this->data = $data;

        foreach ($options as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * @inerhitdoc
     */
    public function getEventType(): EventType
    {
        return EventType::Signal;
    }

    /**
     * @inerhitdoc
     */
    public function getDataLines(): array
    {
        $data = trim($this->data);
        $dataLines = [];

        if ($this->onlyIfMissing === true) {
            $dataLines[] = $this->getDataLine('onlyIfMissing', 'true');
        }

        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            $dataLines[] = $this->getDataLine('store', $line);
        }

        return $dataLines;
    }
}
