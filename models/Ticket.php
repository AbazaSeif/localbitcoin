<?php

class Ticket
{
    public static function create($reason, $from_id, $ads_id)
    {
        $sql = 'INSERT INTO tickets (reason, from_id, ads_id)'
                .' VALUES (:reason, :from_id, :ads_id)';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':reason', $reason, PDO::PARAM_INT);
        $result->bindParam(':from_id', $from_id, PDO::PARAM_INT);
        $result->bindParam(':ads_id', $ads_id, PDO::PARAM_INT);
        
        if($result->execute())
        {
            $id_ticket = $GLOBALS['DBH']->lastInsertId();
            return $id_ticket;
        }
        else
            return false;
    }
    
    public static function createSupportTicket($topic, $email, $message, $user_id)
    {
        $sql = 'INSERT INTO support (topic, email, message, user_id)'
                .' VALUES (:topic, :email, :message, :user_id)';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':topic', $topic, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':message', $message, PDO::PARAM_STR);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        
        if($result->execute())
        {
            $id_msg = $GLOBALS['DBH']->lastInsertId();
            return $id_msg;
        }
        else
            return false;
    }
    
    public static function getTicketsList()
    {
        $result = $GLOBALS['DBH']->query('SELECT * FROM tickets ORDER BY id_ticket desc');
        $ticketsList = array();
        $i = 0;
        while ($row = $result->fetch())
        {
            $ticketsList[$i]['id_ticket'] = $row['id_ticket'];
            $ticketsList[$i]['reason'] = $row['reason'];
            $ticketsList[$i]['from_id'] = $row['from_id'];
            $ticketsList[$i]['ads_id'] = $row['ads_id'];
            $ticketsList[$i]['created_on'] = $row['created_on'];
            $i++;
        }
        return $ticketsList;
    }
    
    public static function getSupportTicketsList()
    {
        $result = $GLOBALS['DBH']->query('SELECT * FROM support ORDER BY id_msg desc');
        $ticketsList = array();
        $i = 0;
        while ($row = $result->fetch())
        {
            $ticketsList[$i]['id_msg'] = $row['id_msg'];
            $ticketsList[$i]['topic'] = $row['topic'];
            $ticketsList[$i]['email'] = $row['email'];
            $ticketsList[$i]['message'] = $row['message'];
            $ticketsList[$i]['created_on'] = $row['created_on'];
            $ticketsList[$i]['user_id'] = $row['user_id'];
            $i++;
        }
        return $ticketsList;
    }
    
    public static function getStrReason($reason)
    {
        switch ($reason)
        {
            case 1:
                return 'Не оплачено';
            case 2:
                return 'Обман';
            case 3:
                return 'Отказываюсь';
            default:
                return '';
        }
    }
    
    public static function getTicketByTicketId($id_ticket)
    {
        $id_ticket = Security::safe_idval($id_ticket, false);

        if($id_ticket)
        {
            $sql = 'SELECT * FROM tickets WHERE id_ticket = :id_ticket';

            $result = $GLOBALS['DBH']->prepare($sql);
            $result->bindParam(':id_ticket', $id_ticket, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
           
            $row = $result->fetch();
            if(is_array($row))
            {
                return $row;
            }
            else return false;
        }
        else
        {
            return false;
        }
    }
    
    public static function getSupportTicketByTicketId($id_msg)
    {
        $id_msg = Security::safe_idval($id_msg, false);

        if($id_msg)
        {
            $sql = 'SELECT * FROM support WHERE id_msg = :id_msg';

            $result = $GLOBALS['DBH']->prepare($sql);
            $result->bindParam(':id_msg', $id_msg, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
           
            $row = $result->fetch();
            if(is_array($row))
            {
                return $row;
            }
        }
        else
        {
            return false;
        }
    }
    
    public static function delete($id_ticket)
    {
        $sql = 'DELETE FROM tickets WHERE id_ticket = :id_ticket';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_ticket', $id_ticket, PDO::PARAM_INT);
        return $result->execute();
    }
    
    public static function deleteSupportTicket($id_msg)
    {
        $sql = 'DELETE FROM support WHERE id_msg = :id_msg';

        $result = $GLOBALS['DBH']->prepare($sql);
        $result->bindParam(':id_msg', $id_msg, PDO::PARAM_INT);
        return $result->execute();
    }
}
