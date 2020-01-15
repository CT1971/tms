<?php
  session_start();
  if(!$_SESSION['auth']=='OK'){echo $_SESSION['auth'].' access denied'; return;};

  include 'conn_local_tms.php';

  $data = $_POST;
  $conn = getConnection_w();

  $id = $data['ID']; $short_name = $data['SHORT_NAME']; $full_name = $data['FULL_NAME'];  $org_id = $data['ORG_ID']; 
  $location = $data['LOCATION']; $address = $data['ADDRESS']; $contact = $data['CONTACT']; $mobile = $data['MOBILE']; 
  $tel = $data['TEL']; $fax = $data['FAX']; $email = $data['EMAIL']; $url = $data['URL']; 
  $bill_to = $data['BILL_TO']; $bill_add = $data['BILL_ADD']; $vat_no = $data['VAT_NO']; $bank = $data['BANK']; 
  $bank_account = $data['BANK_ACCOUNT']; $enter_by = $data['ENTER_BY'];

  if ($id == 0 || $id==''){    
    $sql = 'insert into customer (ID, SHORT_NAME, FULL_NAME, ORG_ID, LOCATION, ADDRESS, CONTACT, MOBILE, TEL, FAX, EMAIL, URL, BILL_TO, BILL_ADD,
    VAT_NO, BANK, BANK_ACCOUNT, ENTER_BY) values('
    . '"' . 0 . '"' .','
    . '"' . $short_name . '"' .','
    . '"' . $full_name . '"' .','
    . '"' . $org_id . '"' .','
    . '"' . $location . '"' .','
    . '"' . $address . '"' .','
    . '"' . $contact . '"' .','
    . '"' . $mobile . '"' .','
    . '"' . $tel . '"' .','
    . '"' . $fax . '"' .','
    . '"' . $email . '"' .','
    . '"' . $url . '"' .','
    . '"' . $bill_to . '"' .','
    . '"' . $bill_add . '"' .','
    . '"' . $vat_no . '"' .','
    . '"' . $bank . '"' .','
    . '"' . $bank_account . '"' .','
    . '"' . $enter_by . '"'
    .')';        
    $response = 'new customer addded';
  }else{
    $sql = 'update customer set '
      .'SHORT_NAME="'.$short_name.'",'
      .'FULL_NAME="'.$full_name.'",'
      .'ORG_ID="'.$org_id.'",'
      .'LOCATION="'.$location.'",'
      .'ADDRESS="'.$address.'",'
      .'CONTACT="'.$contact.'",'
      .'MOBILE="'.$mobile.'",'
      .'TEL="'.$tel.'",'
      .'FAX="'.$fax.'",'
      .'EMAIL="'.$email.'",'
      .'URL="'.$url.'",'
      .'BILL_TO="'.$bill_to.'",'
      .'BILL_ADD="'.$bill_add.'",'
      .'VAT_NO="'.$vat_no.'",'
      .'BANK="'.$bank.'",'
      .'BANK_ACCOUNT="'.$bank_account.'",'
      .'ENTER_BY="'.$enter_by.'"'
      .' where ID ="'.$id.'"';
    $response = 'customer updated';
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
