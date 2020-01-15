<?php
  session_start();
  if(!$_SESSION['auth']=='OK'){echo $_SESSION['auth'].' access denied'; return;};

  include 'conn_local_tms.php';
  $conn = getConnection_r();
  $sql = 'select SHORT_NAME from vendor order by convert(SHORT_NAME using GB2312)';

  $result = $conn->query($sql);

  $data = $result->fetch_all();
  echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>
