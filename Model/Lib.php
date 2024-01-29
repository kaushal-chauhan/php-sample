<?php
    class Database
    {
        protected $connection;
        protected $tableName;
        protected $entityId;

        public function __construct()
        {
            $this->connection = new mysqli("localhost","root","","sample");
        }

        public function insert($inserData)
        {
            //  if (!count($inserData)) {
            //      return false;
            //  }
            $inserRow =  "INSERT INTO ".$this->tableName." (".implode(",", array_keys($inserData)).")  VALUES ('".implode("','", $inserData)."')";
            if ($this->connection->query($inserRow) === TRUE) {
                return true;
            }
        }

        public function select($id = 0, $sortingField = "", $sortOrder = "ASC")
        {
            $selectRow = "SELECT * FROM ".$this->tableName;
            if ($id > 0) {
                $selectRow .= " WHERE ".$this->entityId." = ".$id;
                $result = $this->connection->query($selectRow);
                $result = $result->fetch_array();
                return $result;
            }
            if ($sortingField) {
                $selectRow .= " ORDER BY ".$sortingField." ".$sortOrder;
            }
            $result = $this->connection->query($selectRow);
            if ($result->num_rows > 0) {
                return $result;
            }
            return false;
        }

        public function update($pid,$updateData){
            $upd   = "UPDATE ".$this->tableName." SET   ";
            $comma = "";
            foreach ($updateData as $key => $user) {
                $upd .=  $comma . $key." = '" . $user."' ";
                $comma = " , ";
            }
            $upd .= " WHERE ".$this->entityId." =".$pid;
            $exe = mysqli_query($this->connection,$upd);
            return $exe;
        }

        public function delete($id){
            
            $del   = "delete from ".$this->tableName." WHERE ".$this->entityId." =".$id;
            
            // echo $del;
            // echo die();
            $exe = mysqli_query($this->connection,$del);
            return $exe;
        }
    }

    class Product extends Database
    {
        protected $tableName = "product";
        protected $entityId = "entity_id";
    }

    class Catagory extends Database
    {
        protected $tableName = "category";
        protected $entityId = "entity_id";
        
    }

?>