<?php
session_start();
if (!$_SESSION['auth'] == 'OK') {
  echo $_SESSION['auth'] . ' access denied';
  return;
};

include 'conn_local_tms.php';
$conn = getConnection_r();

$where = $_GET['where'] . (strlen($_GET['where'])> 0 ? $_SESSION['where_postfix'] : str_replace('and','',$_SESSION['where_postfix']) );
$selected_field = $_GET['selected_field'];
$order_by = $_GET['order_by'];
$sql = 'select ' . $selected_field . ' from shipment where ' . $where . ' order by ' . $order_by;

if (!$result = $conn->query($sql)) {
  die('指令错误:' .  $conn->error . ' sql:' . $sql);
} else {
  $data_set = array();
  $data_set['rows'] = $result->num_rows;

  if ($data_set['rows'] > 1000) {
    $data_set['msg'] = '记录数 > 1000, 请精确条件';
    $data_set['datas'] = array();
  } else {
    $data_set['msg'] = 'success';
    $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $data_set['datas'] = $datas;
  }

  echo json_encode($data_set, JSON_UNESCAPED_UNICODE);
};
return;
