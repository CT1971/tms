<?php
session_start();
echo 	'<div> auth = '.$_SESSION['auth'].'</div>';
echo 	'<div> user_name = '.$_SESSION['user_name'] .'</div>';
echo 	'<div> user_email= '.$_SESSION['user_email'] .'</div>';
echo 	'<div> user_role = '.$_SESSION['user_role'] .'</div>';
echo 	'<div> where_postfix='.$_SESSION['where_postfix'] .'</div>';
?>