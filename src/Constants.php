<?php

namespace starfederation\datastar;

use starfederation\datastar\enums\FragmentMergeMode;

/**
 * This is auto-generated by Datastar. DO NOT EDIT.
 */
class Constants
{
    public const DatastarKey = 'datastar';
    public const Version = '0.20.0';
    public const VersionClientByteSize = 43926;
    public const VersionClientByteSizeGzip = 14902;
    public const DefaultSettleDuration = 300;
    public const DefaultSSERetryDuration = 1000;
    public const DefaultUseViewTransitions = false;
    public const DefaultOnlyIfMissing = false;
    public const DefaultFragmentMergeMode = FragmentMergeMode::Morph;
    public const SelectorDatalineLiteral = 'selector ';
    public const MergeModeDatalineLiteral = 'mergeMode ';
    public const SettleDurationDatalineLiteral = 'settleDuration ';
    public const FragmentDatalineLiteral = 'fragment ';
    public const UseViewTransitionDatalineLiteral = 'useViewTransition ';
    public const StoreDatalineLiteral = 'store ';
    public const OnlyIfMissingDatalineLiteral = 'onlyIfMissing ';
    public const UrlDatalineLiteral = 'url ';
    public const PathsDatalineLiteral = 'paths ';
}