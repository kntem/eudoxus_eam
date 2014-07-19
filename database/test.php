<?php

//include 'utils/db_link.php';
include 'utils/db_utils.php';

 $Linker = new DBLink();          
 session_start();
 $_SESSION['link']=$Linker;
        
 $success = $Linker->DBLinking();
if($success == false) printf("CONNECTION ERROR!!! NO DATABASE AVAILABLE!!!");
else printf("CONNECTION SUCCESSFULL!!!");

$USER = new Student(1);

printf("USER CREATION SUCCESSFULL!!!");

printf($USER->get_name());

?>