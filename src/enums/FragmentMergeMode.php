<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\enums;

enum FragmentMergeMode: string
{
    case FragmentMergeModeMorph = 'morph';
    case FragmentMergeModeInner = 'inner';
    case FragmentMergeModeOuter = 'outer';
    case FragmentMergeModePrepend = 'prepend';
    case FragmentMergeModeAppend = 'append';
    case FragmentMergeModeBefore = 'before';
    case FragmentMergeModeAfter = 'after';
    case FragmentMergeModeUpsert = 'upsertAttributes';
}
