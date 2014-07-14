<html>
<head>
    <title>Eudoxus</title>
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
    <div class="container-fluid" style="min-width: 970px;">

        <?php include 'header.php' ?>

        <div id="content" class="row">
            <div class="row">
                <div class="col-xs-1" ></div>
                <div class="col-xs-11" >
                    <ol class="breadcrumb" style="background:none;">
                        <li><a href="index.php">Αρχική</a></li>
                        <li class="active">αναζήτηση</li>
                        <li class="active">Επικοινωνία ανθρώπου υπολογιστή</li>
                    </ol>
                </div>
            </div>

            <div class="row" id="result-group">

                <!-- 1 category -->
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <div class="row">
                                        <div class="col-xs-1"></div>
                                        <div class="col-xs-10" style="height: 30px;">
                                            <div class="lead">Συγγράμματα (1 αποτέλεσμα)</div>
                                        </div>
                                    </div>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">

                                <!-- 1 result -->
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-xs-1"></div>
                                    <div class="col-xs-3" style="width:auto;">
                                        <img class="img-thumbnail" style="display: block;" src="book_img/epikoinwnia_anthrwpou_ypologisth.jpg">
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="row blue-font lead" style="text-align:left; font-size:20px;">
                                            <div class="col-xs-5">
                                                <span>Επικοινωνία Ανθρώπου-Υπολογιστή </span>
                                            </div>
                                            <div class="col-xs-2" style="text-align:left; font-size:14px;">
                                                <img style="float:left margin-right: 2px;" src="img/details-small-icon.png">
                                                <span>λεπτομέρειες</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-1" style="width: 40px;">
                                                <img style="display: block;" src="img/user-small-icon.png">
                                            </div>
                                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                                <span>Dix Alan J.,Finlay Janet E.,Abowd Gregory D.,Beale Russell</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-1" style="width: 40px;">
                                                <img style="display: block;" src="img/calendar-small-icon.png">
                                            </div>
                                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                                <span>3η έκδ./2007</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-1" style="width: 40px;">
                                                <img style="display: block;" src="img/library-small-icon.png">
                                            </div>
                                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                                <span>ΕΚΔΟΣΕΙΣ Χ. ΓΚΙΟΥΡΔΑ & ΣΙΑ ΕΕ</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-1" style="width: 40px;">
                                                <img style="display: block;" src="img/link-small-icon.png">
                                            </div>
                                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                                <span>Ιστοσελίδα βιβλίου</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-1" style="width: 40px;">
                                                <img style="display: block;" src="img/maps-small-icon.png">
                                            </div>
                                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                                <span>Ζωοδόχου Πηγής 70-74 & Καλλιδρομίου</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of result -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of category -->
        </div>
    </div>

    <?php include 'footer.php' ?>

</body>


</html>


