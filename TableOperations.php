<?php
    class TableOperations
    {
         private $conn;
         private $table;

         function __construct($conn, $table)
         {
            $this->conn = $conn;
            $this->table = $table;
         }

         public function add($data){
            $columns = implode("," , array_keys($data));
            $values = implode(",", array_values($data));
            $sql = "INSERT INTO $this->table($columns) VALUES($values)";
            return $this->conn->query($sql);
         }

         public function update($id, $data){
            $set=[];
            foreach($data as $key => $value){
                $set[] = "$key='$value'";
            }
            $setString = implode(",", $set);
            $sql = "UPDATE $this->table SET $setString where id=$id";
            return $this->conn->query($sql);
         }

         public function delete($id){
            $sql = "DELETE FROM $this->table where id=$id";
            return $this->conn->query($sql);
         }

         public function get($id = null){
            $sql = $id ? "SELECT FROM $this->table where id=$id" : "SELECT FROM $this->table";
            return $this->conn->query($sql);
         }
    }
    
?>