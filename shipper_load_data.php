<?php
  include 'conn_local_tms.php';
  $conn = getConnection_r();

  if($_GET['shipper']){
    $sql = 'select * from shipper where SHORT_NAME like "%'.$_GET['shipper'].'%" order by convert(SHORT_NAME using GB2312)';  
  }else{
    $sql = 'select * from shipper order by convert(SHORT_NAME using GB2312)';
  }

  $result = $conn->query($sql);
  $datas = mysqli_fetch_all($result,MYSQLI_ASSOC); //$result->fetch_all();
  echo json_encode($datas);
?>
