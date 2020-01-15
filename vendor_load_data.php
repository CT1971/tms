<?php
  session_start();
  if(!$_SESSION['auth']=='OK'){echo $_SESSION['auth'].' access denied'; return;};

  include 'conn_local_tms.php';
  $conn = getConnection_r();

  if($_GET['vendor']){
    $sql = 'select * from vendor where SHORT_NAME like "%'.$_GET['vendor'].'%" order by convert(SHORT_NAME using GB2312)';  
  }else{
    $sql = 'select * from vendor order by convert(SHORT_NAME using GB2312)';
  }

  $result = $conn->query($sql);
  $datas = mysqli_fetch_all($result,MYSQLI_ASSOC); //$result->fetch_all();
  echo json_encode($datas);
?>
