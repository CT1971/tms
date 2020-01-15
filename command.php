<?php
session_start();
if (!$_SESSION['auth'] == 'OK') {
    echo $_SESSION['auth'] . ' access denied';
    return;
}

$sql = $_POST['command'];
include 'conn_local_tms.php';

$conn = getConnection_su();
$data_set = array();

if(!$result = $conn->query($sql)){
    $data_set['q_status'] ='[error] ' . $conn->error;
}else{
    $datas = $result->fetch_all(MYSQLI_ASSOC);
    $data_set = array();
    $data_set['q_status'] = 'success';
    $data_set['datas'] = $datas;
}
echo json_encode($data_set, JSON_UNESCAPED_UNICODE);
