<?php
$params = include('./config/db_params.php');
$db = mysqli_connect($params['host'], $params['user'], $params['password'], $params['dbname']);
if($_POST['purp'] == 'card')
{
    echo $_POST['user_id'];
    $chosen_type = isset($_POST['system_id']) ? $_POST['system_id'] : false;
    $chosen_type_num = isset($_POST['card_num']) ? $_POST['card_num'] : false;
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : false;
    if($chosen_type != false && $chosen_type_num != false) {
	$result = mysqli_query($db,"INSERT INTO requisites (id_user, system_id, card_num) VALUES ('$user_id', '$chosen_type', '$chosen_type_num')");
	echo 'Ok';
    }
}
if($_POST['purp'] == 'amount'&&isset($_POST['id'])&&isset($_POST['secret']))
{
    if(password_verify(($_POST['id']*2)+1, $_POST['secret']))
    {
        session_start();
        $_SESSION['id_user'] = 1;
        define('_JEXEC', 1);
        require 'vendor/autoload.php';
        define('ROOT', dirname(__FILE__));
        $GLOBALS['DBH'] = Db::getConnection();
        $coinbase = new Coinbase();
        echo $coinbase->amount;
    }
}
if($_POST['purp'] == 'address'&&isset($_POST['id'])&&isset($_POST['secret']))
{
    if(password_verify(($_POST['id']*2)+1, $_POST['secret']))
    {
        session_start();
        $_SESSION['id_user'] = $_POST['id'];
        define('_JEXEC', 1);
        require 'vendor/autoload.php';
        define('ROOT', dirname(__FILE__));
        $GLOBALS['DBH'] = Db::getConnection();
        $coinbase = new Coinbase();
        echo $coinbase->address;
    }
}
if($_POST['purp'] == 'commission')
{
    $login =  $_POST['login'];
    $sql = "SELECT `commission` FROM `users` WHERE `username` = '$login'";
    $result = mysqli_query($db, $sql);
    echo mysqli_fetch_array($result)['commission'];
}
if($_POST['purp'] == 'setcommission')
{
    $login =  $_POST['login'];
    $value = $_POST['value'];
    $query = "UPDATE `users` SET `commission` = $value WHERE `username` = '$login'";
    mysqli_query($db, $query);
}
if($_POST['purp'] == 'requistes')
{
    define('_JEXEC', 1);
    define('ROOT', dirname(__FILE__));
    require 'vendor/autoload.php';
    $GLOBALS['DBH'] = Db::getConnection();
    $id = User::getUseridByUsername($_POST['login']);
    echo json_encode(User::getUserRequisitesById($id));
}
if($_POST['purp'] == 'rm_card')
{
    $id = $_POST['id'];
    $query = "DELETE FROM `requisites` WHERE `id` = $id";
    mysqli_query($db, $query);
}
if($_POST['purp'] == 'change_card')
{
    $id = $_POST['id'];
    $number = $_POST['number'];
    $query = "UPDATE `requisites` SET `card_num` = '$number' WHERE `id` = $id";
    mysqli_query($db, $query);
}
?>