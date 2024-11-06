<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar\enums;

enum EventType: string
{
    case EventTypeFragment = 'datastar-fragment';
    case EventTypeSignal = 'datastar-signal';
    case EventTypeDelete = 'datastar-delete';
    case EventTypeRedirect = 'datastar-redirect';
    case EventTypeConsole = 'datastar-console';
}
