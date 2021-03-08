<?php
class Database 
{
    private dbFile="../ToDoManager.db";
    public $conn;
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn =new PDO("sqlite:$this->dbFile);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}
?>
