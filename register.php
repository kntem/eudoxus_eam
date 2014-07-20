<?php
session_start();

require_once 'utils/user_utils.php';

$user = new User();

if ($user->is_logined()){
    header( 'Location: profile.php');
}



?>
<html>
<head>
    <title>Eudoxus Login/Registration</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#registration-tabs a').click(function (e) {
                e.preventDefault()
                $(this).tab('show')
            })
        });
    </script>

</head>




<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <div class="container-fluid" style="min-width: 1200px;">

        <?php include 'header.php' ?>

        <div id="large-content" class="row">
            <div class="row">
                <div class="col-xs-1" ></div>
                <div class="col-xs-11" >
                    <ol class="breadcrumb" style="background:none;">
                        <li><a href="index.php">Αρχική</a></li>
                        <li class="active">Εγγραφή</li>
                        <li class="active">Σύνδεση</li>
                    </ol>
                </div>
            </div>
<!-- ---------------------------- LOGIN ---------------------------- -->

            <div class="row" id="login">
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-10" style="height: 30px;">
                        <div class="lead">Σύνδεση</div>
                    </div>
                </div>

                <div class="row "><div class="col-xs-1"></div><div class="separator col-xs-8"></div></div>
                <div class="row ">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-10 blue-font lead" style="font-size:15px;">
                        <span>Συνδεθείτε με τα στοιχεία που σας δώθηκαν από το τμήμας σας ή με τα στοιχεία που κάνατε την εγγραφή.</span>
                    </div>
                </div>

                <div class="row" style="margin-top:20px;"></div>

                <div class="row">
                <?php if (isset($_SESSION['login_error']) and $_SESSION['login_error']) { ?>
                    <div class="col-xs-1"></div>
                    <div class="col-xs-4">
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Λάθος όνομα χρήστη ή κωδικό! Ξαναπροσπαθήστε...</strong>
                        </div>
                    </div>
                <?php }?>
                <?php if (isset($_SESSION['login_required']) and $_SESSION['login_required']) { ?>
                    <div class="col-xs-1"></div>
                    <div class="col-xs-6">
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>Χρειάζεται να συνδεθείτε για να προβάλεις αυτή τη σελίδα.</strong>
                        </div>
                    </div>
                <?php }?>
                </div>
                <div class="row ">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-11 ">
                    <form class="form-horizontal" role="form" action="do_login.php" method="post">
                        <div class="form-group <?php if (isset($_SESSION['login_error']) and $_SESSION['login_error']) {?> has-error <?php }?>">
                            <label for="inputRegUsername" class="col-sm-2 control-label lead blue-font" style="font-size:14px;">Όνομα χρήστη</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputLoginUsername" name="LoginUsername" placeholder="username or email">
                            </div>
                        </div>
                        <div class="form-group <?php if (isset($_SESSION['login_error']) and $_SESSION['login_error']) {?> has-error <?php }?>">
                            <label for="inputRegPassword" class="col-sm-2 control-label lead blue-font" style="font-size:14px;">Κωδικός</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="inputLoginPassword" name="LoginPassword" placeholder="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Σύνδεση</button>
                            </div>
                      </div>
                    </form>
                    </div>
                </div>
            </div>
            <?php
                $_SESSION['login_error'] = false;
                $_SESSION['login_required'] = false
            ?>

<!-- ---------------------------- REGISTRATION ---------------------------- -->

            <div class="row" id="login">
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-10" style="height: 30px;">
                        <div class="lead">Εγγραφή</div>
                    </div>
                </div>

                <div class="row "><div class="col-xs-1"></div><div class="separator col-xs-8"></div></div>


                <div class="row ">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-11" style="padding:10px;">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" id="registration-tabs" role="tablist" style="width: 650px;">
                            <li class="active"><a href="#student-reg" role="tab" data-toggle="tab">Φοιτητής</a></li>
                            <li><a href="#secretary-reg" role="tab" data-toggle="tab">Γραμματεία Τμήματος</a></li>
                            <li><a href="#publisher-reg" role="tab" data-toggle="tab">Εκδότης</a></li>
                            <li><a href="#notes-provider-reg" role="tab" data-toggle="tab">Διαθέτης βοηθημάτων και σημειώσεων</a></li>
                        </ul>


                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="student-reg">
                                <form class="form-horizontal" role="form" action="do_register.php" method="post">
                                    <div class="form-group ">
                                        <label for="inputRegUsername" class="col-sm-2 control-label lead blue-font" style="font-size:14px;">Όνομα χρήστη</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputLoginUsername" name="inputLoginUsername" placeholder="username">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputRegPassword" class="col-sm-2 control-label lead blue-font" style="font-size:14px;">Κωδικός</label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" id="inputLoginPassword" name="inputLoginPassword" placeholder="password">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputRegPassword" class="col-sm-2 control-label lead blue-font" style="font-size:14px;">Επαλήθευση Κωδικού</label>
                                        <div class="col-sm-4">
                                            <input type="password" class="form-control" id="inputLoginPasswordConfirm" name="inputLoginPasswordConfirm" placeholder="password">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputRegUsername" class="col-sm-2 control-label lead blue-font" style="font-size:14px;">Όνομα</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputLoginName" name="inputLoginName" placeholder="name">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputRegUsername" class="col-sm-2 control-label lead blue-font" style="font-size:14px;">Επώνυμο</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputLoginSurname" name="inputLoginSurname" placeholder="surname">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputRegUsername" class="col-sm-2 control-label lead blue-font" style="font-size:14px;">e-mail</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputLoginMail" name="inputLoginMail" placeholder="e-mail">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputRegUsername" class="col-sm-2 control-label lead blue-font" style="font-size:14px;">Τηλέφωνο</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" id="inputLoginTelephone" name="inputLoginTelephone" placeholder="telephone number">
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputRegUsername" class="col-sm-2 control-label lead blue-font" style="font-size:14px;">Πανεπιστήμιο</label>
                                        <div class="col-sm-4">
                                            <select type="text" class="form-control" id="inputLoginiUniversity" name="inputLoginiUniversity" placeholder="university">
                                                <option>Εθνικό και Καποδιστριακό Πανεπιστήμιο Αθηνών</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="inputRegUsername" class="col-sm-2 control-label lead blue-font" style="font-size:14px;">Τμήμα</label>
                                        <div class="col-sm-4">
                                            <select type="text" class="form-control" id="inputLoginDepartment" name="inputLoginDepartment" placeholder="department">
                                                <option>Πληροφορικής και Τηλεπικοινωνιών</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-5"></div>
                                        <div class="col-sm-2">
                                            <button type="submit" class="btn btn-primary">Εγγραφή</button>
                                        </div>
                                  </div>
                                </form>
                            </div>
                            <div class="tab-pane fade " id="secretary-reg">
                                secretary registration
                            </div>
                            <div class="tab-pane fade" id="publisher-reg">
                                publisher registration
                            </div>
                            <div class="tab-pane fade" id="notes-provider-reg">
                                notes provider registration
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </div>

        <?php include 'footer.php' ?>

    </div>
</body>


</html>

