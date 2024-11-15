<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\events;

use starfederation\datastar\Constants;
use starfederation\datastar\enums\EventType;
use starfederation\datastar\enums\FragmentMergeMode;

class Fragment implements EventInterface
{
    use EventTrait;

    public string $data;
    public string $selector = '';
    public FragmentMergeMode $mergeMode = Constants::DefaultFragmentMergeMode;
    public int $settleDuration = Constants::DefaultSettleDuration;
    public bool $useViewTransition = Constants::DefaultUseViewTransitions;

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
            $dataLines[] = $this->getDataLine(Constants::SelectorDatalineLiteral, $this->selector);
        }

        if ($this->mergeMode !== Constants::DefaultFragmentMergeMode) {
            $dataLines[] = $this->getDataLine(Constants::MergeModeDatalineLiteral, $this->mergeMode->value);
        }

        if ($this->settleDuration != Constants::DefaultSettleDuration) {
            $dataLines[] = $this->getDataLine(Constants::SettleDurationDatalineLiteral, $this->settleDuration);
        }

        if ($this->useViewTransition !== Constants::DefaultUseViewTransitions) {
            $dataLines[] = $this->getDataLine(Constants::UseViewTransitionDatalineLiteral, 'true');
        }

        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            $dataLines[] = $this->getDataLine(Constants::FragmentDatalineLiteral, $line);
        }

        return $dataLines;
    }
}
