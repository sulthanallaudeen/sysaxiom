<?php

include '../config/app.php';

if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['phone'])) {
        $Query = "SELECT userid as id FROM user_sessions where `session` ='" . $_COOKIE['sys_TaskManager'] . "'";
        $Count = $Connection->query($Query)->num_rows;
    if ($Count == 1) {
        $Result = $Connection->query($Query);
	$Data = $Result->fetch_assoc();
        $Connection->query("UPDATE users SET `name` = '".$_GET['name']."', `email` = '".$_GET['email']."', `updated_at` = '".date('Y-m-d H:i:s')."' WHERE id ='".$Data['id']."'");
        $Connection->query("UPDATE `user_profile` SET phone = '".$_GET['phone']."',`updated_at` = '".date('Y-m-d H:i:s')."' WHERE user_id =".$Data['id']);    } else {
        echo 'Invalid Username or Password :(';
    }
}
?>