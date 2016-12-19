<?php

defined('_JEXEC') or die('Restricted access');

class AdminWalletsController extends AdminBase
{

    private $admCoinbase;

    public function __construct()
    {
        $this->admCoinbase = new Coinbase(ADMIN_ID);
    }

    public function actionIndex($params)
    {
        self::adminAccessLimiter();

        $reserve = isset($params['get']['reserve']) ? isset($params['get']['reserve']) : false;

        if($reserve)
        {
            $reserveList = Reserve::getReserveList();
        }
        else
        {
            
        }


        /* $user_id = isset($params['get']['user_id']) ? $params['get']['user_id'] : false;

          if($user_id !== false)
          {
          $adsesList = Advertisement::getAdsesByUserId($user_id);
          }
          else
          $adsesList = Advertisement::getAllListAdses();
         */

        require_once(ROOT.'/views/admin/wallets/index.php');
        return true;
    }

    public function actionSend($params)
    {
        $amount = $address = $submit = false;
        extract($params['post'], EXTR_IF_EXISTS);

        $result = false;

        if($submit && Service::checkBTCaddress($address) && is_numeric($amount))
        {
            if($this->admCoinbase->sendBTCto($address, $amount))
            {
                $result = true;
            }
        }

        require_once(ROOT.'/views/admin/wallets/index.php');
        return true;
    }

}
