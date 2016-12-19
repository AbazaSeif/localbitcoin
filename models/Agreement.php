<?php

/**
 * Description of Agreement
 *
 * @author NewEXE
 */
class Agreement
{

    public static function addAgreementByIdAds($id_ads)
    {
        $sql = 'INSERT INTO ads_agreements (ads_id) VALUES (:id_ads)';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_ads', $id_ads, PDO::PARAM_INT);
        if($result->execute())
        {
            return $GLOBALS['DBH']->lastInsertId();
        }
        else
            return false;
    }

    public static function getAgreement($id_ads)
    {
        $sql = 'SELECT * FROM ads_agreements WHERE ads_id=:id_ads';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_ads', $id_ads, PDO::PARAM_INT);
        $result->execute();
        $agreement = array();
        
        $row = $result->fetch();
        $agreement['id_agr'] = $row['id_agr'];
        $agreement['from_id'] = $row['from_id'];
        $agreement['to_id'] = $row['to_id'];
        $agreement['isMoneyTransfered'] = $row['isMoneyTransfered'];
        $agreement['ads_id'] = $row['ads_id'];

        return $agreement;
    }

    public static function getIsMoneyTransfered($ads_id)
    {
        $sql = 'SELECT isMoneyTransfered FROM ads_agreements WHERE ads_id=:ads_id';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
        $result->execute();
        if($row = $result->fetch())
        {
            return $row['isMoneyTransfered'];
        }
        else
            return false;
    }
    
    public static function setIsMoneyTransfered($ads_id, $set_opt = true)
    {
        $set_opt = boolval($set_opt);
        $sql = 'UPDATE ads_agreements SET IsMoneyTransfered=:set_opt WHERE ads_id=:ads_id';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':set_opt', $set_opt, PDO::PARAM_BOOL);
        $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateFromId($from_id, $ads_id)
    {
        $sql = 'UPDATE ads_agreements SET from_id=:from_id WHERE ads_id=:ads_id';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':from_id', $from_id, PDO::PARAM_INT);
        $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateToId($to_id, $ads_id)
    {
        $sql = 'UPDATE ads_agreements SET to_id=:to_id WHERE ads_id=:ads_id';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':to_id', $to_id, PDO::PARAM_INT);
        $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function updateIsMoneyTransfered($isMoTr = 0, $ads_id)
    {
        $isMoTr = Security::safe_intval($isMoTr);
        if($isMoTr)
        {
            $sql = 'UPDATE ads_agreements SET isMoneyTransfered=:isMoTr WHERE ads_id=:ads_id';
            $result = $GLOBALS['DBH']->prepare($sql);
            $result->bindParam(':isMoTr', $isMoTr, PDO::PARAM_INT);
            $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
            return $result->execute();
        }
        else
            return false;
    }

    public static function getAdsIdByFromTo($from_id, $to_id)
    {
        $from_id = (int) $from_id;
        $to_id = (int) $to_id;

        $sql = 'SELECT ads_id FROM ads_agreements WHERE from_id=:from_id AND to_id=:to_id';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':from_id', $from_id, PDO::PARAM_INT);
        $result->bindParam(':to_id', $to_id, PDO::PARAM_INT);
        $result->execute();
        if($row = $result->fetch())
        {
            return $row['ads_id'];
        }
        else
            return false;
    }

    public static function getToIdByAds($ads_id)
    {
        $sql = 'SELECT to_id FROM ads_agreements WHERE to_id > 0 AND ads_id=:ads_id';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
        $result->execute();
        if($row = $result->fetch())
        {
            return $row['to_id'];
        }
        else
            return false;
    }

    public static function getFromIdByAds($ads_id)
    {
        $sql = 'SELECT from_id FROM ads_agreements WHERE from_id > 0 AND ads_id=:ads_id';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
        $result->execute();
        if($row = $result->fetch())
        {
            return $row['from_id'];
        }
        else
            return false;
    }

    public static function isAgree($from_id, $to_id, $ads_id)
    {
        $sql = 'SELECT COUNT(*) FROM ads_agreements WHERE from_id=:from_id AND to_id=:to_id AND ads_id=:ads_id';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':from_id', $from_id, PDO::PARAM_INT);
        $result->bindParam(':to_id', $to_id, PDO::PARAM_INT);
        $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
        $result->execute();

        if($result->fetchColumn())
            return true;
        else
            return false;
    }

}
