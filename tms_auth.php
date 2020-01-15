<?php
session_start();
include 'conn_local_tms.php';

$conn = getConnection_r();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = 'select * from user where username ="' . $username . '" and password="' . $password . '" limit 1';

$result = $conn->query($sql);
$datas = $result->fetch_all(MYSQLI_ASSOC);

$email = $datas[0]['EMAIL'];
$scope = $datas[0]['SCOPE'];
$role = $datas[0]['ROLE'];
$scope = $datas[0]['SCOPE'];

$scopes = explode(',',$scope);
$where_postfix = json_encode($scopes,JSON_UNESCAPED_UNICODE);
$where_postfix = str_replace('[','(',$where_postfix);
$where_postfix = ' and STATION in ' . str_replace(']',')',$where_postfix);

if (count($datas) == 1) {
	$html = file_get_contents("tms_main.html"); // ./test/a_full-screen_design.html "tms_main.html");
	$pre_html = '<script> sessionStorage.setItem("session_username", "' . $username . '"); sessionStorage.setItem("session_email","' . $email . '");
    sessionStorage.setItem("session_role", "' . $role . '"); sessionStorage.setItem("session_scope","' . $scope . '")</script>';
	echo $pre_html . $html;
	$_SESSION['auth'] = 'OK';
	$_SESSION['user_name'] = $username;
	$_SESSION['user_email'] = $email;
	$_SESSION['user_role'] = $role;
	$_SESSION['where_postfix'] = $where_postfix;
	return;
  
} else {
	echo 'access denied';
	return;
}

return;
