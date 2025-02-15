<?php
require("../connection/config.php");

class UserModal
{
    public $config;
    public function __construct() {
        $conn = new Connection();
        $this->config = $conn->connect();
    }

    /*-----------------------------------
        Fetch All Users Table Record
    ------------------------------------*/
    public function fetchAllUser() {
        $query = "SELECT * FROM users";
		$result = mysqli_query($this->config, $query);
        return $result->fetch_all(MYSQLI_ASSOC); 
    }
    /*-----------------------------------
        Fetch Specific Users Record
    ------------------------------------*/
    public function fetch_Specific_user($id) {
        $query = "SELECT id, status FROM users WHERE id =". $id['id'];
		$result = mysqli_query($this->config, $query);
        return $result->fetch_all(MYSQLI_ASSOC); 
    }
    /*----------------------------
        Update User Status
    -----------------------------*/
    public function updateStatus($data) {
        
        $query = "UPDATE users SET status='".$data['status']."' WHERE id = '".$data['id']."'"; 
        $result = mysqli_query($this->config, $query);

        if($result) {
            // header('location: users.php'); 
            echo "<script>location.href='users.php'</script>";
        }else{
            echo '<div class="alert alert-danger mt-5" role="alert">Error: Update failed.</div>';
        }
    }
     /*-----------------------------------
        Fetch Active Users Record
    ------------------------------------*/
    public function findout_Active_User() {
        $result = mysqli_query($this->config , "SELECT name, email , id, password FROM users WHERE role = 'admin' AND status = 'active'");
        return $result->fetch_all(MYSQLI_ASSOC); 
    }
}
?>