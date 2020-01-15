<?php
  session_start();
  if(!$_SESSION['auth']=='OK'){echo $_SESSION['auth'].' access denied'; return;};

  include 'conn_local_tms.php';
  $id = $_GET['id'];
  $sql = 'select * from shipment where ID =' . $id . $_SESSION['where_postfix'];
  $conn = getConnection_r();

  $result = $conn->query($sql);
  $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
  echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>
