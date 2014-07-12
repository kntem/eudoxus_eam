<html>
<head>
    <title>Eudoxus Login/Registration</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">



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
    <div class="container-fluid" style="min-width: 970px;">
            <div id="header" class="row">
                <div class="col-md-2"><img src="img/logo.png"></div>
                <div class="col-md-7">
                    <form>
                            <input class="search rounded" type="text" placeholder="αναζήτηση συγγραμμάτων..." required>
                            <input id="search-button" type="button" value="">
                    </form>
                </div>
                <div id=user class="dropdown col-md-3">
                        <a style="float: right; margin-top: 17px;" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="register.php">
                                <span id="username">guest</span><span class="caret" style="color:white"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><a href="register.php">Σύνδεση ή Εγγραφή</a></li>
                        </ul>
                        <img style="float: right;" src="img/user-icon.png">
                </div>
            </div>

            <div id="mainmenu" class="row">
                <div class="row text-center" >
                    <div class="col-md-2 lead" style="font-size:16px;">Αρχική</div>
                    <div class="col-md-2 lead" style="font-size:16px;">Ανακοινώσεις</div>
                    <div class="col-md-2 lead" style="font-size:16px;">Επικοινωνία</div>
                    <div class="col-md-2 lead" style="font-size:16px;">Χρήσιμα</div>
                    <div class="col-md-2 lead" style="float:right;">
                        <img src="img/rss-logo-big.png">
                        <img src="img/facebook-logo-big.png">
                        <img src="img/twitter-logo-big.png">
                    </div>

                </div>
            </div>

            <div id="subtitle" class="row blue-font">
                <div class="col-md-1" >
                    <div style="float:left;"><img style="height: 30;margin-top: 5px;" src="img/books.png"></div>
                </div>
                <div class="col-md-11" >
                    <div class="row">
                        <div style="margin-left:5px;" class="lead">
                            Ηλεκτρονική Υπηρεσία Ολοκληρωμένης Διαχείρισης Συγγραμμάτων και λοιπών βοηθημάτων
                        </div>
                    </div>
                </div>
            </div>



            <div id="content" class="row">
                <div class="row">
                    <div class="col-md-1" ></div>
                    <div class="col-md-11" >
                        <ol class="breadcrumb" style="background:none;">
                            <li><a href="index.php">Αρχική</a></li>
                            <li class="active">Εγγραφή/Σύνδεση</li>
                        </ol>
                    </div>
                </div>
<!-- ---------------------------- LOGIN ---------------------------- -->

                <div class="row" id="login">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10" style="height: 30px;">
                            <div class="lead">Σύνδεση</div>
                        </div>
                    </div>

                    <div class="row "><div class="col-md-1"></div><div class="separator col-md-8"></div></div>
                    <div class="row ">
                        <div class="col-md-1"></div>
                        <div class="col-md-10 blue-font lead" style="font-size:15px;">
                            <span>Συνδεθείτε με τα στοιχεία που σας δώθηκαν από το τμήμας σας ή με τα στοιχεία που κάνατε την εγγραφή.</span>
                        </div>
                    </div>

                    <div class="row" style="margin-top:20px;"></div>

                    <div class="row ">
                        <div class="col-md-1"></div>
                        <div class="col-md-11 ">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <label for="inputRegUsername" class="col-sm-5 control-label lead blue-font" style="font-size:14px;">Όνομα χρήστη</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="inputRegUsername" placeholder="username or email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputRegPassword" class="col-sm-5 control-label lead blue-font" style="font-size:14px;">Email</label>
                                <div class="col-sm-7">
                                    <input type="password" class="form-control" id="inputRegPassword" placeholder="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-10 col-sm-10">
                                <button type="submit" class="btn btn-primary">Σύνδεση</button>
                            </div>
                          </div>
                        </form>
                        </div>
                    </div>
                </div>

<!-- ---------------------------- REGISTRATION ---------------------------- -->

                <div class="row" id="login">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10" style="height: 30px;">
                            <div class="lead">Εγγραφή</div>
                        </div>
                    </div>

                    <div class="row "><div class="col-md-1"></div><div class="separator col-md-8"></div></div>


                    <div class="row ">
                        <div class="col-md-1"></div>
                        <div class="col-md-11" style="padding:10px;">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills" id="registration-tabs" role="tablist" style="width: 550px;">
                                <li class="active"><a href="#secretary-reg" role="tab" data-toggle="tab">Γραμματεία Τμήματος</a></li>
                                <li><a href="#publisher-reg" role="tab" data-toggle="tab">Εκδότης</a></li>
                                <li><a href="#notes-provider-reg" role="tab" data-toggle="tab">Διαθέτης βοηθημάτων και σημειώσεων</a></li>
                            </ul>


                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="secretary-reg">
                                    secretary stuff
                                </div>
                                <div class="tab-pane fade" id="publisher-reg">
                                    publisher stuff
                                </div>
                                <div class="tab-pane fade" id="notes-provider-reg">
                                    notes provider stuff
                                </div>
                            </div>
                        </div>
                    </div>

                </div>




            </div>

            <div id="footer" class="row">
                <div class="col-md-6 lead" style="color:white; font-size:14px;">© Υπουργείο Παιδείας και Θρησκευμάτων | Ελληνική Δημοκρατία
                                      <br>Με τη συγχρηματοδότηση της Ελλάδας & της Ευρωπαϊκής Ένωσης</div>
                <div class="col-md-4"></div>
                <div class="col-md-2">
                    <img src="img/facebook-logo-big.png">
                    <img src="img/twitter-logo-big.png">
                </div>
            </div>
    </div>
</body>
</html>

