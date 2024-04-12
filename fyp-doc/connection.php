<?php

    $database= new mysqli("localhost","root","","fyp-doc");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>



