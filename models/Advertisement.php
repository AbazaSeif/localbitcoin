<?php

/**
 * Description of Advertisement
 *
 * @author NewEXE
 */
class Advertisement
{

    //const SHOW_BY_DEFAULT = 10;

    public static function getAdvertisementsList($onlyActive = false, $search_condotions = '', $limit = false)
    {
        //$limit = self::SHOW_BY_DEFAULT;

        if ($limit !== false)
        {
            $sql = 'SELECT * FROM advertisements :condition'
                .' ORDER BY id_advertisement DESC LIMIT :limit';

            $result = $GLOBALS['DBH']->prepare($sql);
            $result->bindParam(':limit', $limit, PDO::PARAM_INT);
            $result->bindParam(':condition', $search_condotions, PDO::PARAM_STR);
        }
        else
        {
            $sql = 'SELECT * FROM advertisements ';
            if ($onlyActive && $search_condotions !== '') {
                $sql .= $search_condotions. ' AND status = 0 ';
            }
            else {
                $sql .= 'WHERE status = 0 ';
            }
            $sql .= 'ORDER BY id_advertisement DESC';

            $result = $GLOBALS['DBH']->prepare($sql);
            //$result->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
        
        $result->execute();

        if(!$result)
            return false;

        $advertisementsList = array();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $result->fetch())
        {
            $advertisementsList[]=$row;
        }
        return $advertisementsList;
    }

    public static function deleteAdsesByUserId($id_user)
    {
        $sql = 'DELETE FROM advertisements WHERE user_id = :id_user';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        User::updateUserAdses($id_user);
        Messages::deleteMessagesByFromUserId($id_user);
        return $result->execute();
    }

    public static function deleteAdsByAdsId($ads_id)
    {
        $sql = 'DELETE FROM advertisements WHERE id_advertisement=:advertisement_id';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':advertisement_id', $ads_id, PDO::PARAM_INT);
        Messages::deleteMessagesByAdsId($ads_id);
        return $result->execute();
    }

    public static function getStringType($id)
    {
        $type = false;
        switch ($id)
        {
            case 1:
                $type = 'Купить';
                break;
            case 2:
                $type = 'Продать';
                break;
            default:
                break;
        }
        return $type;
    }

    public static function getInvertStringType($id)
    {
        $type = false;
        switch ($id)
        {
            case 2:
                $type = 'Купить';
                break;
            case 1:
                $type = 'Продать';
                break;
            default:
                break;
        }
        return $type;
    }
    
    public static function getStatusStringType($status)
    {
        $statusStr = false;
        switch ($status)
        {
            case -1:
                $statusStr = 'Неактивное';
                break;
            case 0:
                $statusStr = 'Активное';
                break;
            default:
                break;
        }
        return $statusStr;
    }

    public static function getAdvertisementById($id_ads)
    {
        $sql = 'SELECT * FROM advertisements WHERE id_advertisement = :id_advertisement';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_advertisement', $id_ads, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    
    public static function setStatus($status, $id_ads)
    {
        $sql = "UPDATE advertisements SET status=:status WHERE id_advertisement = :id_ads";
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_ads', $id_ads, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
    
    public static function getStatusByIdAds($id_ads)
    {
        $id_ads = Security::safe_idval($id_ads, false);

        if($id_ads)
        {
            $sql = 'SELECT status FROM advertisements WHERE id_advertisement = :id_ads';

            $result = $GLOBALS['DBH']->prepare($sql);
            $result->bindParam(':id_ads', $id_ads, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            $row = $result->fetch();
            if(is_array($row))
            {
                return $row['status'];
            }
        }
        return false;
    }

    public static function getAdsesByUserId($user_id, $status = false)
    {
        $result = false;
        if ($status === false)
        {
            $sql = 'SELECT * FROM advertisements WHERE user_id=:user_id'
                .' ORDER BY id_advertisement DESC';

            $result = $GLOBALS['DBH']->prepare($sql);
            $result->bindParam(':user_id', $user_id, PDO::PARAM_INT); 
        }
        elseif(is_int($status))
        {
            $sql = 'SELECT * FROM advertisements WHERE user_id=:user_id AND status=:status'
                .' ORDER BY id_advertisement DESC';

            $result = $GLOBALS['DBH']->prepare($sql);
            $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $result->bindParam(':status', $status, PDO::PARAM_INT);
        }
        else return false;
        
        if(!$result->execute())
            return false;

        $advertisementsList = array();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $result->fetch())
        {
            $advertisementsList[] = $row;
        }

        return $advertisementsList;
    }

    public static function getCountOfUserAds($id_user)
    {
        $sql = 'SELECT count(id_advertisement) AS count FROM advertisements WHERE user_id=:id_user';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch();

        return $row['count'];
    }

    public static function getAllListAdses()
    {

        $sql = 'SELECT * FROM advertisements '
                .'ORDER BY id_advertisement DESC';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->execute();

        if(!$result)
            return false;

        $advertisementsList = array();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $result->fetch())
        {
            $advertisementsList[] = $row;
        }

        return $advertisementsList;
    }

    public static function getReserveIdsUsersList()
    {
        $sql = 'SELECT id_user FROM advertisements '
                .'WHERE type =  ORDER BY id_advertisement DESC';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->execute();

        if(!$result)
            return false;

        $advertisementsList = array();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $result->fetch())
        {
            $advertisementsList[] = $row;
        }

        return $advertisementsList;
    }

    public static function edit($id_ads, $price, $currency_id, $min_amount, $max_amount, $comment, $payment_method)
    {
        $sql = "UPDATE advertisements SET price = :price, currency_id = :currency_id, min_amount=:min_amount, max_amount=:max_amount, comment=:comment, payment_method=:payment_method WHERE id_advertisement = :id_ads";
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_ads', $id_ads, PDO::PARAM_INT);
        $result->bindParam(':price', $price, PDO::PARAM_STR);
        $result->bindParam(':currency_id', $currency_id, PDO::PARAM_INT);
        $result->bindParam(':min_amount', $min_amount, PDO::PARAM_STR);
        $result->bindParam(':max_amount', $max_amount, PDO::PARAM_STR);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result->bindParam(':payment_method', $payment_method, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getPaymentMethodById($id)
    {
        switch ($id) {
            case '1':
                return 'Банковской картой (VISA, MasterCard)';
            case '2':
                return 'WebМоney';
            case '3':
                return 'QIWI Wallet';
            case '4':
                return 'Яндекс.Деньги';
        }
    }

}
