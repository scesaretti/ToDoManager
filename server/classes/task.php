<?php
class Task
{
    private $conn;
    private $table_name = "tasks";
    public $id;
    public $taskDescr;
    public $taskDate;
    public $taskPriority;
    public $taskState;
    
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){
        $query = "SELECT * FROM
                " .$this->table_name ." ORDER BY taskDate DESC";

        $stmt = $this->conn->prepare($query);
  
        $stmt->execute();
  
        return $stmt;
    }

    function create()
    {
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                taskdescr=:taskdescr, taskdate=:taskdate, taskpriority=:taskpriority, taskstate=:taskstate";
  
        $stmt = $this->conn->prepare($query);
  
        // cleaning fields
        $this->taskDescr=htmlspecialchars(strip_tags($this->taskDescr));
        $this->taskDate=htmlspecialchars(strip_tags($this->taskDate));
        $this->taskPriority=htmlspecialchars(strip_tags($this->taskPriority));
        $this->taskState=htmlspecialchars(strip_tags($this->taskState));
  
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
  
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    taskdescr = :taskdescr,
                    taskdate = :taskdate,
                    taskpriority = :taskpriority,
                    taskstate = :taskstate
                WHERE
                    id = :id";
  

        $stmt = $this->conn->prepare($query);
  
        // cleaning fields
        $this->taskDescr=htmlspecialchars(strip_tags($this->taskDescr));
        $this->taskDate=htmlspecialchars(strip_tags($this->taskDate));
        $this->taskPriority=htmlspecialchars(strip_tags($this->taskPriority));
        $this->taskState=htmlspecialchars(strip_tags($this->taskState));
        $this->id=htmlspecialchars(strip_tags($this->id));
  
        // bind new values
        $stmt->bindParam(':taskdescr', $this->taskDescr);
        $stmt->bindParam(':taskDate', $this->taskDate);
        $stmt->bindParam(':taskpriority', $this->taskPriority);
        $stmt->bindParam(':taskstate', $this->taskState);
        $stmt->bindParam(':id', $this->id);
  
        if($stmt->execute()){
            return true;
        }
  
        return false;
    }
}
?>