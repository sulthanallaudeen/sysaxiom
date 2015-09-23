<?php
#Clearing DB
include '../config/app.php';
		$Query = "SELECT userid as id FROM user_sessions where `session` ='" . $_COOKIE['sys_TaskManager'] . "'";
		$Count = $Connection->query($Query)->num_rows;
    if ($Count == 1) 
	{
		$Result = $Connection->query($Query);
		$Data = $Result->fetch_assoc();
		$Connection->query("DELETE FROM user_sessions WHERE userid = '".$Data['id']."'");
	}
#Clearing All Cookies
if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}

#Clearing Individual Cookies
#$if (isset($_COOKIE['sys_TaskManager'])) {
#    $_COOKIE['sys_TaskManager']=='';  
    $Response = array(
    'success' => '1',
    'message' => 'cookie unset succesfully');
echo json_encode($Response);
?>