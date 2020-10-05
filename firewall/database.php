<?php
class Database{

    var $host = "";
    var $user = "";
    var $password = "";
    var $database = "";

    var $conn = NULL;
    var $result = false;

    public function __construct(){
        $config = new Config();

        $this->host = $config->host;
        $this->user = $config->user;
        $this->password = $config->password;
        $this->database = $config->database;
    }

    function open() {
        $func = 'mysqli_connect';

        //connection to mySql
        $this->conn = $func($this->host, $this->user, $this->password);

        if(!@mysqli_select_db($this->conn, $this->database))
        {
            return false;
        }

        return true;
    }

    function query($sql = ''){
        $this->result= @mysqli_query($this->conn, $sql);
        return ($this->result != false);
    }

    function fetchAssoc(){
        return (@mysqli_fetch_assoc($this->result));
    }

}

?>