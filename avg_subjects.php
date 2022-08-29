<?php
require_once('db_connection.php');

$sql = "SELECT marks.subject_id as subject_id,subject.name as subject_name,avg(marks) as avg_marks FROM marks JOIN subject on subject.id=marks.subject_id GROUP BY subject_id";
$result = $conn->query($sql);
$avgMarksArr = array();
if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $avgMarksArr[] = ['subject_id' => $row["subject_id"], 'name' => $row["subject_name"], 'y' => (int)$row["avg_marks"], 'color' => sprintf( "#%06X", mt_rand( 0, 0xFFFFFF ))];
        }
}

$res_data = array();
$res_data['name'] = 'Avg Marks';
$res_data['data'] = $avgMarksArr;

echo json_encode($res_data);