<?php

defined('_JEXEC') or die('Restricted access');

class Service
{

    private static $btc_ePublicApiAddres = 'https://btc-e.com/api/2/';

    public static function timeEvents()
    {
        $window = '-7 days';
        
        $sql = "DELETE FROM users WHERE verified = 0 AND created_on < datetime('now',:window)";
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':window', $window, PDO::PARAM_STR);
        $result1 = $result->execute();
        
        $sql = "UPDATE advertisements SET status = -1 WHERE CURDATE() >= expires_in";
        $result = $GLOBALS['DBH']->prepare($sql);
        $result2 = $result->execute();
    }
    
    public static function BTCtoUSD($btcAmount)
    {
        $btcData = self::getDataFromPublicApi('btc_usd', 'ticker');
        $usd = $btcAmount * $btcData['last'];
        return number_format($usd, 2, '.', '');
    }

    public static function BTCtoRUR($btcAmount)
    {
        $btcData = self::getDataFromPublicApi('btc_rur', 'ticker');
        $rur = $btcAmount * $btcData['last'];
        return $rur;
    }

    public static function RURtoBTC($rurAmount)
    {
        $rurData = self::getDataFromPublicApi('rur_btc', 'ticker');
        $btc = $rurAmount * $rurData['last'];
        return $rur;
    }

    public static function USDtoUAH($usdAmount)
    {
        $usdData = simplexml_load_file('https://bank.gov.ua/NBUStatService/v1/statdirectory/exchange?valcode=USD');
        $uah = $usdAmount * $usdData->currency->rate;
        return $uah;
    }

    private static function getDataFromPublicApi($pair, $task)
    {
        $url = self::$btc_ePublicApiAddres.$pair.'/'.$task;

        $opts = array('http' =>
            array(
                'method' => 'GET',
                'timeout' => 10
            )
        );

        $context = stream_context_create($opts);
        $feed = file_get_contents($url, false, $context);
        $currencyParams = json_decode($feed, true);
        return $currencyParams[$task];
    }

    public static function getCSVData($tmp_name)
    {
        $csv_data = array();
        if(($handle = fopen($tmp_name, "r")) !== FALSE)
        {
            $i = 0;
            while (($row = fgetcsv($handle, 500, ",")) !== FALSE)
            {
                $csv_data[$i]['Date'] = $row[0];
                $csv_data[$i]['Currency'] = $row[1];
                $csv_data[$i]['Amount'] = $row[2];
                $csv_data[$i]['Address'] = $row[3];
                $csv_data[$i]['Status'] = $row[4];
                $i++;
            }
            fclose($handle);
        }
        else
            return false;
        return $csv_data;
    }

    public static function checkBTCaddress($address)
    {
        $origbase58 = $address;
        $dec = "0";

        for($i = 0; $i < strlen($address); $i++)
        {
            $dec = bcadd(bcmul($dec, "58", 0), strpos("123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz", substr($address, $i, 1)), 0);
        }

        $address = "";

        while (bccomp($dec, 0) == 1)
        {
            $dv = bcdiv($dec, "16", 0);
            $rem = (integer) bcmod($dec, "16");
            $dec = $dv;
            $address = $address.substr("0123456789ABCDEF", $rem, 1);
        }

        $address = strrev($address);

        for($i = 0; $i < strlen($origbase58) && substr($origbase58, $i, 1) == "1"; $i++)
        {
            $address = "00".$address;
        }

        if(strlen($address) % 2 != 0)
        {
            $address = "0".$address;
        }

        if(strlen($address) != 50)
        {
            return false;
        }

        if(hexdec(substr($address, 0, 2)) > 0)
        {
            return false;
        }

        return substr(strtoupper(hash("sha256", hash("sha256", pack("H*", substr($address, 0, strlen($address) - 8)), true))), 0, 8) == substr($address, strlen($address) - 8);
    }

}
