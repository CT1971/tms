<?php
session_start();
if (!$_SESSION['auth'] == 'OK') {
    echo $_SESSION['auth'] . ' access denied';
    return;
};

include 'conn_local_tms.php';
$id = $_POST['id'];
$lock = $_POST['lock'];

$sql = 'update shipment set LOCKED ='.$lock.' where ID ='.$id;
$conn = getConnection_w();
if(!$conn->query($sql)){
    echo '操作不成功，你看看:' . $conn->error;
}else{
    echo '操作成功'.$id;
}

$conn->close();
