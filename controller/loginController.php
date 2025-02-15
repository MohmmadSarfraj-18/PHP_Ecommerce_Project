<?php
include('../modal/loginModal.php');
class LoginController
{
    public $conn;
    public function __construct() {
        $this->conn = new LoginModal();
    }

    /*-------------------------------
        Fetch All Users Record
    --------------------------------*/
    public function check_user_status($data) {
        $userRecord = $this->conn->fetch_All_Users();
        $isUserActive = false;
        $userID = 0;    // hold user 
        foreach($userRecord as $key => $value) {
            if( strtoupper($value['email']) == strtoupper($data['email']) && strtoupper($value['password']) == strtoupper($data['password']) ) {
                if(strtoupper($value['status']) == "ACTIVE") {
                    $userID = $key;
                    $isUserActive = true;
                    break;
                } else {
                    $error = '<p class="text-danger ps-3">ACCOUNT_INACTIVATED_ERROR <br/> Your Account Has Been Inactivated..!</p>';
                    break;
                }
            } else $error = '<p class="text-danger">Login Error: Email OR Password invalid..!</p>';
        } 

        if($isUserActive) return $userRecord[$userID];
        else $_SESSION['error_message'] = $error;
    }
    // /*--------------------------
    //     Fetch Search AllProducts
    // ---------------------------*/
    // public function search_kids_allProducts($searchingData) {
    //     return $this->conn->find_out_allProducts($searchingData);
    // }
}
?>