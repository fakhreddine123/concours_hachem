<?php
require_once "../class/system/includes.php";
require_once "../class/Candidat.php";
require_once "../class/User.php";
require_once "../class/Publication.php";
if (!isset($_SESSION["admin"])) {
    redirect("./");
}
$listeCandidats = Candidat::getAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo _WEBSITE_NAME_; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="../static/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="dash.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <?php
        $is = "Categorie";
        require_once "../includes/header-admin.php";
        ?>

        <div class="container-fluid">
            <div class="row">
                <?php
                require_once "../includes/sidebar.php";
                ?>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Journaux</h1>
                    <?php
                    require_once '../Excel/reader.php';
                    $data = new Spreadsheet_Excel_Reader();
                    $data->setOutputEncoding('CP1251');
                    $data->read('../Journal.xls');
                    error_reporting(E_ALL ^ E_NOTICE);
                    $nb_col = 17;
                    $nb_ligne = $data->sheets[0]['numRows'] + 1;
                    ?>
                    <br>
                    <button class="btn btn-success">Nombre des journaux :  <?php echo $nb_ligne - 2 ?></button>
                    <br><br>
                    <form name="f" class="form form-group">
                        <input name="nom" class="form-control" type="text"><br>
                        <input class="btn btn-success" type="button" onclick="afficher(document.f.nom.value);" value="Rechercher">
                    </form>

                    <div id="journal">

                    </div>

                </div>
            </div>
        </div>

    </body>
</html>


<script>
    function afficher(nom) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("journal").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "ajax_journaux.php?nom=" + nom, true);
        xmlhttp.send();
    }
</script>
