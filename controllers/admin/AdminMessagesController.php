<?php
defined('_JEXEC') or die('Restricted access');

class AdminMessagesController extends AdminBase
{

    public function actionIndex($params)
    {
        self::adminAccessLimiter();

        $ads_id = isset($params['get']['ads_id']) ? $params['get']['ads_id'] : false;
        $user_id = isset($params['get']['user_id']) ? $params['get']['user_id'] : false;
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
        require_once(ROOT.'/views/admin/messages/index.php');
        return true;
    }


    public function actionDelete($params)
    {
        self::adminAccessLimiter();

        $submit = isset($params['post']['submit']) ? $params['post']['submit'] : false;
        $id_message = isset($params['get']['id_message']) ? $params['get']['id_message'] : false;

        if($id_message !== false && Messages::getMessageById($id_message))
        {
            $msg = Messages::getMessageById($id_message);
            
            if($submit != false)
            {
                if(Messages::deleteMessagesByIdMessage($id_message))
                {
                    Router::headerLocation('/adminMessages');
                }
                
            }
        }
        else $errors[] = 'Неверный id';

        
        require_once(ROOT.'/views/admin/messages/delete.php');
        return true;
    }

}
