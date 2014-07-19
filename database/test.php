<?php

include 'utils/db_link.php';
include 'utils/user_utils.php';

Global $Linker;

$Linker= new DBLink();                 
$success = $Linker->DBLinking();
if($success == false) printf("CONNECTION ERROR!!! NO DATABASE AVAILABLE!!!");
else printf("CONNECTION SUCCESSFULL!!!");



$USER = new User();

$USER->register("blenikos","abcd17","Professors","std10179@di.uoa.gr");

printf("USER CREATION SUCCESSFULL!!!");

//printf($USER->get_user_type());

?>