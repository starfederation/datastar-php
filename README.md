# Datastar PHP SDK

## Usage

```php
use starfederation\datastar\enums\EventType;
use starfederation\datastar\enums\FragmentMergeMode;
use starfederation\datastar\ServerSentEventGenerator;

$sseGenerator = new ServerSentEventGenerator();

$sseGenerator->renderFragment('<div></div>', [
    'selector' => '#my-div',
    'merge' => FragmentMergeMode::FragmentMergeModeAppend,
    'settleDuration' => 1000,
    'useViewTransition' => true,
]);

$sseGenerator->removeFragments('#my-div');
```

```php
use starfederation\datastar\ParseIncoming;

$store = ParseIncoming::store();
```
