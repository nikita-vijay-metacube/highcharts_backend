<?php
require_once('db_connection.php');

$child = $_GET['child'];
$key = $_GET['key'];

$sql = "SELECT * FROM emp_dept_mapping WHERE deptID = $key";
$result = $conn->query($sql);

$res_data = array();

$transArr = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $transArr[] = ['child' => 'employees', 'name' => $row["id"],'y' => 1, 'color' => sprintf( "#%06X", mt_rand( 0, 0xFFFFFF ))];

    }
}
    
$res_data['name'] = 'Withdraw';
$res_data['data'] = $transArr;

echo json_encode([$res_data1]);