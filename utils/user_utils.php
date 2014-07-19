/*    User Utils
 */
<?php

include 'db_utils.php';

class User {

    private $user_info;
    private $session_id;
    private $class_type_info;

    function login($username, $password)
    {
        //initialiases session variables
        Global $Linker;
        $query = "SELECT id
                  FROM Users
                  WHERE Username = ? && Password = ?";
        $stmt = mysqli_prepare($Linker->DataBase,$query);
        mysqli_stmt_bind_param($stmt,"ss",$username,$password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $this->session_id);
        mysqli_stmt_fetch($stmt);       
        mysqli_stmt_close($stmt);
        
        if($this->session_id == NULL)
        {
        //message user unable to login
        }
        else $this->user_info = new db_User($this->session_id);
        
        $type = $this->get_user_type();
        
        if($type = "Students")
            $this->class_type_info = new Student($this->user_info->get_table_id());      
        elseif($type = "Professors")
        {
        }
        elseif($type = "Publishers")
        {
        }
        else //secretaries
        {
        }
        
    }

    function register($username, $password, $user_type, $email)
    {
    }

    function is_logined($id){
        //checks session variables
        //if id is null checks existing variables
    }

    function logout()
    {
        //nullifies session variables
        $this->session_id = NULL;
        $this->user_info = NULL;
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


class Secretary extends User {
}


class Professor extends User {
}
?>
