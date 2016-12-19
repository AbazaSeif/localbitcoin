<?php

/**
 * Description of Reserve
 *
 * @author NewEXE
 */
class Reserve
{

    public static function getReserveList()
    {
        $result = $GLOBALS['DBH']->query('SELECT * FROM reserve');
        if($result)
        {
            $reservesList = array();
            $i = 0;
            while ($row = $result->fetch())
            {
                $reservesList[$i]['id_reserve'] = $row['id_reserve'];
                $reservesList[$i]['from_id'] = $row['from_id'];
                $reservesList[$i]['to_id'] = $row['to_id'];
                $reservesList[$i]['amount'] = $row['amount'];
                $i++;
            }
            return $reservesList;
        }
        else
            return false;
    }

    public static function getReservesByUserId($user_id)
    {
        $user_id = Security::safe_idval($user_id, false);

        if($user_id)
        {
            $sql = 'SELECT * FROM reserve WHERE from_id = :user_id';

            $result = $GLOBALS['DBH']->prepare($sql);
            $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            $row = $result->fetch();
            if(is_array($row))
            {
                return $row;
            }
            return false;
        }
        else
        {
            return false;
        }
    }

    public static function sendBTCtoReserve($from_id, $to_id, $amount)
    {
        //$admCoinbase = new Coinbase(ADMIN_ID);
        //if($this->sendBTCto($admCoinbase->address, $amount))
        //{
            $sql = 'INSERT INTO reserve (from_id, to_id, amount) VALUES (:from_id, :to_id, :amount,';

            $result = $GLOBALS['DBH']->prepare($sql);
            $result->bindParam(':from_id', $from_id, PDO::PARAM_INT);
            $result->bindParam(':to_id', $to_id, PDO::PARAM_INT);
            $result->bindParam(':amount', $amount, PDO::PARAM_STR);
            
            if($result->execute())
            {
                return true;
            }
            else
                return false;
        //}
        //else
        //    return false;
    }

}
