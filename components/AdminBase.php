<?php
defined('_JEXEC') or die('Restricted access');

abstract class AdminBase
{
    protected $html_heading = array(
        'title' => SITE_NAME,
        'css' => '',
        'js' => ''
    );

    public static function adminAccessLimiter()
    {
        $user = new User(User::getUserIdFromSession());

        if($user->role == 2)
        {
            return true;
        }
        Router::headerLocation();
        die('Access denied');
    }

}
