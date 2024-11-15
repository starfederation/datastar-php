<?php

use starfederation\datastar\Constants;
use starfederation\datastar\events\Remove;

test('Options are correctly output for `selector`', function() {
    $content = 'body';
    $event = new Remove($content, [
        'settleDuration' => 1000,
        'useViewTransition' => true,
    ]);
    expect($event->getDataLines())
        ->toBe([
            'data: selector body',
            'data: settleDuration 1000',
            'data: useViewTransition true',
        ]);
});

test('Default options are not output for `selector`', function() {
    $content = 'body';
    $event = new Remove($content, [
        'settleDuration' => Constants::DefaultSettleDuration,
        'useViewTransition' => false,
    ]);
    expect($event->getDataLines())
        ->toBe([
            'data: selector body',
        ]);
});

test('Event is correctly output for `paths`', function() {
    $content = ['x', 'y', 'z'];
    $event = new Remove(paths: $content);
    expect($event->getDataLines())
        ->toBe([
            'data: paths x y z',
        ]);
});
