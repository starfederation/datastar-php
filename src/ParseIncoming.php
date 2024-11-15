<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace starfederation\datastar;

class ParseIncoming
{
    /**
     * Returns the store from the incoming request.
     */
    public static function getStore(): array
    {
        $key = Constants::DatastarKey;
        $store = [];

        if (isset($_GET[$key])) {
            $store = $_GET[$key];
        } elseif (isset($_POST[$key])) {
            $store = $_POST[$key];
        } else {
            $input = file_get_contents('php://input');
            parse_str($input, $parsedInput);
            if (isset($parsedInput[$key])) {
                $store = $parsedInput[$key];
            }
        }

        return $store;
    }
}
