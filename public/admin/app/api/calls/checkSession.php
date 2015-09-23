<?php
#echo $_COOKIE['sys_TaskManager'];
#exit;

if(isset($_COOKIE['sys_TaskManager']))
{
    if($_COOKIE['sys_TaskManager']!='')
    {
        $Response = array('success' => '1', 'storage' => $_COOKIE['sys_TaskManager']);
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