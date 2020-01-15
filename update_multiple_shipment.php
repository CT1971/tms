<?php
  session_start();
  if(!$_SESSION['auth']=='OK'){echo $_SESSION['auth'].' access denied'; return;};


include 'conn_local_tms.php';

$datas = $_POST['datas'];
if(count($datas) == 0){
  echo 'no-data'; return;
}


#$datas = array(array("ID"=>"121336","FIELD"=>"VALUE","VALUE"=>"0.001"),array ("ID"=>"121337","FIELD"=>"VALUE","VALUE"=>"0.002"),array("ID"=>"121338","FIELD"=>"VALUE","VALUE"=>"0.003"));

$id_group = '';

$sql = 'update shipment set ';

$null_fields =['DEP_DATE', 'ETA_DATE', 'ARV_DATE', 'POD_DATE', 'EST_LEADTIME', 'ACT_LEADTIME'];
  
for ($i=0; $i<count($datas); $i++){
  $field_name = $datas[$i]['FIELD'];
  $value = $datas[$i]['VALUE'];
  $id = $datas[$i]['ID'];

  # deal with 6-fields accept null instead of '' 
  if (in_array($field_name, $null_fields) && $value ==''){
    $sql .= ' '.$field_name.'= IF( ID='.'"'.$id.'", null, '.$field_name.'),' ;
  }else{
    $sql .= ' '.$field_name.'= IF( ID='.'"'.$id.'", "'.$value.'", '.$field_name.'),' ;
  }
  
  $id_group .= $id .','; 
}

$sql = substr($sql, 0, -1);
$id_group = substr($id_group, 0, -1);


$sql .= ' where ID in (' . $id_group . ')';


$conn = getConnection_w();

  if ($conn->query($sql) === TRUE) {
    
      $response .= '更新: '.$conn -> affected_rows.' 个订单';
      echo $response; 
    
  } else {
      echo "Error: " .$conn->error .$sql;
  }

 # always need to update TTL_COST, TTL_REV, GP, EST_LEADTIME, ACT_LEADTIME; also need to consider CHARGABLE_VW * C_LTL_RATE, R_LTL_RATE

$conn->close();

?>
