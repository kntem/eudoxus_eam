<html>
<head>
    <title>Eudoxus home</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#profile-tabs a').click(function (e) {
                e.preventDefault()
                $(this).tab('show')
            })
        });
    </script>

</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <div class="container-fluid" style="min-width: 970px;">
            <div id="header" class="row">
                <div class="col-xs-2"><img src="../img/logo.png"></div>
                <div class="col-xs-7">
                    <form>
                            <input class="search rounded" type="text" placeholder="αναζήτηση συγγραμμάτων..." required>
                            <input id="search-button" type="button" value="">
                    </form>
                </div>
                <div id=user class="dropdown col-xs-3">
                    <a style="float: right; margin-top: 17px;" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="register.php">
                            <span id="username">guest</span><span class="caret" style="color:white"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                        <li><a href="register.php">Σύνδεση ή Εγγραφή</a></li>
                    </ul>
                    <img style="float: right;" src="../img/user-icon.png">
                </div>
            </div>

            <div id="mainmenu" class="row">
                <div class="row text-center" >
                    <div class="col-xs-2 lead" style="font-size:16px;">Αρχική</div>
                    <div class="col-xs-2 lead" style="font-size:16px;">Ανακοινώσεις</div>
                    <div class="col-xs-2 lead" style="font-size:16px;">Επικοινωνία</div>
                    <div class="col-xs-2 lead" style="font-size:16px;">Χρήσιμα</div>
                    <div class="col-xs-2 lead" style="float:right;">
                        <img src="../img/rss-logo-big.png">
                        <img src="../img/facebook-logo-big.png">
                        <img src="../img/twitter-logo-big.png">
                    </div>

                </div>
            </div>

            <div id="subtitle" class="row blue-font">
                <div class="col-xs-1" >
                    <div style="float:left;"><img style="height: 30;margin-top: 5px; margin-right:5px;" src="../img/books.png"></div>
                </div>
                <div class="col-xs-10" >
                    <div style="margin-left:-52px; margin-top: 5px;" class="lead"> Ηλεκτρονική Υπηρεσία Ολοκληρωμένης Διαχείρισης Συγγραμμάτων και λοιπών βοηθημάτων</div>
                </div>
            </div>

            <div id="content" class="row">
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-8" >
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" id="profile-tabs" role="tablist">
                            <li class="active"><a href="#details" role="tab" data-toggle="tab">Στοιχεία Φοιτητή</a></li>
                            <li><a href="#history" role="tab" data-toggle="tab">Ιστορικό Δηλώσεων</a></li>
                            <li><a href="#statement" role="tab" data-toggle="tab">Δήλωση Συγγραμμάτων</a></li>
                            <li><a href="#exchange" role="tab" data-toggle="tab">Δανεισμός/Ανταλλαγή</a></li>
                        </ul>


                        <!-- Tab panes -->
                        <div class="tab-content" style="padding: 15px;">

                            <div class="tab-pane fade active in" id="details">
                                <table class="table table-hover lead blue-font" style="font-size:15px;">
                                    <tr>
                                        <td align="right">Ίδρυμα</td><td>Εθνικό και Καποδιστρικό Πανεπιστήμιο Αθηνών</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Σχολή</td><td>Θετικών Επιστημών</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Τμήμα</td><td>Πληροφορικής και Τηλεπικοινωνιών</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Αριθμός Μητρώου</td><td>1115200700192</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Ονομα</td><td>Κωνσταντίνος</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Επώνυμο</td><td>Ντεμάγκος</td>
                                    </tr>
                                    <tr>
                                        <td align="right">email</td><td>std07192@di.uoa.gr</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Αριθμός Τηλεφώνου</td><td>6978342223</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Παραληφθέντα Συγγράμματα</td><td>26</td>
                                    </tr>
                                    <tr>
                                        <td align="right">Τρέχον Εξάμηνο</td><td>14</td>
                                    </tr>
                                </table>
                                <div class="col-xs-8"></div>
                                <div class="col-xs-1">
                                     <button type="submit" class="btn btn-primary">Επεξεργασία</button>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="history">
                                publisher stuff
                            </div>
                            <div class="tab-pane fade" id="statement">
                                notes provider stuff
                            </div>
                            <div class="tab-pane fade" id="exchange">
                                notes provider stuff
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div id="footer" class="row">
            <div class="col-xs-6 lead" style="color:white; font-size:14px;">© Υπουργείο Παιδείας και Θρησκευμάτων | Ελληνική Δημοκρατία
                                  <br>Με τη συγχρηματοδότηση της Ελλάδας & της Ευρωπαϊκής Ένωσης</div>
            <div class="col-xs-4"></div>
            <div class="col-xs-2">
                <img src="../img/facebook-logo-big.png">
                <img src="../img/twitter-logo-big.png">
            </div>
        </div>
    </div>
</body>
</html>

