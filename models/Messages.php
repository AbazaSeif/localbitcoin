<?php

/**
 * Description of Messages
 *
 * @author NewEXE
 */
class Messages
{

    public static function getMessagesByIdsUsers($from_user_id, $to_user_id, $ads_id)
    {
        $from_user_id = Security::safe_idval($from_user_id);
        $to_user_id = Security::safe_idval($to_user_id);
        $ads_id = Security::safe_idval($ads_id);

        $messages = array();

        if($from_user_id == $to_user_id)
        {
            $sql = 'SELECT * FROM messages WHERE to_user_id=:to_user_id AND ads_id=:ads_id'
                    .' ORDER BY id_message DESC';
            $result = $GLOBALS['DBH']->prepare($sql);
        }
        else
        {
            $sql = 'SELECT * FROM messages WHERE ((from_user_id=:to_user_id AND to_user_id=:to_user_id) OR (from_user_id=:from_user_id AND to_user_id=:to_user_id)) AND ads_id=:ads_id'
                    .' ORDER BY id_message DESC';
            $result = $GLOBALS['DBH']->prepare($sql);
            $result->bindParam(':from_user_id', $from_user_id, PDO::PARAM_INT);
        }
        $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
        $result->bindParam(':to_user_id', $to_user_id, PDO::PARAM_INT);

        $result->execute();

        if(!$result)
            return false;

        while ($row = $result->fetch())
        {
            $messages[] = $row;
        }
        return $messages;
    }

    public static function getAllMessages()
    {
        $messages = array();

        $result = $GLOBALS['DBH']->query('SELECT * FROM messages');

        $i = 0;
        while ($row = $result->fetch())
        {
            $messages[$i]['id_message'] = $row['id_message'];
            $messages[$i]['message'] = $row['message'];
            $messages[$i]['to_user_id'] = $row['to_user_id'];
            $messages[$i]['from_user_id'] = $row['from_user_id'];
            $messages[$i]['created_on'] = $row['created_on'];
            $messages[$i]['ads_id'] = $row['ads_id'];
            $i++;
        }
        return $messages;
    }

    public static function getMessagesByFromUserId($from_user_id)
    {
        $messages = array();

        $sql = 'SELECT * FROM messages WHERE from_user_id = :from_user_id';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':from_user_id', $from_user_id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        if(!$result)
            return false;

        $i = 0;
        while ($row = $result->fetch())
        {
            $messages[$i]['id_message'] = $row['id_message'];
            $messages[$i]['message'] = $row['message'];
            $messages[$i]['to_user_id'] = $row['to_user_id'];
            $messages[$i]['from_user_id'] = $row['from_user_id'];
            $messages[$i]['created_on'] = $row['created_on'];
            $messages[$i]['ads_id'] = $row['ads_id'];
            $i++;
        }
        return $messages;
    }

    public static function deleteMessagesByFromUserId($from_user_id)
    {
        $sql = 'DELETE FROM messages WHERE from_user_id = :from_user_id';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':from_user_id', $from_user_id, PDO::PARAM_INT);
        $result->execute();

        $sql = 'DELETE FROM messages WHERE to_user_id = :from_user_id';

        $result2 = $GLOBALS['DBH']->prepare($sql);
        $result2->bindParam(':from_user_id', $from_user_id, PDO::PARAM_INT);
        $result2->execute();
        if($result == true && $result2 == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function deleteMessagesByIdMessage($id_message)
    {
        $sql = 'DELETE FROM messages WHERE id_message = :id_message';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_message', $id_message, PDO::PARAM_INT);
        return $result->execute();
    }
    
    public static function deleteMessagesByAdsId($ads_id)
    {
        $sql = 'DELETE FROM messages WHERE ads_id = :ads_id';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function saveMessage($message, $from_user_id, $to_user_id, $ads_id)
    {
        $sql = 'INSERT INTO messages (message, from_user_id, to_user_id, created_on, ads_id) '
                .'VALUES (:message, :from_user_id, :to_user_id, NOW(), :ads_id)';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':message', $message, PDO::PARAM_STR);
        $result->bindParam(':from_user_id', $from_user_id, PDO::PARAM_INT);
        $result->bindParam(':to_user_id', $to_user_id, PDO::PARAM_INT);
        $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);

        if($result->execute())
        {
            return $GLOBALS['DBH']->lastInsertId();
        }
        else
            return false;
    }

    public static function getMessageById($id_message)
    {
        $sql = 'SELECT * FROM messages WHERE id_message = :id_message';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_message', $id_message, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    public static function getMessagesByIdAds($ads_id)
    {
        $ads_id = Security::safe_idval($ads_id);

        $messages = array();


        $sql = 'SELECT * FROM messages WHERE ads_id=:ads_id'
                .' ORDER BY id_message ASC';
        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
        $result->execute();

        if(!$result)
            return false;

        $i = 0;
        while ($row = $result->fetch())
        {
            $messages[$i]['id_message'] = $row['id_message'];
            $messages[$i]['message'] = $row['message'];
            $messages[$i]['to_user_id'] = $row['to_user_id'];
            $messages[$i]['from_user_id'] = $row['from_user_id'];
            $messages[$i]['created_on'] = $row['created_on'];
            $messages[$i]['ads_id'] = $row['ads_id'];
            $i++;
        }
        return $messages;
    }

}
