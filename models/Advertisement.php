<?php

/**
 * Description of Advertisement
 *
 * @author NewEXE
 */
class Advertisement
{

    //const SHOW_BY_DEFAULT = 10;

    public static function getAdvertisementsList($onlyActive = false, $limit = false)
    {
        //$limit = self::SHOW_BY_DEFAULT;

        if ($limit !== false)
        {
            $sql = 'SELECT * FROM advertisements '
                .'ORDER BY id_advertisement DESC LIMIT :limit';

            $result = $GLOBALS['DBH']->prepare($sql);
            $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
        else
        {
            $sql = 'SELECT * FROM advertisements ';
            if ($onlyActive) $sql .= 'WHERE status = 0 ';
            $sql .= 'ORDER BY id_advertisement DESC';

            $result = $GLOBALS['DBH']->prepare($sql);
            //$result->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
        
        $result->execute();

        if(!$result)
            return false;

        $advertisementsList = array();
        $i = 0;
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $result->fetch())
        {
            $advertisementsList[$i]['id_advertisement'] = $row['id_advertisement'];
            $advertisementsList[$i]['id_ads'] = $row['id_advertisement'];
            $advertisementsList[$i]['type'] = $row['type'];
            $advertisementsList[$i]['status'] = $row['status'];
            $advertisementsList[$i]['location'] = $row['location'];
            $advertisementsList[$i]['currency_id'] = $row['currency_id'];
            $advertisementsList[$i]['price'] = $row['price'];
            $advertisementsList[$i]['min_amount'] = $row['min_amount'];
            $advertisementsList[$i]['max_amount'] = $row['max_amount'];
            $advertisementsList[$i]['time_of_work'] = $row['time_of_work'];
            $advertisementsList[$i]['comment'] = $row['comment'];
            $advertisementsList[$i]['created_on'] = $row['created_on'];
            $advertisementsList[$i]['expires_in'] = $row['expires_in'];
            $advertisementsList[$i]['user_id'] = $row['user_id'];
            $i++;
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
        $i = 0;
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $result->fetch())
        {
            $advertisementsList[$i]['id_advertisement'] = $row['id_advertisement'];
            $advertisementsList[$i]['id_ads'] = $row['id_advertisement'];
            $advertisementsList[$i]['type'] = $row['type'];
            $advertisementsList[$i]['status'] = $row['status'];
            $advertisementsList[$i]['location'] = $row['location'];
            $advertisementsList[$i]['currency_id'] = $row['currency_id'];
            $advertisementsList[$i]['price'] = $row['price'];
            $advertisementsList[$i]['min_amount'] = $row['min_amount'];
            $advertisementsList[$i]['max_amount'] = $row['max_amount'];
            $advertisementsList[$i]['time_of_work'] = $row['time_of_work'];
            $advertisementsList[$i]['comment'] = $row['comment'];
            $advertisementsList[$i]['created_on'] = $row['created_on'];
            $advertisementsList[$i]['expires_in'] = $row['expires_in'];
            $advertisementsList[$i]['user_id'] = $row['user_id'];
            $i++;
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
        $i = 0;
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $result->fetch())
        {
            $advertisementsList[$i]['id_advertisement'] = $row['id_advertisement'];
            $advertisementsList[$i]['id_ads'] = $row['id_advertisement'];
            $advertisementsList[$i]['type'] = $row['type'];
            $advertisementsList[$i]['status'] = $row['status'];
            $advertisementsList[$i]['location'] = $row['location'];
            $advertisementsList[$i]['currency_id'] = $row['currency_id'];
            $advertisementsList[$i]['price'] = $row['price'];
            $advertisementsList[$i]['min_amount'] = $row['min_amount'];
            $advertisementsList[$i]['max_amount'] = $row['max_amount'];
            $advertisementsList[$i]['time_of_work'] = $row['time_of_work'];
            $advertisementsList[$i]['comment'] = $row['comment'];
            $advertisementsList[$i]['created_on'] = $row['created_on'];
            $advertisementsList[$i]['expires_in'] = $row['expires_in'];
            $advertisementsList[$i]['user_id'] = $row['user_id'];
            $i++;
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
        $i = 0;
        $result->setFetchMode(PDO::FETCH_ASSOC);
        while ($row = $result->fetch())
        {
            $advertisementsList[$i]['id_advertisement'] = $row['id_advertisement'];
            $advertisementsList[$i]['id_ads'] = $row['id_advertisement'];
            $advertisementsList[$i]['type'] = $row['type'];
            $advertisementsList[$i]['status'] = $row['status'];
            $advertisementsList[$i]['location'] = $row['location'];
            $advertisementsList[$i]['currency_id'] = $row['currency_id'];
            $advertisementsList[$i]['price'] = $row['price'];
            $advertisementsList[$i]['min_amount'] = $row['min_amount'];
            $advertisementsList[$i]['max_amount'] = $row['max_amount'];
            $advertisementsList[$i]['time_of_work'] = $row['time_of_work'];
            $advertisementsList[$i]['comment'] = $row['comment'];
            $advertisementsList[$i]['created_on'] = $row['created_on'];
            $advertisementsList[$i]['expires_in'] = $row['expires_in'];
            $advertisementsList[$i]['user_id'] = $row['user_id'];
            $i++;
        }

        return $advertisementsList;
    }

    public static function edit($id_ads, $type, $status, $location, $price, $currency_id, $min_amount, $max_amount, $time_of_work, $comment, $expires_in)
    {
        $sql = "UPDATE advertisements 
            SET type = :type, status=:status, location = :location, price = :price, currency_id = :currency_id, min_amount = :min_amount, max_amount=:max_amount, time_of_work=:time_of_work, comment=:comment, expires_in=:expires_in 
            WHERE id_advertisement = :id_ads";
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_ads', $id_ads, PDO::PARAM_INT);
        $result->bindParam(':type', $type, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->bindParam(':location', $location, PDO::PARAM_STR);
        $result->bindParam(':price', $price, PDO::PARAM_STR);
        $result->bindParam(':currency_id', $currency_id, PDO::PARAM_INT);
        $result->bindParam(':min_amount', $min_amount, PDO::PARAM_STR);
        $result->bindParam(':max_amount', $max_amount, PDO::PARAM_STR);
        $result->bindParam(':time_of_work', $time_of_work, PDO::PARAM_STR);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result->bindParam(':expires_in', $expires_in, PDO::PARAM_STR);

        return $result->execute();
    }

}