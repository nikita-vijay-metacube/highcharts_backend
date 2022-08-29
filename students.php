<?php
require_once('db_connection.php');

$post = file_get_contents('php://input');
$post = json_decode($post);

$subject_id = (int)$post->subject_id;

$sql = "SELECT marks.student_id as student_id, subject.name as subject_name, student.name as student_name, marks FROM marks JOIN student on student.id=marks.student_id JOIN subject on subject.id=marks.subject_id WHERE marks.subject_id = ".$subject_id;
$result = $conn->query($sql);

$res_data = array();

$marksArr = array();
if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $res_data['name'] = $row["subject_name"];
                $marksArr[] = ['student_id' => $row["student_id"], 'name' => $row["student_name"], 'y' => (int)$row["marks"]];
        }
}

$res_data['data'] = $marksArr;

echo json_encode($res_data);