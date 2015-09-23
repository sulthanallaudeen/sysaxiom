<?php
#echo $_COOKIE['sys_TaskManager'];
#exit;
if(isset($_COOKIE['sys_TaskManager']))
{
    $Query = "SELECT userid as id FROM user_sessions where `session` ='" . $_COOKIE['sys_TaskManager'] . "'";
	$Count = $Connection->query($Query)->num_rows;
	if ($Count == 1) 
	{
	$Result = $Connection->query($Query);
        $Result = $Connection->query($Query);
	$Data = $Result->fetch_assoc();
	$Query = "SELECT * FROM users where `id` ='" . $Data['id'] . "'";
	$Result = $Connection->query($Query);
	$Data = $Result->fetch_assoc();
	$Response = array('success' => '1', 'name' => $Data['name'], 'email' => $Data['email']);
	}
	else
	{
	$Response = array('success' => '0');
	}    
}
else
{
$Response = array('success' => '0');
}
echo json_encode($Response);
?>