<?php  
class dbConnect {
    private $servername;
    private $username;
    private $password;
    private $dbname;

    protected function dbConn(){
        $this->servername = "localhost"; 
        $this->username = "root";
        $this->password = ""; 
        $this->dbname = "porekopi";
        $connect = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if($connect){
            return $connect;
        }
    }
}
?>
