<?php

include '../config/app.php';

if (isset($_GET['username']) && isset($_GET['email']) && isset($_GET['password'])) {
    $Count = $Connection->query("SELECT * FROM users where `email` ='" . $_GET['email'] . "'")->num_rows;
    if ($Count == 0) {
        $Connection->query("INSERT INTO `users` (`name`, `email`, `password`, `created_at`, `updated_at`) VALUES ('" . $_GET['username'] . "','" . $_GET['email'] . "','" . $_GET['password'] . "','" . date('Y-m-d H:i:s') . "','" . date('Y-m-d H:i:s') . "')");
        echo 'Account Registered Succesfully !!';
    } else {
        echo 'Email already Exists :(';
    }
}
?>