<?php
require_once 'utils/user_utils.php';
session_start();

$username = $_POST['LoginUsername'];
$password = $_POST['LoginPassword'];


$user = new User();

$user->login($username, $password);

if ($user->is_logined())
    header( 'Location: profile.php');
else {
   $_SESSION['login_error'] = true;
    header( 'Location: register.php');
}
?>
