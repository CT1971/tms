<?php

function getConnection_su()
{
	$conn = new mysqli('localhost', 'bingo', 'ctchnweb123', 'tms_2020');
	if ($conn->connect_errno) {
		echo '数据链路故障:' . $conn->connect_error;
		exit();
	} else {
		return $conn;
	}
}

function getConnection_r()
{
	$conn = new mysqli('localhost', 'bingor', 'bingo123r', 'tms_2020');
	if ($conn->connect_errno) {
		echo '数据链路故障:' . $conn->connect_error;
		exit();
	} else {
		return $conn;
	}
}

function getConnection_w()
{
	$conn = new mysqli('localhost', 'bingow', 'bingo123w', 'tms_2020');
	if ($conn->connect_errno) {
		echo '数据链路故障:' . $conn->connect_error;
		exit();
	} else {
		return $conn;
	}
}
