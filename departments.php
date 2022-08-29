<?php
require_once('db_connection.php');
$request_body = file_get_contents('php://input');

$getDept = "SELECT * FROM departments";
$result = $conn->query($getDept);
$data = array();
if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                $deptData[] = [ 'level'=>1,'column'=>'dept_id','id'=>$row['id'],'name' => $row["department_name"],'y' => 1, 'color' => sprintf( "#%06X", mt_rand( 0, 0xFFFFFF ))];
        }
}

$res_data = array();
$res_data[0]['name'] = 'Departments';
$res_data[0]['data'] = $deptData;
$res_data[0]['type'] = 'pie';
$res_data[0]['column'] = '';
$res_data[0]['selected_id'] = null;

// echo '<pre>';print_r((json_decode($request_body)->dataFormat));die;
$selected_dept_id = isset((json_decode($request_body)->dataFormat)[1]) ? ((json_decode($request_body)->dataFormat)[1]) : null;
$selected_emp_id = isset((json_decode($request_body)->dataFormat)[2]) ? ((json_decode($request_body)->dataFormat)[2]) : null;
$selected_skill_id = isset((json_decode($request_body)->dataFormat)[3]) ? ((json_decode($request_body)->dataFormat)[3]) : null;

if($selected_dept_id != null){
        $getEmp = "SELECT * FROM employees WHERE dept_id = $selected_dept_id";
        // echo $getEmp;die;
        $result = $conn->query($getEmp);
        if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                        $empData[] = [ 'level'=>2,'column'=>'emp_id','id'=>$row['emp_id'],'name' => $row["first_name"].' '.$row["last_name"],'y' => 1, 'color' => sprintf( "#%06X", mt_rand( 0, 0xFFFFFF ))];
                }
        }
        $dept_name = "SELECT department_name FROM departments WHERE id = $selected_dept_id";
        $result = $conn->query($dept_name);
        if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                        $dept_name = $row['department_name'];
                }
        }
        $res_data[1]['column'] = 'dept_id';
        $res_data[1]['selected_id'] = $selected_dept_id;
        $res_data[1]['name'] = 'Employees in Department '.$dept_name;
        $res_data[1]['data'] = $empData;
        $res_data[1]['type'] = 'pie';
}
if($selected_emp_id != null){
        $getSkill = "SELECT emp_skill_mapping.level as level, skill_sets.skill_name as skill_name, skill_sets.id as skill_id FROM emp_skill_mapping JOIN skill_sets ON skill_sets.id = emp_skill_mapping.skill_id WHERE emp_id = $selected_emp_id";
        $result = $conn->query($getSkill);
        // echo $getSkill;die;
        if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                        $skillData[] = [ 'level'=>3,'id'=>$row['skill_id'], 'name' => $row["skill_name"],'y' => (int)$row["level"], 'color' => sprintf( "#%06X", mt_rand( 0, 0xFFFFFF ))];
                }
        }

        $emp_name = "SELECT first_name, last_name FROM employees WHERE emp_id = $selected_emp_id";
        $result = $conn->query($emp_name);
        if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                        $emp_name = $row['first_name'].' '.$row['last_name'];
                }
        }
        $res_data[2]['name'] = 'Skills of Employee '.$emp_name;
        $res_data[2]['column'] = 'emp_id';
        $res_data[2]['selected_id'] = $selected_emp_id;
        $res_data[2]['data'] = $skillData;
        $res_data[2]['type'] = 'pie';
}

if($selected_skill_id != null){
        $getEmpSkill = "SELECT emp_skill_mapping.level as level, employees.first_name as first_name , employees.last_name as last_name FROM emp_skill_mapping JOIN employees ON employees.emp_id = emp_skill_mapping.emp_id WHERE skill_id = $selected_skill_id";
        $result = $conn->query($getEmpSkill);
        // echo $getEmpSkill;die;
        if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                        $empSkillData[] = [ 'name' => $row["first_name"]. ' '.$row["last_name"],'y' => (int)$row["level"], 'color' => $row["level"] == '1'?'#913535':( $row["level"] == 2 ?'#af5e5e':'#c99797')];
                }
        }

        $skill_name = "SELECT skill_name FROM skill_sets WHERE id = $selected_skill_id";
        $result = $conn->query($skill_name);
        if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                        $skill_name = $row['skill_name'];
                }
        }

        $res_data[3]['name'] = 'Employees in Skill '. $skill_name;
        $res_data[3]['column'] = 'skill_id';
        $res_data[3]['selected_id'] = $selected_skill_id;
        $res_data[3]['data'] = $empSkillData;
        $res_data[3]['type'] = 'pie';
}


echo json_encode(array('data'=>$res_data));die;