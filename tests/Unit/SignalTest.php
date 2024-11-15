<?php

use starfederation\datastar\events\Signal;

test('Options are correctly output', function() {
    $content = '{x: 1}';
    $event = new Signal($content, [
        'onlyIfMissing' => true,
    ]);
    expect($event->getDataLines())
        ->toBe([
            'data: onlyIfMissing true',
            'data: store {x: 1}',
        ]);
});

test('Default options are not output', function() {
    $content = '{x: 1}';
    $event = new Signal($content, [
        'onlyIfMissing' => false,
    ]);
    expect($event->getDataLines())
        ->toBe([
            'data: store {x: 1}',
        ]);
});

test('Multi-line content is correctly output', function() {
    $content = '{x: 1}';
    $event = new Signal("\n" . $content . "\n" . $content . "\n");
    expect($event->getDataLines())
        ->toBe([
            'data: store {x: 1}',
            'data: store {x: 1}',
        ]);
});
