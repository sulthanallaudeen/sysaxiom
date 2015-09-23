<?php
include '../config/app.php';
if(isset($_COOKIE['sys_TaskManager']))
{
        $Query = "SELECT userid as id FROM user_sessions where `session` ='" . $_COOKIE['sys_TaskManager'] . "'";
	$Count = $Connection->query($Query)->num_rows;
	if ($Count == 1) 
	{
	$Result = $Connection->query($Query);
	$Data = $Result->fetch_assoc();
        $profileQuery = "SELECT users.name as userName, users.email as userEmail, user_profile.address as userAddress, user_profile.phone as userPhone FROM users INNER JOIN user_profile ON users.id = user_profile.user_id where users.id='" . $Data['id'] . "'";
        $profileResult = $Connection->query($profileQuery);
	$profileData = $profileResult->fetch_assoc();
	$Response = array('success' => '1', 'userName' => $profileData['userName'], 'userEmail' => $profileData['userEmail'], 'userAddress' => $profileData['userAddress'], 'userPhone' => $profileData['userPhone']);
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