<?php

defined('_JEXEC') or die('Restricted access');

class Currency
{

    public static function getExchangeRate($currency_name)
    {
        if($currency_name == 'rur')
        {
            return Service::BTCtoRUR(1);
        }
        elseif($currency_name == 'usd')
        {
            return Service::BTCtoUSD(1);
        }
        else
            return false;
    }

    public static function getStringName($id_currency)
    {
        switch ($id_currency)
        {
            case 1:
                return 'USD';
                break;
            case 2:
                return 'RUR';
                break;
            default:
                return false;
                break;
        }
        return false;
    }
    
    public static function getSymbol($id_currency)
    {
            switch ($id_currency)
            {
                case 2:
                    $symbol = '&#8381;';
                    break;
                case 1:
                    $symbol = '&#36;';
                    break;
                default:
                    $symbol = '';
                    break;
            }
            return $symbol;
    }

}
