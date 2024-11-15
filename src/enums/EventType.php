<?php

namespace starfederation\datastar\enums;

/**
 * This class is auto-generated, do not modify.
 */
enum EventType: string
{
    // An event dealing with HTML fragments.
    case Fragment = 'datastar-fragment';

    // An event dealing with fine grain signals.
    case Signal = 'datastar-signal';

    // An event dealing with removing elements or signals.
    case Remove = 'datastar-remove';

    // An event dealing with redirecting the browser.
    case Redirect = 'datastar-redirect';

    // An event dealing with console messages.
    case Console = 'datastar-console';

}