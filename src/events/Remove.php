<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

use starfederation\datastar\Defaults;
use starfederation\datastar\enums\EventType;

class Remove implements EventInterface
{
    use EventTrait;

    public ?string $selector;
    public ?string $settleDuration = null;
    public ?bool $useViewTransition = null;
    public ?array $paths;

    public function __construct(?string $selector = null, array $options = [], array $paths = null)
    {
        $this->selector = $selector;

        foreach ($options as $key => $value) {
            $this->$key = $value;
        }

        $this->paths = $paths;
    }

    /**
     * @inerhitdoc
     */
    public function getEventType(): EventType
    {
        return EventType::Remove;
    }

    /**
     * @inerhitdoc
     */
    public function getDataLines(): array
    {
        if ($this->selector !== null) {
            $dataLines = [
                $this->getDataLine('selector', $this->selector),
            ];

            if (!empty($this->settleDuration) && $this->settleDuration != Defaults::DEFAULT_SETTLE_DURATION) {
                $dataLines[] = $this->getDataLine('settleDuration', $this->settleDuration);
            }

            if ($this->useViewTransition === true) {
                $dataLines[] = $this->getDataLine('useViewTransition', 'true');
            }

            return $dataLines;
        }

        if ($this->paths !== null) {
            return [
                $this->getDataLine('paths', ...$this->paths),
            ];
        }

        return [];
    }
}
