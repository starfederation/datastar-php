<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

use starfederation\datastar\Defaults;
use starfederation\datastar\enums\EventType;
use starfederation\datastar\enums\FragmentMergeMode;

class Fragment implements EventInterface
{
    use EventTrait;

    public string $data;
    public ?string $selector = null;
    public ?FragmentMergeMode $mergeMode = null;
    public ?string $settleDuration = null;
    public ?bool $useViewTransition = null;

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
        return EventType::Fragment;
    }

    /**
     * @inerhitdoc
     */
    public function getDataLines(): array
    {
        $data = trim($this->data);
        $dataLines = [];

        if (!empty($this->selector)) {
            $dataLines[] = $this->getDataLine('selector', $this->selector);
        }

        if (!empty($this->mergeMode) && $this->mergeMode !== Defaults::DEFAULT_FRAGMENT_MERGE_MODE) {
            $dataLines[] = $this->getDataLine('mergeMode', $this->mergeMode->value);
        }

        if (!empty($this->settleDuration) && $this->settleDuration != Defaults::DEFAULT_SETTLE_DURATION) {
            $dataLines[] = $this->getDataLine('settleDuration', $this->settleDuration);
        }

        if ($this->useViewTransition === true) {
            $dataLines[] = $this->getDataLine('useViewTransition', 'true');
        }

        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            $dataLines[] = $this->getDataLine('fragment', $line);
        }

        return $dataLines;
    }
}
