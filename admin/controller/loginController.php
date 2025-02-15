<?php
session_start();

require('../modal/loginModal.php');
class loginController
{
    public $conn;
    public function __construct() {
        $this->conn = new loginModal();
    }

    public function check_Users_Active($admindata) {
        
        $data = $this->conn->checkAdminStatus($admindata);

        if($data[0]['email'] == $admindata['email'] && $data[0]['password'] == $admindata['password']) {
            return $data;
        } else {
            $error =  '<p class="text-danger">Login Error: Email OR Password invalid..!</p>';
        }
    }
}
?>