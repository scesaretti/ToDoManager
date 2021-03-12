<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
include_once '../config/database.php';
include_once '../classes/task.php';
  
$database = new Database();
$db = $database->getConnection();
$task = new Task($db);
// query task
$stmt = $task->read();
$num = 1;
// check if more than 0 record found
if($num !== 0){
    $tasks_array=array();
    $tasks_array["records"]=array();
  
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
  
        $taskItem=array(
            "id" => $id,
            "taskdescr" => $taskdescr,
            "taskdate" => $taskdate,
        );
  
        array_push($tasks_array["records"], $taskItem);
    }
  
    // set response code - 200 OK
    http_response_code(200);
  
    echo json_encode($tasks_array);
}
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    echo json_encode(array("message" => "No task found.")
    );
}
  
?>
