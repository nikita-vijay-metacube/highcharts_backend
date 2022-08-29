<?php
require_once('db_connection.php');

$post = file_get_contents('php://input');
$post = json_decode($post);

$student_id = (int)$post->student_id;

$sql = "SELECT subject.name as subject_name, student.name as student_name, marks FROM marks JOIN student on student.id=marks.student_id JOIN subject on subject.id=marks.subject_id WHERE marks.student_id = ".$student_id;
$result = $conn->query($sql);

$res_data = array();

$marksArr = array();
if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $res_data['name'] = $row["student_name"];
                $marksArr[] = ['name' => $row["subject_name"], 'y' => (int)$row["marks"]];
        }
}

$res_data['data'] = $marksArr;

echo json_encode($res_data);