<?php
require_once('db_connection.php');

$sql = "SELECT subjects.name as subject_name,avg(marks) as avg_marks FROM marks JOIN subjects on subjects.id=marks.subject_id GROUP BY subject_id";
$result = $conn->query($sql);
$avgMarksArr = array();
if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $avgMarksArr[] = ['custom' => 'niten1', 'name' => $row["subject_name"], 'y' => (int)$row["avg_marks"], 'color' => sprintf( "#%06X", mt_rand( 0, 0xFFFFFF ))];
        }
}
$res_data1 = array();
$res_data1['name'] = 'Students Marks in Avg Marks Subject';
$res_data1['data'] = $avgMarksArr;
$res_data1['type'] = 'line';

$sql = "SELECT subjects.name as subject_name,avg(marks) as avg_marks FROM marks JOIN subjects on subjects.id=marks.subject_id GROUP BY subject_id";
$result = $conn->query($sql);
$avgMarksArr = array();
if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $avgMarksArr[] = ['custom' => 'niten2', 'name' => $row["subject_name"], 'y' => (int)$row["avg_marks"], 'color' => sprintf( "#%06X", mt_rand( 0, 0xFFFFFF ))];
        }
}
$res_data2 = array();
$res_data2['name'] = 'Students Marks in Avg Numbers Subject';
$res_data2['data'] = $avgMarksArr;
$res_data2['type'] = 'pie';

$sql = "SELECT subjects.name as subject_name,avg(marks) as avg_marks FROM marks JOIN subjects on subjects.id=marks.subject_id GROUP BY subject_id";
$result = $conn->query($sql);
$avgMarksArr = array();
if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $avgMarksArr[] = ['custom' => 'niten3', 'name' => $row["subject_name"], 'y' => (int)$row["avg_marks"], 'color' => sprintf( "#%06X", mt_rand( 0, 0xFFFFFF ))];
        }
}
$res_data3 = array();
$res_data3['name'] = 'Students Marks in Avg new Subject';
$res_data3['data'] = $avgMarksArr;
$res_data3['type'] = 'column';

echo json_encode([$res_data1, $res_data2, $res_data3]);