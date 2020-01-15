<?php
session_start();

include 'conn_local_tms.php';
$shipper = $_GET['shipper'];
$conn = getConnection_r();

$yesterday = date('Y-m-d', strtotime("-30 day")); # production change to : -1 or -7 days 

if ($shipper) {
  $sql = 'select ID, CUSTOMER, CS_ORDER, DEP_DATE, ORI, DEST, LOCKED from shipment where CDT >="' . $yesterday . '" and CUSTOMER like "%' . $shipper . '%" ' . $_SESSION['where_postfix'] . ' order by ID desc';
} else {
  $sql = 'select ID, CUSTOMER, CS_ORDER, DEP_DATE, ORI, DEST, LOCKED from shipment where CDT >="' . $yesterday . '" ' . $_SESSION['where_postfix'] . ' order by ID desc';
}

if (!$result = $conn->query($sql)) {
  die ('指令错误:'. $conn->error);
} else {
  $datas = mysqli_fetch_all($result, MYSQLI_ASSOC); //$result->fetch_all();
  echo json_encode($datas, JSON_UNESCAPED_UNICODE);
}

$conn->close();
