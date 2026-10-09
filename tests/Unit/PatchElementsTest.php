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
