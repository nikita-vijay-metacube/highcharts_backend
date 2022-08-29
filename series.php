<?php
require('db_connection.php');
$sql = "SELECT GROUP_CONCAT(students.name, ':',subject_mapping.involvement) as combined_data, subjects.name, (subject_mapping.involvement ) FROM subject_mapping INNER JOIN students ON students.id = subject_mapping.student_id INNER JOIN subjects ON subjects.id = subject_mapping.subject_id GROUP BY subject_id";
$result = $conn->query($sql);
$data=array();
// print_r(($result));die;
// echo $sql;die;
if ($result->num_rows > 0) {
  // output data of each row
  $x = 0;
  while($row = $result->fetch_assoc()) {
    $data['series'][0][0]['data'][$x]['name'] = $row['name'];
    $data['series'][0][0]['data'][$x]['y'] = count(explode(',',$row['combined_data']));

    $temp_array = array();
    $y=0;
    foreach(explode(',',$row['combined_data']) as $key=>$value){
      $temp_array[$y]['name'] = explode(':',$value)[0];
      $temp_array[$y]['y'] = (int)explode(':',$value)[1];
      $y++;
    }
    $data['series'][2][$x]['data'] = $data['series'][1][$x]['data'] = $temp_array;
    $data['series'][2][$x]['name'] = $data['series'][1][$x]['name'] = $row['name'];
    $x++;
  }
  $data['type']=['pie','pie','bar'];
  print_r(json_encode($data));die;
} else {
  echo "0 results";
}
?>
