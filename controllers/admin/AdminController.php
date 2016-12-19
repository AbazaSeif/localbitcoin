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

}
