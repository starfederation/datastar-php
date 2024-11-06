<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar;

class ParseIncoming
{
    public static function store(): array
    {
        $store = [];

        if (isset($_GET['datastar'])) {
            $store = $_GET['datastar'];
        } elseif (isset($_POST['datastar'])) {
            $store = $_POST['datastar'];
        } else {
            $input = file_get_contents('php://input');
            parse_str($input, $parsedInput);
            if (isset($parsedInput['datastar'])) {
                $store = $parsedInput['datastar'];
            }
        }

        return $store;
    }
}
