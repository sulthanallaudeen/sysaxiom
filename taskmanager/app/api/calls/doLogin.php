<?php

include '../config/app.php';

if (isset($_GET['email']) && isset($_GET['password'])) {

    $Query = "SELECT id FROM users where `email` ='" . $_GET['email'] . "' and `password` = '" . $_GET['password'] . "'";
    $Count = $Connection->query($Query)->num_rows;
    if ($Count == 1) {
        $Result = $Connection->query($Query);
        $Data = $Result->fetch_assoc();
        $Length = 50;
        Random:
        $RandomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $Length);
        $sessionExist = $Connection->query("SELECT id FROM user_sessions where `session` ='" . $RandomString . "'")->num_rows;
        if ($sessionExist != 0) {
            goto Random;
        }
		else
		{
			$Connection->query("INSERT INTO `user_sessions` (`userid`, `session`, `created_at`, `updated_at`) VALUES ('" . $Data['id'] . "','" . $RandomString . "','" . date('Y-m-d H:i:s') . "','" . date('Y-m-d H:i:s') . "')");
		}
        setcookie("sys_TaskManager", $RandomString, time() + 3600);
        echo 'loginSuccess';
    } else {
        echo 'Invalid Username or Password :(';
    }
}
?>