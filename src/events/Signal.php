<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

use starfederation\datastar\Constants;
use starfederation\datastar\enums\EventType;

class Signal implements EventInterface
{
    use EventTrait;

    public string $data;
    public bool $onlyIfMissing = Constants::DefaultOnlyIfMissing;

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

        if ($this->onlyIfMissing !== Constants::DefaultOnlyIfMissing) {
            $dataLines[] = $this->getDataLine(Constants::OnlyIfMissingDatalineLiteral, 'true');
        }

        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            $dataLines[] = $this->getDataLine(Constants::StoreDatalineLiteral, $line);
        }

        return $dataLines;
    }
}
