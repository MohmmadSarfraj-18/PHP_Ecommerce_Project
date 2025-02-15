<?php 
if (!isset($_SESSION)) {
  session_start();
}
    session_destroy();
    header('location: login.php');  
    // header('location: login.php');  
 
    // unset($_SESSION['admin_id']);
    // unset($_SESSION['admin']); 

    /*
                        Difrence Between session_destroy() & unset(session variable)

        session_destroy() is destroy all session variable and unset(session variable) destroy a particular session variable.
    */

?>