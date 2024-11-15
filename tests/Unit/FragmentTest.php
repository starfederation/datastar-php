<?php

use starfederation\datastar\Constants;
use starfederation\datastar\enums\FragmentMergeMode;
use starfederation\datastar\events\Fragment;

test('Options are correctly output', function() {
    $content = '<div>content</div>';
    $event = new Fragment($content, [
        'selector' => 'selector',
        'mergeMode' => FragmentMergeMode::Append,
        'settleDuration' => 1000,
        'useViewTransition' => true,
    ]);
    expect($event->getDataLines())
        ->toBe([
            'data: selector selector',
            'data: mergeMode append',
            'data: settleDuration 1000',
            'data: useViewTransition true',
            'data: fragment ' . $content,
        ]);
});

test('Default options are not output', function() {
    $content = '<div>content</div>';
    $event = new Fragment($content, [
        'selector' => '',
        'mergeMode' => FragmentMergeMode::Morph,
        'settleDuration' => Constants::DefaultSettleDuration,
        'useViewTransition' => false,
    ]);
    expect($event->getDataLines())
        ->toBe([
            'data: fragment ' . $content,
        ]);
});

test('Multi-line content is correctly output', function() {
    $content = '<div>content</div>';
    $event = new Fragment("\n" . $content . "\n" . $content . "\n");
    expect($event->getDataLines())
        ->toBe([
            'data: fragment ' . $content,
            'data: fragment ' . $content,
        ]);
});
