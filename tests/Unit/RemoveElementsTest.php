<?php

use starfederation\datastar\events\RemoveElements;

test('Options are correctly output', function() {
    $selector = '#foo';
    $event = new RemoveElements($selector, [
        'useViewTransition' => true,
    ]);
    expect($event->getDataLines())
        ->toBe([
            'data: selector ' . $selector,
            'data: mode remove',
            'data: useViewTransition true',
        ]);
});
