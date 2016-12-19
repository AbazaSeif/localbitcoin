<?php

defined('_JEXEC') or die('Restricted access');

class AdminAdsController extends AdminBase
{

    public function actionIndex($params)
    {
        self::adminAccessLimiter();
        $user_id = isset($params['get']['user_id']) ? $params['get']['user_id'] : false;

        if($user_id !== false)
        {
            $adsesList = Advertisement::getAdsesByUserId($user_id);
        }
        else
            $adsesList = Advertisement::getAllListAdses();

        
        require_once(ROOT.'/views/admin/ads/index.php');
        return true;
    }

    public function actionUpdate($params)
    {
        self::adminAccessLimiter();

        $submit = $type = $location = $price = $currency_id = $min_amount = $max_amount = $time_of_work = $comment = false;
        extract($params['post'], EXTR_IF_EXISTS);
        $id_ads = isset($params['get']['id_ads']) ? $params['get']['id_ads'] : false;
        if($id_ads !== false && Advertisement::getAdvertisementById($id_ads))
        {
            $ads = Advertisement::getAdvertisementById($id_ads);
            if(!empty($submit))
            {
                if($result = Advertisement::edit($id_ads, $type, $location, $price, $currency_id, $min_amount, $max_amount, $time_of_work, $comment))
                {
                    Router::headerLocation('/adminAds');
                }
                else
                    $errors[] = 'Ошибка при обновлении бд';
            }
        }
        else
        {
            $errors[] = 'Ошибка в id юзера';
        }

        require_once(ROOT.'/views/admin/ads/update.php');
        return true;
    }

    public function actionDelete($params)
    {
        self::adminAccessLimiter();

        $submit = isset($params['post']['submit']) ? $params['post']['submit'] : false;
        $id_ads = isset($params['get']['id_ads']) ? $params['get']['id_ads'] : false;


        if($id_ads !== false && Advertisement::getAdvertisementById($id_ads))
        {
            $ads = Advertisement::getAdvertisementById($id_ads);

            if($submit != false)
            {
                if(Advertisement::deleteAdsByAdsId($id_ads))
                {
                    Router::headerLocation('/adminAds');
                }
            }
        }
        else
            $errors[] = 'Неверный id';

        require_once(ROOT.'/views/admin/ads/delete.php');
        return true;
    }

}
