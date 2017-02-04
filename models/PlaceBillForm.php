<?php

class PlaceBillForm
{

    public static function save($type, $currency_id, $price, $min_amount, $max_amount, $comment, $user_id,$payment_method)
    {
        $id_ads = false;

        $sql = 'INSERT INTO advertisements (type, status, currency_id, price, min_amount, max_amount, comment, user_id, payment_method)'
                .' VALUES (:type,0,:currency_id, :price, :min_amount, :max_amount,:comment, :user_id, :payment_method)';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':type', $type, PDO::PARAM_INT);
        $result->bindParam(':currency_id', $currency_id, PDO::PARAM_INT);
        $result->bindParam(':price', $price, PDO::PARAM_STR);
        $result->bindParam(':min_amount', $min_amount, PDO::PARAM_STR);
        $result->bindParam(':max_amount', $max_amount, PDO::PARAM_STR);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':payment_method', $payment_method, PDO::PARAM_INT);
        $result = $result->execute();
        
        if($result != false)
        {
            $id_ads = $GLOBALS['DBH']->lastInsertId();
        }
        $count_of_deals = Advertisement::getCountOfUserAds($user_id);
        $sql = 'UPDATE users SET count_of_deals=:count_of_deals WHERE id_user=:user_id';
        $result2 = $GLOBALS['DBH']->prepare($sql);
        $result2->bindParam(':count_of_deals', $count_of_deals, PDO::PARAM_INT);
        $result2->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result2 = $result2->execute();

        if($id_ads)
        {
            $agreement = Agreement::addAgreementByIdAds($id_ads);
        }


        if($result == true && $result2 == true && $agreement == true)
        {
            return $id_ads;
        }
        else
        {
            return false;
        }
    }
    
    public static function checkDateValid($date)
    {
        $todayHtml = date("Y-m-d");
        if (isset($date))
        {
            if($date < $todayHtml || $date > date('Y-m-d', strtotime($todayHtml . '+12 month')))
            {
                return false;
            }
        }
        return true;
    }

}
