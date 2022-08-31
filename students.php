<?php
require_once('db_connection.php');

$post = file_get_contents('php://input');
$post = json_decode($post);

$subject_id = (int)$post->subject_id;

$start_date = $_GET['start_date'];
$end_date = $_GET['end_date'];

$sql = "SELECT marks.student_id as student_id, subjects.name as subject_name, student.name as student_name, SUM(marks) as marks, student.color as color FROM marks JOIN student on student.id=marks.student_id JOIN subjects on subjects.id=marks.subject_id WHERE marks.subject_id = ".$subject_id." and marks.created_at between '$start_date' and '$end_date' GROUP BY student_id";
$result = $conn->query($sql);

$res_data = array();

$marksArr = array();
if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $res_data['name'] = $row["subject_name"];
                $marksArr[] = ['student_id' => $row["student_id"], 'name' => $row["student_name"], 'y' => (int)$row["marks"], 'color' => $row["color"]];
        }
}

$res_data['data'] = $marksArr;

echo json_encode($res_data);