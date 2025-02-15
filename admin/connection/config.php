<?php
class Connection
{
    public $conn;
    public function connect() 
    {
        $this->conn = mysqli_connect("localhost" , "root" , "" , "shoppingwebsite");

        if($this->conn) 
        {
            // echo "Connection Successfull";
            return $this->conn;
        } 
        else 
        {
            echo "Connection Failed..!!";
        }
    }
}
?>