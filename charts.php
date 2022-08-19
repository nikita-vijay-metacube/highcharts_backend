<?php
require('db_connection.php');
$sql = "SELECT GROUP_CONCAT(students.name, ':',subject_mapping.involvement) as combined_data, subjects.name, (subject_mapping.involvement ) FROM subject_mapping INNER JOIN students ON students.id = subject_mapping.student_id INNER JOIN subjects ON subjects.id = subject_mapping.subject_id GROUP BY subject_id";
$result = $conn->query($sql);
$data=array();
// print_r(($result));die;
// echo $sql;die;
if ($result->num_rows > 0) {
  // output data of each row
  //SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));
  $x = 0;
  while($row = $result->fetch_assoc()) {
    $data['subjects'][$x]['name'] = $row['name'];
    $data['subjects'][$x]['y'] = count(explode(',',$row['combined_data']));

    $temp_array = array();
    $y=0;
    foreach(explode(',',$row['combined_data']) as $key=>$value){
      $temp_array[] = explode(':',$value);
      $temp_array[$y][1]=(int)$temp_array[$y][1];
      // $temp_array['name'] = $temp_array[0];
      // $temp_array['y'] = $temp_array[1];
      // $temp_array[] = array(
      //                 "name" => explode(':',$value)[0],
      //                 "y" => explode(':',$value)[1]
      //               );
      $y++;
    }
    $data['desc'][$x]['data'] = $temp_array;
    $data['desc'][$x]['name'] = $row['name'];
    // $data['desc'][$x][$y]['name'] = $temp_array[0];
    // $data['desc'][$x][$y]['y'] = $temp_array[1];
    // print_r(json_encode($combined_array));die;
    // $data['desc'][$x]['name'] = $row['title'];
    // $data['desc'][$x]['data'] = ($combined_array);
    $x++;
  }
  print_r(json_encode($data));die;
} else {
  echo "0 results";
}
?>
