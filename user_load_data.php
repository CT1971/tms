<?php
  session_start();
  if(!$_SESSION['auth']=='OK'){echo $_SESSION['auth'].' access denied'; return;};

  include 'conn_local_tms.php';
  $conn = getConnection_r();
  
  if($_GET['user']){
    $sql = 'select * from user where USERNAME like "%'.$_GET['user'].'%" order by username';  
  }else{
    $sql = 'select * from user order by username';
  }

  $result = $conn->query($sql);
  $datas = mysqli_fetch_all($result,MYSQLI_ASSOC); //$result->fetch_all();
  echo json_encode($datas);
?>
