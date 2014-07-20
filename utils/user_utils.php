<?php

require_once 'db_utils.php';

class User {

    public $user_info;
    public $user_id;
    public $class_type_info;

    function __construct()
    {
        if ($this->is_logined()){
            $this->user_id = $_SESSION['user_id'];
            $this->user_info = new db_User($this->user_id);
            $this->class_type_info = new Student($this->user_info->get_table_id());
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
        $Linker = new DBLink();
        $Linker->DBLinking();
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
        $Linker = new DBLink();
        $Linker->DBLinking();
        if($this->is_logined())
        {
        echo("HERE");
            $this->user_info->update_info($email, $password);

            $query = "UPDATE Users
                      SET Password = ?, email = ?
                      WHERE id = ?";
            $stmt = mysqli_prepare($Linker->DataBase,$query);
            mysqli_stmt_bind_param($stmt,"ssi",$password,$email,$this->session_id);
            mysqli_stmt_execute($stmt);
        }
    }

    function update_student($u_ID, $name, $surname, $telephone, $semester, $department)
    {
        $this->class_type_info->update_info($this->get_student_info("id"), $u_ID, $name, $surname, $telephone, $semester, $department);
    }

    function get_user_type(){return $this->user_info->get_user_type();}

    function get_user($type_of_info)
    {
        if($type_of_info == "Username") return $this->user_info->get_username();
        elseif($type_of_info == "Password") return $this->user_info->get_password();
        elseif($type_of_info == "email") return $this->user_info->get_email();
        else return NULL;
    }

    function get_student_info($type_of_info)
    {
        return $this->class_type_info->get_student($type_of_info);
    }

    function send_mail($id){
    }
}


class Student extends User {

    private $student_info;

    function __construct($search_value)
    {
        $this->student_info = new db_Student($search_value);
    }

    function update_info($id, $u_ID, $name, $surname, $telephone, $semester, $department)
    {
        $Linker = new DBLink();
        $Linker->DBLinking();
        $query = "SELECT id
                  FROM Department
                  WHERE Name = ?";
        $stmt = mysqli_prepare($Linker->DataBase,$query);
        mysqli_stmt_bind_param($stmt,"s",$department);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$d_ID);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        $this->student_info->set_student($id, $u_ID, $name, $surname, $telephone, $semester, $d_ID);

        $query = "UPDATE Students
                  SET Univ_ID = ?, Name = ?, Surname = ?, Telephone = ?, Semester = ?, Department_id = ?
                  WHERE id = ?";
        $stmt = mysqli_prepare($Linker->DataBase,$query);
        mysqli_stmt_bind_param($stmt,"ssssiii",$u_ID,$name,$surname,$telephone,$semester,$d_ID,$id);
        mysqli_stmt_execute($stmt);
    }

    function get_student($type_of_info)
    {
        if($type_of_info == "id") return $this->student_info->get_id();
        elseif($type_of_info == "University_ID") return $this->student_info->get_u_id();
        elseif($type_of_info == "University"){
            $Linker = new DBLink();
            $Linker->DBLinking();
            $d_id = $this->student_info->get_d_id();
            $query = "SELECT University_id
                  FROM Department
                  WHERE id = ?";
            $stmt = mysqli_prepare($Linker->DataBase,$query);
            mysqli_stmt_bind_param($stmt,"i",$d_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt,$university_id);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            $query = "SELECT Name
                      FROM University
                      WHERE id = ?";
            $stmt = mysqli_prepare($Linker->DataBase,$query);
            mysqli_stmt_bind_param($stmt,"i",$university_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt,$university_name);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            return $university_name;
        }
        elseif($type_of_info == "FullName")
            return $this->student_info->get_name() . " " .$this->student_info->get_surname();
        elseif($type_of_info == "Name") return $this->student_info->get_name();
        elseif($type_of_info == "Surname") return $this->student_info->get_surname();
        elseif($type_of_info == "Telephone") return $this->student_info->get_telephone();
        elseif($type_of_info == "Semester") return $this->student_info->get_semester();
        elseif($type_of_info == "Department")
        {
            $Linker = new DBLink();
            $Linker->DBLinking();
            $d_id = $this->student_info->get_d_id();
            $query = "SELECT Name
                  FROM Department
                  WHERE id = ?";
            $stmt = mysqli_prepare($Linker->DataBase,$query);
            mysqli_stmt_bind_param($stmt,"i",$d_id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt,$department);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            return $department;
        }
        else return "";
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
