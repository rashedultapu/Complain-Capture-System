<?php
error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
$datbase = "ccs";
mysql_connect($host,$user,$password);
mysql_select_db($datbase);

if(!mysql_connect("localhost","root",""))
{
	die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db("ccs"))
{
	die('oops database selection problem ! --> '.mysql_error());
}

?>