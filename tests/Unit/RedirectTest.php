<?php

use starfederation\datastar\events\Redirect;

test('Event is correctly output', function() {
    $content = '/page';
    $event = new Redirect($content);
    expect($event->getDataLines())
        ->toBe([
            'data: url ' . $content,
        ]);
});
