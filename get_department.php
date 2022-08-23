<?php
require_once('db_connection.php');

$sql = "SELECT * FROM departments";
$result = $conn->query($sql);
$avgMarksArr = array();
if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $avgMarksArr[] = ['child' => 'employees', 'name' => $row["id"],'y' => 1, 'color' => sprintf( "#%06X", mt_rand( 0, 0xFFFFFF ))];
        }
}
$res_data1 = array();
$res_data1['name'] = 'Departments';
$res_data1['data'] = $avgMarksArr;
$res_data1['type'] = 'pie';

echo json_encode([$res_data1]);