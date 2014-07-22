<?php
session_start();
require_once 'utils/db_link.php';

$book_id= $_GET['book_id'];
if (is_numeric($book_id)) {

    $Linker = new DBLink();
    $Linker->DBLinking();
    $query = "SELECT *
              FROM Books
              WHERE id = ".$book_id;

    $stmt = mysqli_prepare($Linker->DataBase,$query);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $Publisher_id, $ISBN, $Title, $Author, $Field_of_Study,
                            $Cover_image, $Binding, $Edition, $Webpage, $Location, $Dimensions, $Pages, $Abstract);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    $query = "SELECT Name
              FROM Publishers
              WHERE id = ?";

    $Linker = new DBLink();
    $Linker->DBLinking();

    $stmt = mysqli_prepare($Linker->DataBase,$query);
    mysqli_stmt_bind_param($stmt,"s",$Publisher_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,$Publisher);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
}
?>

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
    <div class="container-fluid" style="min-width: 1200px;">

        <?php include 'header.php'; ?>

        <div id="large-content" class="row">
            <div class="row">
                <div class="col-xs-1" ></div>
                <div class="col-xs-11" >
                    <ol class="breadcrumb" style="background:none;">
                        <li><a href="index.php">Αρχική</a></li>
                        <li class="active">σύγγραμμα</li>
                        <li class="active"><? echo $Title; ?></li>
                    </ol>
                </div>
            </div>

            <div class="row" id="book-item">
                <div class="row">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-10" style="height: 30px;">
                        <div class="lead"><? echo $Title; ?></div>
                    </div>
                </div>

                <div class="row "><div class="col-xs-1"></div><div class="separator col-xs-8"></div></div>
                <div class="row" style="margin-top: 10px;">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-3" style="width:auto;">
                        <img class="img-thumbnail" style="display: block; height: 300px;" src="book_img/<? echo $Cover_image; ?>">
                    </div>
                    <div class="col-xs-8" style="margin-top: 15px;">
                        <div class="row">
                            <div class="col-xs-1" style="width: 40px;">
                                <img style="display: block;" src="img/user-small-icon.png">
                            </div>
                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                <span><? echo $Author; ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-1" style="width: 40px;">
                                <img style="display: block;" src="img/calendar-small-icon.png">
                            </div>
                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                <span><? echo $Edition; ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-1" style="width: 40px;">
                                <img style="display: block;" src="img/isbn-icon.png">
                            </div>
                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                <span>ISBN: <? echo $ISBN; ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-1" style="width: 40px;">
                                <img style="display: block;" src="img/library-small-icon.png">
                            </div>
                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                <span><? echo $Publisher; ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-1" style="width: 40px;">
                                <img style="display: block;" src="img/link-small-icon.png">
                            </div>
                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                <a href="<? echo $WebPage; ?>">Ιστοσελίδα βιβλίου</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-1" style="width: 40px;">
                                <img style="display: block;" src="img/maps-small-icon.png">
                            </div>
                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                <span><? echo $Location; ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-1" style="width: 40px;">
                                <img style="display: block;" src="img/open-book-icon.png">
                            </div>
                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                <span><? echo $Binding; ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-1" style="width: 40px;">
                                <img style="display: block;" src="img/dimensions-icon.png">
                            </div>
                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                <span><? echo $Dimensions; ?></span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-1" style="width: 40px;">
                                <img style="display: block;" src="img/number-of-pages-icon.png">
                            </div>
                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                <span><? echo $Pages; ?> σελίδες</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row "><div class="col-xs-1"></div><div class="blue-separator col-xs-8"></div></div>
                <div class="row ">
                    <div class="col-xs-1"></div>
                    <div class="col-xs-8 blue-font" style="padding:15px;">
                        <? echo $Abstract; ?>
                    </div>
                </div>
                <div class="row "><div class="col-xs-1"></div><div class="blue-separator col-xs-8"></div></div>

            </div>
        </div>

    <?php include 'footer.php'; ?>

</body>


</html>



