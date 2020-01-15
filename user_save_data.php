<?php
  session_start();
  if(!$_SESSION['auth']=='OK'){echo $_SESSION['auth'].' access denied'; return;};

  include 'conn_local_tms.php';

  $data = $_POST;
  $conn = getConnection_w();

  if ($data['ID'] == 0){    
    $sql ='insert into user (ID, USERNAME, PASSWORD, EMAIL, ROLE, SCOPE) values(0, "'. $_POST['USERNAME'] . '", "'.
      $_POST["PASSWORD"] . '", "'. $_POST["EMAIL"] . '", "'. $_POST["ROLE"] . '", "'. $_POST["SCOPE"]  . '")';
    $response = 'new user addded';
    
  }else{
    $sql='update user set PASSWORD =' .'"'. $_POST['PASSWORD'] .'", '.
      ' EMAIL =' .'"'. $_POST['EMAIL'] .'", '.
      ' ROLE =' .'"'. $_POST['ROLE'] .'", '.
      ' SCOPE =' .'"'. $_POST['SCOPE'] .'" '.
      ' where ID ='.'"'. $_POST['ID'] .'" ';
    $response = 'user updated';
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
