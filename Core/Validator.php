<?php 

namespace Core;
class Validator
{
    public static function validateString($body, $minLen = 1, $maxLen = INF)
    {
        $body = trim($body);

        return strlen($body) > $minLen && strlen($body) <= $maxLen;
    }

    public static function validateEmail ($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}