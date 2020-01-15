<?php
  session_start();
  if(!$_SESSION['auth']=='OK'){echo $_SESSION['auth'].' access denied'; return;};

  include 'conn_local_tms.php';

  $data = $_POST;
  $conn = getConnection_w();

  $id = $data['ID']; $short_name = $data['SHORT_NAME']; $full_name = $data['FULL_NAME']; 
  $default_dest = $data['DEFAULT_DEST']; $default_add = $data['DEFAULT_ADD']; $contact = $data['CONTACT']; $mobile = $data['MOBILE']; 
  $tel = $data['TEL']; $fax = $data['FAX']; $email = $data['EMAIL']; $enter_by = $data['ENTER_BY'];

  if ($id == 0 || $id==''){    
    $sql = 'insert into consignee (ID, SHORT_NAME, FULL_NAME, DEFAULT_DEST, DEFAULT_ADD, CONTACT, MOBILE, TEL, FAX, EMAIL, ENTER_BY) values('
    . '"' . 0 . '"' .','
    . '"' . $short_name . '"' .','
    . '"' . $full_name . '"' .','
    . '"' . $default_dest . '"' .','
    . '"' . $default_add . '"' .','
    . '"' . $contact . '"' .','
    . '"' . $mobile . '"' .','
    . '"' . $tel . '"' .','
    . '"' . $fax . '"' .','
    . '"' . $email . '"' .','
    . '"' . $enter_by . '"'
    .')';        
    $response = 'new consignee addded';
  }else{
    $sql = 'update consignee set '
      .'SHORT_NAME="'.$short_name.'",'
      .'FULL_NAME="'.$full_name.'",'
      .'DEFAULT_DEST="'.$default_dest.'",'
      .'DEFAULT_ADD="'.$default_add.'",'
      .'CONTACT="'.$contact.'",'
      .'MOBILE="'.$mobile.'",'
      .'TEL="'.$tel.'",'
      .'FAX="'.$fax.'",'
      .'EMAIL="'.$email.'",'
      .'ENTER_BY="'.$enter_by.'"'
      .' where ID ="'.$id.'"';
    $response = 'consignee updated';
  }


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  if ($conn->query($sql) === TRUE) {
      echo $response; //$response;
  } else {
      echo "Error: " .$conn->error .$sql;
  }

  $conn->close();
  return;


?>
