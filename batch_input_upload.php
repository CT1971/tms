<?php
session_start();
if (!$_SESSION['auth'] == 'OK') {
	echo $_SESSION['auth'] . ' access denied';
	return;
};

include 'conn_local_tms.php';

$datas_set = $_POST;
$fields = $datas_set['fields'];
$datas = $datas_set['datas'];
$enter_by = $datas_set['session_username'];
$station = $datas_set['station'];

date_default_timezone_set("Asia/Hong_Kong");
$order_date = date('yy-m-d');

#echo 'php:';
#echo json_encode($fields, JSON_UNESCAPED_UNICODE);
#echo json_encode($datas, JSON_UNESCAPED_UNICODE);

$sql = 'insert into shipment (' . implode(',', $fields) . ',ORDER_DATE,ENTER_BY,STATION) values ';

$value_string = '';
foreach ($datas as $row) {
	$value_string .= '(';
	$value_string .= '"' . $row[0] . '",';
	$value_string .= '"' . $row[1] . '",';
	$value_string .= '"' . $row[2] . '",';
	$value_string .= '"' . $row[3] . '",';
	$value_string .= $row[4] == '' ? 'null,' : '"' . $row[4] . '",'; //dep_date
	$value_string .= $row[5] == '' ? 'null,' : '"' . $row[5] . '",'; //dep_date
	$value_string .= '"' . $row[6] . '",';
	$value_string .= '"' . $row[7] . '",';
	$value_string .= '"' . $row[8] . '",';
	$value_string .= '"' . $row[9] . '",';
	$value_string .= '"' . $row[10] . '",';
	$value_string .= '"' . $row[11] . '",';
	$value_string .= '"' . $row[12] . '",';
	$value_string .= '"' . $row[13] . '",';
	$value_string .= '"' . $row[14] . '",';
	$value_string .= '"' . $row[15] . '",';
	$value_string .= '"' . $row[16] . '",';
	$value_string .= '"' . $row[17] . '",';
	$value_string .= '"' . $row[18] . '",';
	$value_string .= '"' . $row[19] . '",';
	$value_string .= '"' . $row[20] . '",';
	$value_string .= '"' . $row[21] . '",';
	$value_string .= '"' . $row[22] . '",';
	$value_string .= '"' . $row[23] . '",';
	$value_string .= '"' . $row[24] . '",';
	$value_string .= '"' . $row[25] . '",';
	$value_string .= '"' . $row[26] . '",';
	$value_string .= '"' . $row[27] . '",';
	$value_string .= '"' . $row[28] . '",';
	$value_string .= '"' . $row[29] . '",';
	$value_string .= '"' . $row[30] . '",';
	$value_string .= '"' . $row[31] . '",';
	$value_string .= '"' . $row[32] . '",';
	$value_string .= '"' . $row[33] . '",';
	$value_string .= '"' . $row[34] . '",';
	$value_string .= '"' . $row[35] . '",';
	$value_string .= '"' . $order_date . '",';
	$value_string .= '"' . $enter_by . '",';
	$value_string .= '"' . $station . '"';
	$value_string .= '),';
}
$value_string = substr($value_string, 0, -1);

$sql .= $value_string;

$conn = getConnection_w();
if ($conn->query($sql) === TRUE) {
	if ($id == 0) {
		$last_id = $conn->insert_id;
		$response .= ':' . $last_id;
	}
	echo $response;
} else {
	echo "发生错误: " . $conn->error .' 指令:'. $sql;
}

$conn->close();
return;
