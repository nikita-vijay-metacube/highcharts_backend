<?php
require_once('db_connection.php');

$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];



$sql = "SELECT marks.subject_id as subject_id,subjects.name as subject_name,avg(marks) as avg_marks, subjects.color as color FROM marks JOIN subjects on subjects.id=marks.subject_id where marks.created_at between '$start_date' and '$end_date' GROUP BY subject_id";

$result = $conn->query($sql);
$avgMarksArr = array();
if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $avgMarksArr[] = ['subject_id' => $row["subject_id"], 'name' => $row["subject_name"], 'y' => (int)$row["avg_marks"], 'color' => $row["color"]];
        }
}

$res_data = array();
$res_data['name'] = 'Avg Marks';
$res_data['data'] = $avgMarksArr;

echo json_encode($res_data);