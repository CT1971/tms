<?php
  session_start();
  if(!$_SESSION['auth']=='OK'){echo $_SESSION['auth'].' access denied'; return;};

  include 'conn_local_tms.php';

  $data = $_POST;
  $conn = getConnection_w();

  $id = $data['ID']; $short_name = $data['SHORT_NAME']; $scope = $data['SCOPE']; $valid = $data['VALID'];
  $full_name = $data['FULL_NAME'];  $org_id = $data['ORG_ID']; 
  $location = $data['LOCATION']; $address = $data['ADDRESS']; $contact = $data['CONTACT']; $mobile = $data['MOBILE']; 
  $tel = $data['TEL']; $fax = $data['FAX']; $email = $data['EMAIL']; $url = $data['URL']; 
  $pay_to = $data['PAY_TO']; $pay_add = $data['PAY_ADD']; $vat_no = $data['VAT_NO']; $bank = $data['BANK']; 
  $bank_account = $data['BANK_ACCOUNT']; $enter_by = $data['ENTER_BY'];

  if ($id == 0 || $id==''){    
    $sql = 'insert into vendor (ID, SHORT_NAME, SCOPE, VALID, FULL_NAME, ORG_ID, LOCATION, ADDRESS, CONTACT, MOBILE, TEL, FAX, EMAIL, URL, PAY_TO, PAY_ADD,
    VAT_NO, BANK, BANK_ACCOUNT, ENTER_BY) values('
    . '"' . 0 . '"' .','
    . '"' . $short_name . '"' .','
    . '"' . $scope . '"' .','
    . '"' . $valid . '"' .','
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
    . '"' . $pay_to . '"' .','
    . '"' . $pay_add . '"' .','
    . '"' . $vat_no . '"' .','
    . '"' . $bank . '"' .','
    . '"' . $bank_account . '"' .','
    . '"' . $enter_by . '"'
    .')';        
    $response = 'new vendor addded';
  }else{
    $sql = 'update vendor set '
      .'SHORT_NAME="'.$short_name.'",'
      .'SCOPE="'.$scope.'",'
      .'VALID="'.$valid.'",'
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
      .'PAY_TO="'.$pay_to.'",'
      .'PAY_ADD="'.$pays_add.'",'
      .'VAT_NO="'.$vat_no.'",'
      .'BANK="'.$bank.'",'
      .'BANK_ACCOUNT="'.$bank_account.'",'
      .'ENTER_BY="'.$enter_by.'"'
      .' where ID ="'.$id.'"';
    $response = 'vendor updated';
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
