<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once "class/system/includes.php";
require_once "class/Candidat.php";
if(!isset($_SESSION["user"]["id"])){
    redirect("./");
}
$candidat=Candidat::getById($_SESSION["user"]["id"]);
if(!empty($_POST)){
    $message="<strong>Error!</strong><br>";
    $error=false;
    if(empty($_POST["name"])){
        $message.="Name is required.<br />";
        $error=true;
    }
    if(empty($_POST["university"])){
        $message.="University is required.<br />";
        $error=true;
    }
    if(empty($_POST["email"])){
        $message.="Email is required.<br />";
        $error=true;
    }
    if(empty($_POST["phone"])){
        $message.="Phone number is required.<br />";
        $error=true;
    }
    if(!$error){
        $candidatObj=new Candidat();
        $candidatObj->id=$candidat->id;
        $candidatObj->name=$_POST["name"];
        $candidatObj->university=$_POST["university"];
        $candidatObj->email=$_POST["email"];
        $candidatObj->phone=$_POST["phone"];
        $candidatObj->description=$_POST["description"];
        $candidatObj->updateProfile();
        $_SESSION["user"]["name"] = $candidatObj->name;
        setFlash("<strong>Congratulation!</strong><br />Your profile was successfully updated","alert-success");
        redirect("profil.php");
    }
    else{
        setFlash($message,"alert-danger");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="">
<!-- Favocon -->
<link href="static/img/fav.png" rel="shortcut icon" type="image/x-icon"/>

<!-- Title -->
<title><?php echo _WEBSITE_NAME_; ?></title>

<!-- Bootstrap Core CSS -->
<link href="static/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom icon Fonts -->
<link href="static/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- Animated CSS -->
<link href="static/css/animate.css" media="all" rel="stylesheet" type="text/css" />

<!-- Main CSS -->

<link href="static/css/default.css" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- Body -->
<body>

<!-- Pre Loader -->
<div class="loading">
  <div class="loader"></div>
</div>

<?php
$is="home";
require_once "includes/header.php";
?>
<!-- Banner -->
<header class="innner-page">
  <div class="container">
    <h1><i class="fa fa-angle-double-right" aria-hidden="true"></i>My profile</h1>
  </div>
</header>

<!-- Single Blog Post-->
<section class="konnect-news">
  <div class="container">
    <div class="row">
      <!--Blog Content-->
      <div class="blog-content col-sm-12 col-md-8 col-xs-12">
        <h2 class="blog-heading text-default">Welcome, <?php echo $_SESSION["user"]["name"]; ?> </h2>
        <div class="social-share"></div>
        <div class="konnect-space"></div>

        <?php flash(); ?>

        <div class="blog-commetns">

          <form class="konnect-form" id="commentForm" method="post" action="">
            <input type="text" name="name" value="<?php echo $candidat->name; ?>" class="form-control form-left" placeholder="Your Name">
            <input type="text" name="university" value="<?php echo $candidat->university; ?>" class="form-control form-left" placeholder="University/Laboratory">
            <input type="email" name="email" value="<?php echo $candidat->email; ?>" class="form-control form-right" placeholder="Enter Your E-Mail">
            <input type="text" name="phone" value="<?php echo $candidat->phone; ?>" class="form-control form-right" placeholder="Enter Your phone number">
            <textarea class="form-control" name="description" id="comment" placeholder="About me..."><?php echo $candidat->description; ?></textarea>
            <button type="submit" class="konnect-submit">Update</button>
          </form>
        </div>

      </div>
      <!-- Blog Single- Right Sidebar-->
      <div class="side-bar col-sm-12 col-md-4 col-xs-12">
        <div class="blog-subscribe">
          <h3>Menu</h3>
            <ul class="list-group">
                <li class="list-group-item active"><a href="profil.php">My profile</a></li>
                <li class="list-group-item"><a href="publications.php">My publications</a></li>
                <li class="list-group-item"><a href="logout.php">Logout</a></li>
            </ul>

            <ul class="list-group">
                <li class="list-group-item active">
                    <a href="http://orcid.org/<?php echo $_SESSION["user"]["orcid"]; ?>" target="_blank">
                        orcid.org/<?php echo $_SESSION["user"]["orcid"]; ?>
                    </a>
                </li>
            </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once "includes/footer.php";
?>
<!-- jQuery -->

<script src="static/assets/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="static/assets/bootstrap/js/bootstrap.min.js"></script>

<!-- Theme JavaScript -->
<script src="static/js/default.js"></script>
</body>

</html>
