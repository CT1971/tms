<?php
session_start();
if (!$_SESSION['auth'] == 'OK') {
    echo $_SESSION['auth'] . ' access denied';
    return;
};

include 'conn_local_tms.php';
$conn = getConnection_r();

$select = $_POST['select'];
$where =  !$_POST['where'] ?
    ' where ' . $_POST['where'] . str_replace('and', '', $_SESSION['where_postfix'])
    : ' where ' . $_POST['where'] . $_SESSION['where_postfix'];
$order_by = $_POST['order_by'];
$sql = $select . $where . $order_by;

if (!$result = $conn->query($sql)) {
    die('指令错误:' .  $conn->error . ' sql:' . $sql);
} else {
    $data_set = array();
    $data_set['rows'] = $result->num_rows;

    if ($data_set['rows'] > 3000) {
        $data_set['msg'] = '记录数 > 3000, 请精确条件';
        $data_set['datas'] = array();
    } else {
        $data_set['msg'] = 'success';
        $datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $data_set['datas'] = $datas;
    }

    echo json_encode($data_set, JSON_UNESCAPED_UNICODE);
}

$conn->close();
return;
