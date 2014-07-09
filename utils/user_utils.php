/*    User Utils
 */
<?php

class User {

    function login($username, $password){
        //initialiases session variables
    }

    function register($username, $password, $user_type, $email){
    }

    function is_logined($id){
        //checks session variables
        //if id is null checks existing variables
    }

    function logout($id){
        //nullifies session variables
    }

    function update_profile($email, $password){
    }

    function get_user_type($id){
    }

    function send_mail($id){
    }
}


class Student extends User {

    private semester;

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
