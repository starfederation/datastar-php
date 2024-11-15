<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

use starfederation\datastar\Constants;
use starfederation\datastar\enums\EventType;

class Remove implements EventInterface
{
    use EventTrait;

    public ?string $selector;
    public int $settleDuration = Constants::DefaultSettleDuration;
    public bool $useViewTransition = Constants::DefaultUseViewTransitions;
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
                $this->getDataLine(Constants::SelectorDatalineLiteral, $this->selector),
            ];

            if ($this->settleDuration !== Constants::DefaultSettleDuration) {
                $dataLines[] = $this->getDataLine(Constants::SettleDurationDatalineLiteral, $this->settleDuration);
            }

            if ($this->useViewTransition !== Constants::DefaultUseViewTransitions) {
                $dataLines[] = $this->getDataLine(Constants::UseViewTransitionDatalineLiteral, 'true');
            }

            return $dataLines;
        }

        if ($this->paths !== null) {
            return [
                $this->getDataLine(Constants::PathsDatalineLiteral, ...$this->paths),
            ];
        }

        return [];
    }
}
