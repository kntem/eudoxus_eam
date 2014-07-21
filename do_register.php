<?php
session_start();

function is_email($input){
    if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else
        return false;
}

function is_x_chars_long($input, $chars_no){
    if (strlen($input) >= $chars_no){
        return true;
    }
    else
        return false;
}

function is_telephone($input){
    $tel = str_replace(['-', ' '], '', $input);
    if (strlen($tel) == 10) {
        return true;
    }
    else
        return false;
}


$Username = $_POST['inputLoginUsername'];
$_SESSION['register_values']['Username'] = $Username;


if (!is_x_chars_long($Username, 3)){
    $_SESSION['register_error']['Username']['error'] = 'Το username είναι κάτω από 3 χαρακτήρες.';
}

$Password = $_POST['inputLoginPassword'];
$PasswordConfirm = $_POST['inputLoginPasswordConfirm'];

if ($Password != $PasswordConfirm){
    $_SESSION['register_error']['Password']['error'] = 'Οι κωδικοί πρόσβασης δεν είναι ίδιοι.';
}

$Name = $_POST['inputLoginName'];
$_SESSION['register_values']['Name'] = $Name;
if (!is_x_chars_long($Name, 2)){
    $_SESSION['register_error']['Name']['error'] = 'Έχεις όνομα κάτω από 3 χαρακτήρες?';
}

$Surname = $_POST['inputLoginSurname'];
$_SESSION['register_values']['Surname'] = $Surname;
if (!is_x_chars_long($Surname, 2)){
    $_SESSION['register_error']['Surname']['error'] = 'Έχεις επώνυμο κάτω από 3 χαρακτήρες?';
}

$Mail = $_POST['inputLoginMail'];
$_SESSION['register_values']['Mail'] = $Mail;

if (!is_email($Mail)){
    $_SESSION['register_error']['Mail']['error'] = 'Δεν δώσατε έγκυρη διεύθυνση email.';
}

$Telephone = $_POST['inputLoginTelephone'];
$_SESSION['register_values']['Telephone'] = $Telephone;

if (!is_telephone($Telephone)){
    $_SESSION['register_error']['Telephone']['error'] = 'Δεν δώσατε έγκυρο τηλέφωνο.';
}

$University = $_POST['inputLoginiUniversity'];
$_SESSION['register_values']['University'] = $University;

$Department = $_POST['inputLoginDepartment'];
$_SESSION['register_values']['Department'] = $Department;


if (isset($_SESSION['register_error'])){
    header('Location: register.php');
}

?>

