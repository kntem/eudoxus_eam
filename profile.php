<html>
<head>
    <title>Eudoxus home</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
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

            <?php include 'header.php' ?>

            <div id="content" class="row">

                <div class="row">
                    <div class="col-xs-1" ></div>
                    <div class="col-xs-11" >
                        <ol class="breadcrumb" style="background:none;">
                            <li><a href="index.php">Αρχική</a></li>
                            <li class="active">Προφίλ</li>
                        </ol>
                    </div>
                </div>

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
                                <div class="col-xs-10"></div>
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

        <?php include 'footer.php' ?>

    </div>
</body>
</html>

