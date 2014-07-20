<?php

require_once 'db_utils.php';

class User {

    private $user_info;
    private $user_id;
    private $class_type_info;

    function __construct()
    {
        if ($this->is_logined()){
            $this->user_id = $_SESSION['user_id'];
            $this->user_info = new db_User($this->user_id);
        }
    }

    function login($username, $password)
    {
        //initialiases session variables
        $Linker = new DBLink();
        $Linker->DBLinking();
        $query = "SELECT id
                  FROM Users
                  WHERE Username = ? && Password = ?";
        $stmt = mysqli_prepare($Linker->DataBase,$query);
        mysqli_stmt_bind_param($stmt,"ss",$username,$password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $this->user_id);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        if($this->user_id == NULL)
        {
            $_SESSION['user_id'] = '';
            return;
        }
        else {
            $this->user_info = new db_User($this->user_id);
            $_SESSION['user_id'] = $this->user_id;
            $_SESSION['username'] = $this->$username;
        }

        $type = $this->get_user_type();

        if($type = "Students")
            $this->class_type_info = new Student($this->user_info->get_table_id());
        elseif($type = "Professors")
            $this->class_type_info = new Professor($this->user_info->get_table_id());
        elseif($type = "Publishers")
            $this->class_type_info = new Publisher($this->user_info->get_table_id());
        else; //secretaries

    }

    function register($username, $password, $user_type, $email)
    {
        Global $Linker;
        $query = "SELECT MAX(id) FROM ".$user_type;
        $stmt = mysqli_prepare($Linker->DataBase,$query);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $max_id);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        $max_id++;

        $query = "SELECT MAX(id) FROM Users";
        $stmt = mysqli_prepare($Linker->DataBase,$query);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $new_id);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        $new_id++;

        $query = "INSERT INTO Users
                  VALUES (?,?,?,?,?,?)";
        $stmt = mysqli_prepare($Linker->DataBase,$query);
        mysqli_stmt_bind_param($stmt,"issssi",$new_id,$username,$password,$email,$user_type,$max_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $query= "set foreign_key_checks=0";
        $stmt = mysqli_prepare($Linker->DataBase,$query);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        $query = "INSERT INTO ".$user_type." (id)
                  VALUES (?)";
        $stmt = mysqli_prepare($Linker->DataBase,$query);
        mysqli_stmt_bind_param($stmt,"i",$max_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    function is_logined()
    {
        if(isset($_SESSION['user_id']) and $_SESSION['user_id'] != '')
            return true;
        else
            return false;
    }

    function logout()
    {
        //nullifies session variables
        $_SESSION['user_id'] = '';
        $_SESSION['username'] = "guest";
    }

    function update_profile($email, $password)
    {
    }

    function get_user_type(){return $this->user_info->get_user_type();}

    function send_mail($id){
    }
}


class Student extends User {

    private $student_info;

    function __construct($search_value)
    {
        $this->student_info = new db_Student($search_value);
    }

    function get_statement_history($id){
    }

    function get_current_statement($id){
    }

    function create_statement($id){
    }

    function save_statement($id){
    }

    function update_statement($id){
    }
}


class Professor extends User
{
    private $professor_info;

    function __construct($search_value) 
    {
        $this->professor_info = new db_Professor($search_value);
    }
}


class Publisher extends User 
{
    private $publisher_info;
    
    function __construct($search_value) 
    {
        $this->publisher_info = new db_Publisher($search_value);
    }
}

?>
