<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\enums;

class FragmentMergeMode
{
    public const MORPH = 'morph';
    public const INNER = 'inner';
    public const OUTER = 'outer';
    public const PREPEND = 'prepend';
    public const APPEND = 'append';
    public const BEFORE = 'before';
    public const AFTER = 'after';
    public const UPSERT = 'upsertAttributes';
}
