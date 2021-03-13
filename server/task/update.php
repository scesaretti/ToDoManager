<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST,PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
include_once '../config/database.php';
include_once '../classes/task.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
$task = new Task($db);
  
$data = json_decode(file_get_contents("php://input"));
  
$task->idTask = $data->idTask;
  
if($task->update()){
    // set response code - 200 ok
    http_response_code(200);
  
    echo json_encode(array("message" => "Task updated."));
}
  
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    echo json_encode(array("message" => "Unable to update task."));
}
?>
