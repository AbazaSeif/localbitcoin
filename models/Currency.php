<?php

defined('_JEXEC') or die('Restricted access');

class Currency
{

    public static function getExchangeRate($currency_name)
    {
        if (!isset($_SESSION['currency_time'])) {
            $_SESSION['currency_time'] = time();
            $_SESSION['currency_RUR'] = Service::BTCtoRUR(1);
            $_SESSION['currency_USD'] = Service::BTCtoUSD(1);
        }
        else if((time() - $_SESSION['currency_time'])> 3600)
        {
            $_SESSION['currency_time'] = time();
            $_SESSION['currency_RUR'] = Service::BTCtoRUR(1);
            $_SESSION['currency_USD'] = Service::BTCtoUSD(1);
        }
        if($currency_name == 'RUR')
        {          
            return $_SESSION['currency_RUR'];
        }
        elseif($currency_name == 'USD')
        {
            return $_SESSION['currency_USD'];
        }
        else
        {
            return false;
        }           
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
