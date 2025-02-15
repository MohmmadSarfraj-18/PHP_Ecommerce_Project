<?php
require("../connection/config.php");
class loginModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }

    public function checkAdminStatus($admin_data) {

        $res = mysqli_query($this->config , "SELECT name, email , id, password FROM users WHERE role = 'admin' AND status = 'active'");
        $data = $res->fetch_All(MYSQLI_ASSOC);
        return $data;
    }
}
?>

