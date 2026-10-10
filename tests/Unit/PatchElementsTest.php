<?php

use starfederation\datastar\enums\ElementPatchMode;
use starfederation\datastar\enums\NamespaceType;
use starfederation\datastar\events\PatchElements;

test('Mode can be passed in', function($mode) {
    $content = '<div>content</div>';
    $event = new PatchElements($content, [
        'mode' => $mode,
    ]);
    expect($event->getDataLines())
        ->toBe([
            'data: mode append',
            'data: elements ' . $content,
        ]);
})->with([
    'enum' => ElementPatchMode::Append,
    'string' => ElementPatchMode::Append->value,
]);

test('Namespace can be passed in', function($namespace) {
    $content = '<div>content</div>';
    $event = new PatchElements($content, [
        'namespace' => $namespace,
    ]);
    expect($event->getDataLines())
        ->toBe([
            'data: namespace svg',
            'data: elements ' . $content,
        ]);
})->with([
    'enum' => NamespaceType::Svg,
    'string' => NamespaceType::Svg->value,
]);

test('Options are correctly output', function() {
    $content = '<div>content</div>';
    $event = new PatchElements($content, [
        'selector' => 'selector',
        'mode' => ElementPatchMode::Append,
        'useViewTransition' => true,
    ]);
    expect($event->getDataLines())
        ->toBe([
            'data: selector selector',
            'data: mode append',
            'data: useViewTransition true',
            'data: elements ' . $content,
        ]);
});

test('Default options are not output', function() {
    $content = '<div>content</div>';
    $event = new PatchElements($content, [
        'selector' => '',
        'mode' => ElementPatchMode::Outer,
        'useViewTransition' => false,
    ]);
    expect($event->getDataLines())
        ->toBe([
            'data: elements ' . $content,
        ]);
});

test('Multi-line content is correctly output', function() {
    $content = '<div>content</div>';
    $event = new PatchElements("\n" . $content . "\n" . $content . "\n");
    expect($event->getDataLines())
        ->toBe([
            'data: elements ' . $content,
            'data: elements ' . $content,
        ]);
});

test('Multi-line content is correctly output as event text', function() {
    $event = new PatchElements("<ul>\n  <li>a</li>\n\n  <li>b</li>\n</ul>", [
        'selector' => '#list',
        'mode' => ElementPatchMode::Append,
        'eventId' => '7',
        'retryDuration' => 2000,
    ]);
    expect($event->getOutput())
        ->toBe(
            "event: datastar-patch-elements\n"
            . "id: 7\n"
            . "retry: 2000\n"
            . "data: selector #list\n"
            . "data: mode append\n"
            . "data: elements <ul>\n"
            . "data: elements   <li>a</li>\n"
            . "data: elements \n"
            . "data: elements   <li>b</li>\n"
            . "data: elements </ul>\n\n"
        );
});

test('Carriage returns in escaped HTML cannot inject SSE events', function() {
    $message = "hi\r\revent: datastar-patch-signals\rdata: signals {pwned: alert(document.domain)}\r\r";
    $content = '<div id="messages">' . htmlspecialchars($message, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</div>';
    $event = new PatchElements($content);

    expect($event->getOutput())->toBe(
        "event: datastar-patch-elements\n"
        . "data: elements <div id=\"messages\">hi\n"
        . "data: elements \n"
        . "data: elements event: datastar-patch-signals\n"
        . "data: elements data: signals {pwned: alert(document.domain)}\n"
        . "data: elements \n"
        . "data: elements </div>\n\n"
    );
});

test('Payload line endings are normalized without adding blank lines', function($lineEnding) {
    $event = new PatchElements('<div>' . $lineEnding . 'content' . $lineEnding . '</div>');

    expect($event->getOutput())->toBe(
        "event: datastar-patch-elements\n"
        . "data: elements <div>\n"
        . "data: elements content\n"
        . "data: elements </div>\n\n"
    );
})->with([
    'LF' => "\n",
    'CRLF' => "\r\n",
    'CR' => "\r",
]);

test('Single-line options reject SSE line breaks', function($lineEnding) {
    $event = new PatchElements('<div>content</div>', [
        'selector' => '#messages' . $lineEnding . 'event: datastar-patch-signals',
    ]);

    expect(fn() => $event->getOutput())->toThrow(InvalidArgumentException::class);
})->with([
    'LF' => "\n",
    'CRLF' => "\r\n",
    'CR' => "\r",
]);

test('Event IDs reject invalid SSE characters', function($character) {
    $event = new PatchElements('<div>content</div>', [
        'eventId' => '7' . $character . 'event: datastar-patch-signals',
    ]);

    expect(fn() => $event->getOutput())->toThrow(InvalidArgumentException::class);
})->with([
    'LF' => "\n",
    'CR' => "\r",
    'NUL' => "\0",
]);
