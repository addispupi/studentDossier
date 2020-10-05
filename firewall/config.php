<?php
class Config {
    var $host = '';
    var $user = '';
    var $password = '';
    var $database = '';

    function Config() {
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->database = "starter";
    }
}
?>