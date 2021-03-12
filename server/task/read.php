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
if ($row= $stmt->fetch(PDO::FETCH_ASSOC))
{
    $tasksArray=array();

    $tasksArray["records"]=array();
    $taskItem=$row;
    array_push($tasksArray["records"], $taskItem);

    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
  
        $taskItem=$row;
        array_push($tasksArray["records"], $taskItem);


    }
  

  
    // set response code - 200 OK
    http_response_code(200);
  
    echo json_encode($tasksArray);
}
else{
  
    // set response code - 404 Not found
    http_response_code(404);
  
    echo json_encode(array("message" => "No task found.")
    );
}
  
?>
