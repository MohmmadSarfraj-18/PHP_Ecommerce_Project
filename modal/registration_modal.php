<?php
include('../connection/config.php');
class RegistrationModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }

    public function insert_user_info($user_info) {
        // var_dump($user_info);
        $insertUser = "INSERT INTO users(role,name,email,password,status,address, city, state, pincode , phone_no , delivery_address) 
        values('user','".$user_info['user']."','".$user_info['email']."','".$user_info['password']."','active','".$user_info['address']."','".$user_info['city']."','".$user_info['state']."','".$user_info['pincode']."','".$user_info['phone']."','".$user_info['address']."')"; 
        $res = mysqli_query($this->config , $insertUser);
        return $res;
    }
}
?>