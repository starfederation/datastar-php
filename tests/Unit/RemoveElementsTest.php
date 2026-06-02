<?php

use starfederation\datastar\events\RemoveElements;

test('Options are correctly output', function() {
    $selector = '#foo';
    $event = new RemoveElements($selector, [
        'useViewTransition' => true,
        'viewTransitionSelector' => '#foo',
    ]);
    expect($event->getDataLines())
        ->toBe([
            'data: selector ' . $selector,
            'data: mode remove',
            'data: useViewTransition true',
            'data: viewTransitionSelector #foo',
        ]);
});

test('Default options are not output', function() {
    $selector = '#foo';
    $event = new RemoveElements($selector, [
        'useViewTransition' => false,
        'viewTransitionSelector' => '#foo',
    ]);
    expect($event->getDataLines())
        ->toBe([
            'data: selector ' . $selector,
            'data: mode remove',
        ]);
});
