<?php
class Database
{
    private $dbFile="../../ToDoManager.db";
    public $conn;
    public function getConnection()
    {
        $this->conn = null;

        try{
            $this->conn = new PDO("sqlite:$this->dbFile");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            echo "exception ".$e->getMessage();
        }
        return $this->conn;
    }
}
?>
