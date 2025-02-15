<?php
include('../connection/config.php');
class LoginModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }

    /*-------------------------
        fetch Users Record
    -------------------------*/
    public function fetch_All_Users() {
        
        $res = mysqli_query($this->config , "SELECT * FROM users WHERE role = 'user'");
        return $res->fetch_All(MYSQLI_ASSOC);
    }
}
?>