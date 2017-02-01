<?php
defined('_JEXEC') or die('Restricted access');

class AdminController extends AdminBase
{
    public function actionIndex()
    {        
        self::adminAccessLimiter();
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }
    public function actionUsers($params)
    {
        self::adminAccessLimiter();
        $username = $email = $blocked = $verified = $role = false;
        extract($params['post'], EXTR_IF_EXISTS);
        $user_id = isset($params['post']['user_id']) ? $params['post']['user_id'] : false;
        if($user_id !== false && User::checkUserExistsById($user_id))
        {
            $user = new User($user_id);
            if($username !== false)
            {
                User::edit($user_id, $username, $email, $blocked, $verified, $role);
            }
            else
            {
                User::deleteUserById($user_id);
                Advertisement::deleteAdsesByUserId($user_id);
            }
        }
        $usersList = User::getUsersList();
        require_once(ROOT . '/views/admin/users.php');
        return true;
    }
    public function actionAds($params)
    {
        self::adminAccessLimiter();
        $user_id = isset($params['get']['user_id']) ? $params['get']['user_id'] : false;
        $id_ads = isset($params['post']['id_ads']) ? $params['post']['id_ads'] : false;
        $type = $location = $price = $currency_id = $max_amount = $comment = false;
        extract($params['post'], EXTR_IF_EXISTS);
        if($id_ads !== false && Advertisement::getAdvertisementById($id_ads))
        {
            $ads = Advertisement::getAdvertisementById($id_ads);
            if($type !== false)
            {
               Advertisement::edit($id_ads, $type, $location, $price, $currency_id, $max_amount, $comment);
            }
            else
            {
                Advertisement::deleteAdsByAdsId($id_ads);
            }
        }
        if($user_id !== false)
        {
            $adsesList = Advertisement::getAdsesByUserId($user_id);
        }
        else
        {
            $adsesList = Advertisement::getAllListAdses();
        }
        require_once(ROOT . '/views/admin/ads.php');
        return true;
    }
    public function actionMessages($params)
    {
        self::adminAccessLimiter();
        $ads_id = isset($params['get']['ads_id']) ? $params['get']['ads_id'] : false;
        $user_id = isset($params['get']['user_id']) ? $params['get']['user_id'] : false;
        $id_message = isset($params['post']['id_msg']) ? $params['post']['id_msg'] : false;
        if($id_message !== false && Messages::getMessageById($id_message))
        {
            $msg = Messages::getMessageById($id_message);
            Messages::deleteMessagesByIdMessage($id_message);
        }
        $viewMode = 0;

        if($user_id === false && $ads_id !== false)
        {
            $viewMode = 1;
            $h4 = 'Все сообщения к объявлению #'.$ads_id;
            $messages = Messages::getMessagesByIdAds($ads_id);
        }
        elseif($ads_id === false && $user_id !== false)
        {
            $viewMode = 2;
            $h4 = 'Все сообщения юзера '.User::getUsernameById($user_id)." (ID = $user_id)";
            $messages = Messages::getMessagesByFromUserId($user_id);
        }
        else
        {
            $viewMode = 3;
            $h4 = 'Все сообщения, оставленные в системе всеми пользователями';
            $messages = Messages::getAllMessages();
        }
        require_once(ROOT . '/views/admin/messages.php');
        return true;
    }
    public function actionTickets($params)
    {
        self::adminAccessLimiter();
        $id_ticket = isset($params['post']['id_ticket']) ? $params['post']['id_ticket'] : false;
        if($id_ticket !== false && Ticket::getTicketByTicketId($id_ticket))
        {          
            Ticket::delete($id_ticket);
        }
        $ticketsList = Ticket::getTicketsList();
        require_once(ROOT . '/views/admin/tickets.php');
        return true;
    }
    public function actionSupport($params)
    {
        self::adminAccessLimiter();
        $id_msg = isset($params['post']['id_msg']) ? $params['post']['id_msg'] : false;
        $id_msg_show = isset($params['get']['id_msg']) ? $params['get']['id_msg'] : false;
        if($id_msg !== false && Ticket::getSupportTicketByTicketId($id_msg))
        {          
            Ticket::closeSupportTicket($user_id);
        }
        if($id_msg_show)
        {
            $username = User::getUsernameByMsgid($id_msg_show);
            $userid = User::getUseridByMsgid($id_msg_show);
            $message = false;
            extract($params['post'], EXTR_IF_EXISTS);
            if ($message) {
                Ticket::createSupportTicket_v2($message, $userid, true);
            }
            $msglist = Ticket::getSupportTicketsList_v2($userid);
        }
        $user_id = User::getUseridByMsgid($id_msg);
        $ticketsList = Ticket::getSupportTicketsListAdmin_v2();
        require_once(ROOT . '/views/admin/support.php');
        return true;
    }
    public function actionWallets()
    {
        self::adminAccessLimiter();
        $this->admCoinbase = new Coinbase(ADMIN_ID);
        $reserve = isset($params['get']['reserve']) ? isset($params['get']['reserve']) : false;
        if($reserve)
        {
            $reserveList = Reserve::getReserveList();
        }
        require_once(ROOT . '/views/admin/wallets.php');
        return true;
    }
}
