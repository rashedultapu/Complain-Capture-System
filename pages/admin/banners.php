<?php
session_start();
include_once '../../dbconnect.php';

$sql_query = "SELECT * FROM user_info WHERE user_id=".$_SESSION['user'];
$result = mysql_query($sql_query);
$section = mysql_fetch_array($result);

$query = mysql_query("SELECT count(*) as total FROM `complains` WHERE `status` LIKE '%Open%' "); 
$number=mysql_fetch_assoc($query); 
echo $number['total'];
?>