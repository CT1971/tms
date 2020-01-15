<?php
  session_start();
  if(!$_SESSION['auth']=='OK'){echo $_SESSION['auth'].' access denied'; return;};

  include 'conn_local_tms.php';

  $data = $_POST;
  $conn = getConnection_w();

  $id=$_POST['ID']; $country=$_POST['COUNTRY']; $state=$_POST['STATE']; $city=$_POST['CITY']; $county=$_POST['COUNTY']; $full_name=$_POST['FULL_NAME']; $zip=$_POST['ZIP']; $area_code=$_POST['AREA_CODE']; $enter_by=$_POST['ENTER_BY'];  



  if ($id == 0 || $id ==''){    
    $sql = 'insert into location(ID, COUNTRY, STATE, CITY, COUNTY, FULL_NAME, ZIP, AREA_CODE, ENTER_BY) values('
    . '"' . 0 . '"' .','
    . '"' . $country . '"' .','
    . '"' . $state . '"' .','
    . '"' . $city . '"' .','
    . '"' . $county . '"' .','
    . '"' . $full_name . '"' .','
    . '"' . $zip . '"' .','
    . '"' . $area_code . '"' .','
    . '"' . $enter_by . '"'
    .')';        
    $response = 'new location addded';
  }else{
    $sql = 'update location set '
      .'FULL_NAME="'.$full_name.'",'
      .'COUNTRY="'.$country.'",'
      .'STATE="'.$state.'",'      
      .'CITY="'.$city.'",'
      .'COUNTY="'.$county.'",'
      .'ZIP="'.$zip.'",'
      .'AREA_CODE="'.$area_code.'",'
      .'ENTER_BY="'.$enter_by.'"'
      .' where ID ="'.$id.'"';
    $response = 'location updated';
  }


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if ($conn->query($sql) === TRUE) {
      echo $response;
  } else {
      echo "Error: " .$conn->error;
  }

  $conn->close();
  return;


?>
