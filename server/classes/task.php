<?php
class Task
{
    private $conn;
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
        $query = "INSERT INTO tasks (taskdescr,taskpriority,taskdate,taskstate) VALUES ( ";
        $query=$query."?,?,?,?)";
     
        $stmt = $this->conn->prepare($query);
  
        // cleaning fields
        $this->taskDescr=htmlspecialchars(strip_tags($this->taskDescr));
        $this->taskPriority=htmlspecialchars(strip_tags($this->taskPriority));
        $this->taskState=1;
        $this->taskDate=date("d-m-Y");  
        // bind values
        $stmt->bindParam(1, $this->taskDescr);
        $stmt->bindParam(2, $this->taskDate);
        $stmt->bindParam(3, $this->taskPriority);
        $stmt->bindParam(4, $this->taskState);
        if($stmt->execute()){
            return true;
        }
  
        return false;
      
    }

    function update()
    {
  
        $query = "UPDATE tasks SET taskstate =0 WHERE idtask =?";
  
        $stmt = $this->conn->prepare($query);
  
        $this->idTask=htmlspecialchars(strip_tags($this->idTask));
        // bind new values
        $stmt->bindParam(1, $this->idTask);
  
        if($stmt->execute()){

            return true;
        }
  
        return false;
    }
}
?>
