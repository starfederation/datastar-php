<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

use putyourlightson\datastar\events\EventInterface;
use starfederation\datastar\enums\EventType;
use starfederation\datastar\enums\FragmentMergeMode;

class Fragment implements EventInterface
{
    protected const DEFAULT_SETTLE_TIME = 300;

    public string $data;
    public ?string $selector = null;
    public ?FragmentMergeMode $merge = null;
    public ?string $settle = null;
    public ?bool $useViewTransition = null;

    public function __construct(string $data, array $options = [])
    {
        $this->data = $data;

        foreach ($options as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    /**
     * @inerhitdoc
     */
    public function getEventType(): EventType
    {
        return EventType::EventTypeFragment;
    }

    /**
     * @inerhitdoc
     */
    public function getDataLines(): array
    {
        $data = trim($this->data);
        $dataLines = [];

        if ($this->selector !== null) {
            $dataLines[] = 'data: selector ' . $this->selector;
        }

        $dataLines[] = 'data: merge ' . ($this->merge ?? FragmentMergeMode::FragmentMergeModeMorph->value);

        if ($this->settle !== null && $this->settle !== static::DEFAULT_SETTLE_TIME) {
            $dataLines[] = 'data: settle ' . $this->settle;
        }

        if ($this->useViewTransition === true) {
            $dataLines[] = 'data: useViewTransition true';
        }

        $dataLines[] = 'data: fragment';

        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            $dataLines[] = 'data: ' . $line;
        }

        return $dataLines;
    }
}
