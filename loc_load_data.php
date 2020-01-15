<?php
  session_start();
  if(!$_SESSION['auth']=='OK'){echo $_SESSION['auth'].' access denied'; return;};

  include 'conn_local_tms.php';
  $conn = getConnection_r();

  if($_GET['loc']){
    $sql = 'select * from location where FULL_NAME like "%'.$_GET['loc'].'%" order by convert(FULL_NAME using GB2312)';  
  }else{
    $sql = 'select * from location order by convert(FULL_NAME using GB2312)';
  }

  $result = $conn->query($sql);
  $datas = mysqli_fetch_all($result,MYSQLI_ASSOC); //$result->fetch_all();
  echo json_encode($datas);
?>
