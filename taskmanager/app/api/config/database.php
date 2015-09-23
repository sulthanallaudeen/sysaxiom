<?php

if ($databaseMode == 'local') {
    #If Mode is Local
    if ($databaseConnection == 'mysql') {
        #If DB is mysql
        $Connection = new mysqli("localhost", "root", "", "tma");
        if ($Connection->connect_errno) {
            echo "Connection Failed" . $Connection->connect_error;
            exit();
        }
    } elseif ($databaseConnection == 'pgsql') {
        #If DB is pgsql    
        echo "DB Not yet constructed";
    } else {
        #If DB is not defined
        echo "No DB Defined";
    }
} else {
    #If Mode is Live
    if ($databaseConnection == 'mysql') {
        #If DB is mysql
        $Connection = new mysqli("localhost", "sysaxiom", "", "tma");
        if ($Connection->connect_errno) {
            echo "Connection Failed" . $Connection->connect_error;
            exit();
        }
    } elseif ($databaseConnection == 'pgsql') {
        #If DB is pgsql    
        echo "DB Not yet constructed";
    } else {
        #If DB is not defined
        echo "No DB Defined";
    }
}
?>