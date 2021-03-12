<?php
class Task
{
    private $conn;
//    private $tableName = "tasks";
    public $idTask;
    public $taskDescr;
    public $taskDate;
    public $taskPriority;
    public $taskState;
    
    public function __construct($db)
    {
        $this->conn = $db;
    }

    function read()
    {
        $query = "SELECT * FROM  tasks ORDER BY taskdate DESC;";
        $stmt = $this->conn->query($query);
  
        return $stmt;
    }

    function create()
    {
        $query = "INSERT INTO tasks set ";
        $query=$query." taskdescr=:taskdescr, taskdate=:taskdate, taskpriority=:taskpriority, taskstate=:taskstate;";
  
        $stmt = $this->conn->prepare($query);
  
        // cleaning fields
        $this->taskDescr=htmlspecialchars(strip_tags($this->taskDescr));
        //$this->taskDate=htmlspecialchars(strip_tags($this->taskDate));
        $this->taskPriority=htmlspecialchars(strip_tags($this->taskPriority));
        $this->taskState=1;
        $this->taskDate=date("d-m-Y");  
        // bind values
        $stmt->bindParam(":taskdescr", $this->taskDescr);
        $stmt->bindParam(":taskdate", $this->taskDate);
        $stmt->bindParam(":taskpriority", $this->taskPriority);
        $stmt->bindParam(":taskstate", $this->taskState);
  
        if($stmt->execute()){
            return true;
        }
  
        return false;
      
    }

    function update()
    {
  
        $query = "UPDATE tasks";

        $query=$query."SET
                    taskstate = :taskstate
                WHERE
                    idtask = :idTask;";
  

        $stmt = $this->conn->prepare($query);
  
        $this->taskId=htmlspecialchars(strip_tags($this->taskId));
        //set task to 0 for closing
        $taskState=0;  
        // bind new values
        $stmt->bindParam(':taskstate', $this->taskState);
        $stmt->bindParam(':id', $this->id);
  
        if($stmt->execute()){
            return true;
        }
  
        return false;
    }
}
?>
