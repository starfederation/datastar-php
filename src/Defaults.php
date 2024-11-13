<?php
namespace starfederation\datastar;

use starfederation\datastar\enums\FragmentMergeMode;

class Defaults
{
    public const DEFAULT_SETTLE_DURATION = 300;
    public const DEFAULT_SSE_SEND_RETRY = 1000;
    public const DEFAULT_FRAGMENT_MERGE_MODE = FragmentMergeMode::Morph;
}
