<?php
require_once "../class/system/includes.php";
require_once "../class/Candidat.php";
require_once "../class/User.php";
require_once "../class/Publication.php";
if(!isset($_SESSION["admin"])){
    redirect("./");
}
$listeCandidats=Candidat::getAll();
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
    $is="candidats";
    require_once "../includes/header-admin.php";
    ?>

    <div class="container-fluid">
      <div class="row">
        <?php
        require_once "../includes/sidebar.php";
        ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Researchers</h1>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>University</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Publications</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($listeCandidats as $cand):
                ?>
                <tr>
                  <td><?php echo $cand->id; ?></td>
                  <td><?php echo $cand->name; ?></td>
                  <td><?php echo $cand->university; ?></td>
                  <td><?php echo $cand->email; ?></td>
                  <td><?php echo $cand->phone; ?></td>
                  <td><a href="publications.php?r=<?php echo $cand->id; ?>">Show</a></td>
                </tr>
                <?php
                endforeach;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
