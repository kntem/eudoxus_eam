<?php
session_start();

require_once 'utils/db_utils.php';

$Linker = new DBLink();
$Linker->DBLinking();
$query = "SELECT *
          FROM Books
          WHERE Title LIKE ?
             OR Publisher LIKE ?
             OR ISBN LIKE ?
             OR Title LIKE ?
             OR Author LIKE ?";


$init_search_term = $_GET['search_value'];
$search_term = "%".$init_search_term."%";

$stmt = mysqli_prepare($Linker->DataBase,$query);
mysqli_stmt_bind_param($stmt,"sssss",$search_term,$search_term,$search_term,$search_term,$search_term);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id, $Publisher_id, $ISBN, $Title, $Author, $Field_of_Study,
                        $Cover_image, $Binding, $Edition, $Webpage, $Location, $Dimensions, $Pages, $Abstract);
mysqli_stmt_store_result($stmt)
//mysqli_stmt_close($stmt);

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

        <?php include 'header.php' ?>

        <div id="content" class="row">
            <div class="row">
                <div class="col-xs-1" ></div>
                <div class="col-xs-11" >
                    <ol class="breadcrumb" style="background:none;">
                        <li><a href="index.php">Αρχική</a></li>
                        <li class="active">αναζήτηση</li>
                        <li class="active"><? echo $init_search_term;?></li>
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
                                        <div class="lead">Συγγράμματα (<? echo $stmt->num_rows; ?> αποτέλεσμα)</div>
                                        </div>
                                    </div>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">

                                <!-- 1 result -->

                                <?
                                while(mysqli_stmt_fetch($stmt)) {

                                   $query2 = "SELECT Name
                                              FROM Publishers
                                              WHERE id = ?"; 

                                    $Linker2 = new DBLink();
                                    $Linker2->DBLinking();

                                    $stmt2 = mysqli_prepare($Linker2->DataBase,$query2);
                                    mysqli_stmt_bind_param($stmt2,"s",$Publisher_id);
                                    mysqli_stmt_execute($stmt2);
                                    mysqli_stmt_bind_result($stmt2,$Publisher);
                                    mysqli_stmt_fetch($stmt2);
                                ?>
                                <div class="row" style="margin-top: 10px;">
                                    <div class="col-xs-1"></div>
                                    <div class="col-xs-4" style="width:auto;">
                                    <img class="img-thumbnail" style="display: block;height:200px;width:145px;" src="book_img/<? echo $Cover_image ?>">
                                    </div>
                                    <div class="col-xs-8">
                                        <div class="row blue-font lead" style="text-align:left; font-size:20px;">
                                            <div class="col-xs-5">
                                               <a href="browse_item.php?book_id=<? echo $id; ?>"> <span><? echo $Title ?></span></a>
                                            </div>
                                            <div class="col-xs-2" style="text-align:left; font-size:14px;">
                                                <img style="float:left margin-right: 2px;" src="img/details-small-icon.png">
                                                <a href="browse_item.php?book_id=<? echo $id; ?>"><span>λεπτομέρειες</span></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-1" style="width: 40px;">
                                                <img style="display: block;" src="img/user-small-icon.png">
                                            </div>
                                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                                <span><? echo $Author ?></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-1" style="width: 40px;">
                                                <img style="display: block;" src="img/calendar-small-icon.png">
                                            </div>
                                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                                <span><? echo $Edition ?></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-1" style="width: 40px;">
                                                <img style="display: block;" src="img/library-small-icon.png">
                                            </div>
                                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                                <span><? echo $Publisher ?></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-1" style="width: 40px;">
                                                <img style="display: block;" src="img/link-small-icon.png">
                                            </div>
                                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                                <a href="<? echo $Webpage ?>"><span>Ιστοσελίδα βιβλίου</span></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-1" style="width: 40px;">
                                                <img style="display: block;" src="img/maps-small-icon.png">
                                            </div>
                                            <div class="col-xs-9 blue-font lead" style="text-align:left; font-size:14px;">
                                                <span><? echo $Location ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <? } ?><? echo $stmt->num_rows; ?>
                                <!-- end of result -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of category -->
<?php mysqli_stmt_close($stmt);?>

        </div>
    </div>

    <?php include 'footer.php' ?>

</body>


</html>


