<?php
require('../modal/userModal.php');
class UserController
{
    public $conn;
    public function __construct() {
        $this->conn = new UserModal();
    }

    /*-------------------------------------
        Fetch All  Record OF Users TAble
    ----------------------------------------*/
    public function fetch_users_data() {
        return $this->conn->fetchAllUser();
    }

    /*--------------------------
        GET User Details
    --------------------------*/
    public function get_User_Details($data) {
        return $this->conn->fetch_Specific_user($data);
    }
    /*--------------------------
        Update User Status
    --------------------------*/
    public function update_User_Status($data) {
        $this->conn->updateStatus($data);
    }
    /*--------------------------
        Fetch Active Users
    --------------------------*/
    public function check_Users_Active($data) {
        // var_dump($data);
        $record = $this->conn->findout_Active_User();

        foreach ($record as $key => $value) {
            // var_dump($value);
        }
        if($value['email'] == $data['email'] && $value['password'] == $data['password']) {
            return $record;
        } else {
            $error =  '<p class="text-danger">Login Error: Email OR Password invalid..!</p>';
        }
    
        
    }
}
?>