<?php
defined('_JEXEC') or die('Restricted access');

class AdminTicketsController extends AdminBase
{

    public function actionIndex($params)
    {
        self::adminAccessLimiter();

        $mode = isset($params['get']['mode']) ? $params['get']['mode'] : false;
        
        if ($mode != 1 &&  $mode != 2)
        {
            $mode = 1;
        }
        
        $ticketsList = $mode == 1? Ticket::getTicketsList() : Ticket::getSupportTicketsList();

        require_once(ROOT.'/views/admin/tickets/index.php');
        return true;
    }


    public function actionViewSupport($params)
    {
        self::adminAccessLimiter();
        
        $id_msg = isset($params['get']['id_msg']) ? $params['get']['id_msg'] : false;
        
        if (!$ticket = Ticket::getSupportTicketByTicketId($id_msg))
        {
            $errors[] = 'Ошибка в id сообщения поддержки';
        }

        require_once(ROOT.'/views/admin/tickets/view.php');
        return true;
    }

    public function actionDelete($params)
    {
        self::adminAccessLimiter();

        $submit = isset($params['post']['submit']) ? $params['post']['submit'] : false;
        $id_ticket = isset($params['get']['id_ticket']) ? $params['get']['id_ticket'] : false;


        if($id_ticket !== false && Ticket::getTicketByTicketId($id_ticket))
        {          
            if($submit)
            {
                if(Ticket::delete($id_ticket))
                {
                    Router::headerLocation('/AdminTickets');
                }
                
            }
        }
        else $errors[] = 'Неверный id';

        require_once(ROOT.'/views/admin/tickets/delete.php');
        return true;
    }
    
    public function actionDeleteSupport($params)
    {
        {
        self::adminAccessLimiter();

        $submit = isset($params['post']['submit']) ? $params['post']['submit'] : false;
        $id_msg = isset($params['get']['id_msg']) ? $params['get']['id_msg'] : false;


        if($id_msg !== false && Ticket::getSupportTicketByTicketId($id_msg))
        {          
            if($submit)
            {
                if(Ticket::deleteSupportTicket($id_msg))
                {
                    Router::headerLocation('/AdminTickets');
                }
                
            }
        }
        else $errors[] = 'Неверный id';

        require_once(ROOT.'/views/admin/tickets/delete.php');
        return true;
    }
    }

}
