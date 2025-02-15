<?php 
if (!isset($_SESSION)) 
{
  session_start();
}
    session_destroy();
    header('location: ../index.php');  
    // unset($_SESSION['user_id']);
    // unset($_SESSION['user']);
?>