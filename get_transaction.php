<?php
require_once('db_connection.php');

$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

$sql = "SELECT *, UNIX_TIMESTAMP(date) as unix_date FROM transaction WHERE withdrawls > 0 and date between '$start_date' and '$end_date' ORDER BY transaction.date ASC";
$result = $conn->query($sql);

$res_data = array();

$transArr = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $transArr[] = [(int)($row["unix_date"].'000'), (int)$row["withdrawls"]];
    }
}
    
$res_data['name'] = 'Withdraw';
$res_data['dataLabels'] = ['format'=> '{y} INR'];
$res_data['data'] = $transArr;

$sql = "SELECT *, UNIX_TIMESTAMP(date) as unix_date FROM transaction WHERE deposits > 0 and date between '$start_date' and '$end_date' ORDER BY transaction.date ASC";
$result = $conn->query($sql);

$res_data2 = array();

$transArr = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $transArr[] = [(int)($row["unix_date"].'000'), (int)$row["deposits"]];
    }
}
    
$res_data2['name'] = 'Deposit';
$res_data2['dataLabels'] = ['format'=> '{y} INR'];
$res_data2['data'] = $transArr;

echo json_encode([$res_data, $res_data2]);