<?php
session_start();
if (!$_SESSION['auth'] == 'OK') {
  echo $_SESSION['auth'] . ' access denied';
  return;
};

include 'conn_local_tms.php';
$conn = getConnection_r();

$select = $_POST['select'];
$where =  !$_POST['where'] ? 
' where ' . $_POST['where'] . str_replace('and','',$_SESSION['where_postfix']) 
: ' where ' . $_POST['where'] . $_SESSION['where_postfix'] ;
$group_by = $_POST['group_by'];
$order_by = $_POST['order_by'];
$sql = $select . $where . $group_by . $order_by;

if (!$result = $conn->query($sql)) {
  die('指令错误:' .  $conn->error . ' sql:' . $sql);
} else {
  $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
  echo json_encode($datas, JSON_UNESCAPED_UNICODE);
}

$conn->close();
return;
