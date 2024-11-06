<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar;

class ParseIncoming
{
    public static function store(): array
    {
        return $_GET['datastar'] ?? $_POST['datastar'] ?? [];
    }
}
