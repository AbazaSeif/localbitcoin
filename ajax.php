<?php
$db = mysql_connect ("localhost","root","") or mysql_error();
mysql_select_db ("localbitcoins",$db);
$chosen_type = isset($_POST['system_id']) ? $_POST['system_id'] : false;
$chosen_type_num = isset($_POST['card_num']) ? $_POST['card_num'] : false;
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : false;
if($chosen_type != false && $chosen_type_num != false) {
	$result = mysql_query("INSERT INTO requisites (id_user, system_id, card_num) VALUES ('$user_id', '$chosen_type', '$chosen_type_num')",$db);
	echo 'Ok';
}
?>