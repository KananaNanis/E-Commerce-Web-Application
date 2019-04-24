<?php
// include("config.php");
include(realpath(dirname(__FILE__) . '/../database/config.php'));

class dbconnect{
    var $conn;
    var $results;
    public function dbConnection(){
        // Create connection
         $this->conn = new mysqli(servername, username, password, database);

        // Check connection
        if ($this->conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
             return false;
        }              
        
        //  echo "<script type= 'text/javascript'>alert('Connected Successfully');</script>";
         return true;
    }
    //query database
    public function query($dbquery){
        if(!$this->dbConnection()){
            echo "Connection failed";
            return false;
        }

        if($this->conn==null){
           echo "Error finding the database";
            return false;
        }
        $this->results=$this->conn->query($dbquery);
        if($this->results==false){
            return false;
        }
        return true;
    }
    //Fetch result row as an associative array
    function queryData(){
        if($this->results==null){
            return false;
        }
        if($this->results==false){
            return false;
        }
         return $this->results->fetch_assoc();
    }

    function queryResults(){
      return mysqli_num_rows($this->results);
    }
    
}

?>