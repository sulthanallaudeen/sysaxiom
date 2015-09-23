<?php
#Establishing the Connnection to the host and database with proper Credentials
$Connection = new mysqli("localhost", "root", "", "mysqli");
if ($Connection->connect_errno) 
{
    echo "Connection Failed".$Connection->connect_error;
    exit();
}
#Executing the Create Statement Query;
$Connection->query("CREATE TABLE IF NOT EXISTS `users` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `username` varchar(30) NOT NULL,
					  `password` varchar(50) NOT NULL,
					  `email` varchar(50) NOT NULL,
					  `city` varchar(50) NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ");
#Executing Insert Query
$Connection->query("INSERT INTO users VALUES (1, 'sulthan', 'password', 'sa@sysaxiom.com', 'Chennai')");
#Executing Multiple Insert Query
$Connection->query("INSERT INTO users VALUES (2, 'sulthan', 'password', 'sulthan@sysaxiom.com', 'Delhi'), 
											 (3, 'helen', 'keller', 'helen@sysaxiom.com', 'Mumbai')");
#Selected limited set of records
$Result = $Connection->query("SELECT * FROM users ORDER by id ASC LIMIT 1,2");
#If Result Exists
if ($Result) 
{
	#Start Iteration through $Result
    while ($Data = $Result->fetch_assoc()) 
    {
    	echo $Data["id"].' - '.$Data["username"].'<br>';
    }
    #And Free the $Result
    $Result->free();
}
#Executing Update Query
$Connection->query("UPDATE users SET city = 'Chennai, India' WHERE id = 1");
#Counting the Number of coloums in the Select Query
$Count = $Connection->query("SELECT * FROM users")->num_rows;
#Executing Delete Statement
$Connection->query("DELETE FROM users WHERE id = 1");
#Executing the Delete Statement for one condition
$Connection->query("DELETE FROM users WHERE id > 5");
#Constructing Delete all Query
#Executing Delete all Query
$Connection->query("DELETE FROM users");
#Executing Drop Query
$Connection->query("DROP TABLE IF EXISTS users");
#Closing the Connection
$Connection->close();
?>