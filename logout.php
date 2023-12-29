<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);


}/* 
print_r($_POST); */

header("Location: login.php"); 
die;