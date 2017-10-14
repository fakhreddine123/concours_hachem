<?php
require_once "../class/system/includes.php";
require_once "../class/Candidat.php";
require_once "../class/User.php";
if(isset($_SESSION["admin"])){
    redirect("home.php");
}
if(!empty($_POST)){
    $error=false;
    $message="<strong>Error!</strong><br />";
    if(empty($_POST["email"])){
        $error=true;
        $message.="Email is required.<br />";
    }
    if(empty($_POST["password"])){
        $error=true;
        $message.="Password is required.<br />";
    }
    if(!$error){
        $user=User::connect($_POST["email"],$_POST["password"]);
        if(!$user){
            setFlash("Ckeck your login/password","alert-danger");
        }
        else{
            $_SESSION["admin"]["id"] = $user->id;
            $_SESSION["admin"]["name"]=$user->prenom." ".$user->nom;
            $_SESSION["admin"]["role"] = $user->role;
            redirect("home.php");
        }
    }
    if($error){
        setFlash($message,"alert-danger");
    }
}
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
    <style>
    body {
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #eee;
    }

    .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }
    .form-signin .form-signin-heading,
    .form-signin .checkbox {
      margin-bottom: 10px;
    }
    .form-signin .checkbox {
      font-weight: normal;
    }
    .form-signin .form-control {
      position: relative;
      height: auto;
      -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
              box-sizing: border-box;
      padding: 10px;
      font-size: 16px;
    }
    .form-signin .form-control:focus {
      z-index: 2;
    }
    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }
    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }

    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post" action="">
          <?php flash(); ?>

        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="text" name="email" value="<?php echo @$_POST["email"]; ?>" id="inputEmail" class="form-control" placeholder="Email address">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->

  </body>
</html>
