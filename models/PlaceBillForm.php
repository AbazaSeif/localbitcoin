<?php

class PlaceBillForm
{

    public static function save($type, $location, $currency_id, $price, $min_amount, $max_amount, $time_of_work, $comment, $expires_in, $user_id)
    {
        $id_ads = false;

        $sql = 'INSERT INTO advertisements (type, status, location, currency_id, price, min_amount, max_amount, time_of_work, comment, expires_in, user_id)'
                .' VALUES (:type, 0, :location, :currency_id, :price, :min_amount, :max_amount, :time_of_work, :comment, :expires_in, :user_id)';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':type', $type, PDO::PARAM_INT);
        $result->bindParam(':location', $location, PDO::PARAM_STR);
        $result->bindParam(':currency_id', $currency_id, PDO::PARAM_INT);
        $result->bindParam(':price', $price, PDO::PARAM_STR);
        $result->bindParam(':min_amount', $min_amount, PDO::PARAM_STR);
        $result->bindParam(':max_amount', $max_amount, PDO::PARAM_STR);
        $result->bindParam(':time_of_work', $time_of_work, PDO::PARAM_STR);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result->bindParam(':expires_in', $expires_in, PDO::PARAM_STR);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        
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
