<?php

require_once 'user_utils.php';

$user = new User();


$new_ids = $user->register("testname", "testpass", "Students", "test@mail.com");
$user_id = $new_ids[0];
$student_id = $new_ids[1];
echo $user_id;
echo "<br>";
echo $student_id;


//$student = new Student($student_id);
//$student->update_info($student_id, $user_id, "Testname", "testsurname", "6978342223", 8, 1);

?>
