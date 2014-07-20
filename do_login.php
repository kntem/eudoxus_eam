<?php
require_once 'utils/user_utils.php';
session_start();

$username = $_POST['LoginUsername'];
$password = $_POST['LoginPassword'];


$user = new User();

$user->login($username, $password);

if ($user->is_logined()) {
    if (isset($_SESSION['redirection']) and $_SESSION['redirection']) {
        $redirection = $_SESSION['redirection'];
        unset($_SESSION['redirection']);
        header(redirection);
    }
    header( 'Location: profile.php');
}
else {
   $_SESSION['login_error'] = true;
    header( 'Location: register.php');
}
?>
