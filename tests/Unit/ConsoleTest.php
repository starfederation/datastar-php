<?php

use starfederation\datastar\enums\ConsoleMode;
use starfederation\datastar\events\Console;

test('Event is correctly output', function(ConsoleMode $mode) {
    $message = 'Hello, world!';
    $event = new Console($mode, $message);
    expect($event->getDataLines())
        ->toBe([
            'data: ' . $mode->value . ' ' . $message,
        ]);
})->with(ConsoleMode::cases());
