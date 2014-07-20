<?php
require_once 'utils/user_utils.php';
session_start();

$user = new User();

$user->logout();

header( 'Location: register.php');
?>

