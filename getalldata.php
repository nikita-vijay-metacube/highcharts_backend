<?php
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: token, Content-Type'); 
header('Content-Type: text/plain'); 

include('db_connection.php');

if(isset($_GET['c']) && !empty($_GET['c']))
{
    $sql = "SELECT * FROM `marks_tbl`;";
    
    $query = mysqli_query($db_con,$sql);
    if(mysqli_num_rows($query))
    {
        $data = [];
        foreach(mysqli_fetch_all($query, MYSQLI_ASSOC) as $da)
        {
            $data[] = $da;
        }
        echo json_encode($data);
    }
    else
    {
        echo json_encode(['status'=>0,'err'=>'Data Not Fetched1']);
    }

}

if(isset($_GET['q']) && !empty($_GET['q']))
{
    $subject = $_GET['q'];
    $small = strtolower($subject);
    if($subject === 'All'):
        $sql = 'SELECT sum(`Hindi`) as hindi, sum(`Maths`) as maths, sum(`English`) as english,sum(`EVS`) as evs, sum(`Sanskrit`) as sanskrit, sum(`Science`) as science FROM `marks_tbl`;';
    else:
        $sql = 'SELECT sum($subject) as $small FROM `marks_tbl`;';    
    endif;
    
    $query = mysqli_query($db_con,$sql);
    if(mysqli_num_rows($query) > 0)
    {
        $data = mysqli_fetch_assoc($query);
        //$data[1]['type'] = 'Subject';
        
        // print_r($key);     
        
        echo json_encode($data);
    }
    else
    {
        echo json_encode(['status'=>0]);
    }
}

if(isset($_GET['stu']) && !empty($_GET['stu']))
{
    $rollNum = $_GET['stu'];
    $sql = "SELECT English,Hindi,Maths,Evs, Sanskrit,Science from `marks_tbl` WHERE RollNum = '$rollNum'";     
    $query = mysqli_query($db_con,$sql);
    if(mysqli_num_rows($query) > 0)
    {
        $data = mysqli_fetch_assoc($query);
        echo json_encode($data);
    }
}


?>