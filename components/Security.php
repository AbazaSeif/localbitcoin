<?php

defined('_JEXEC') or die('Restricted access');

/**
 * Description of Security
 *
 * @author NewEXE
 */
class Security
{

    public static function safe_getUri()
    {
        $filter_input = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_UNSAFE_RAW);
        $filter_input = trim($filter_input, '/');
        return $filter_input;
        
    }

    public static function safe_intval($value = 0, $default_value = false)
    {
        if(!empty($value) && is_numeric($value))
        {
            $value = (int) $value;
            $value = filter_var($value, FILTER_VALIDATE_INT);
            return $value;
        }
        else
        {
            return $default_value;
        }
    }

    public static function safe_idval($value = 0, $default_value = false)
    {
        if(($value = self::safe_intval($value, $default_value && $value != 0)))
        {
            return abs($value);
        }
        return $default_value;
    }

}
