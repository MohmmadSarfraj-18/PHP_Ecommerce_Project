<?php
include('../modal/registration_modal.php');
class RegistrationController 
{
    public $conn;
    public function __construct() {
        $this->conn = new RegistrationModal();
    }

    public function insert_Users_Regitrarion($user_information) {
        return $this->conn->insert_user_info($user_information);
    }
}
?>