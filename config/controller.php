<?php
require('../classes/login.php');

if(isset($_POST['log']) && isset($_POST['email']) && isset($_POST['password'])):
    $login = new Login();
    if($login->CheckUser($_POST['email'],($_POST['password']))):  
        header("location: ../dashboard/dashboard.php");    
    else:    
        header("location: ../index.php");
    endif;
endif;



?>