<?php
require_once "class/system/includes.php";
require_once "class/Candidat.php";
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
<header class="flat-header">
  <!-- Banner Content-->
  <div class="header-content">
    <div class="header-content-inner">
      <h1 class="homeHeading animated slideInDown">Human Resources isn’t a thing we do. <span>
        It’s the thing that runs our business.</span></h1>
      <div class="konnect-button-1 animated bounceIn"><a href="about-us.html">Get More</a></div>
    </div>
  </div>
</header>
<!--Top Call to Action-->
<section class="light-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12 konnect-callout"> <img src="static/img/desk-chair.png" alt="icon" width="70" class="img-responsive center-block">
        <h3 class="text-center" style="color:#0A84CB">Corporate Hiring</h3>
        <p class="text-center">Get connected with us for your hiring need. For more informations contact
         <span><a href="mailto:contact@aten.tn">contact@aten.tn</a></span></p>
          <div class="text-center"><a class="konnect-home" href="admin">Sign in to your account</a></div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12"> <img src="static/img/information.png" alt="icon" class="img-responsive center-block">
        <h3 class="text-center" style="color:#0A84CB">Are you a researcher?</h3>
        <p class="text-center">Please login using your ORCID account. For more informations contact <span><a href="mailto:contact@aten.tn">contact@aten.tn</a></span></p>
         <div class="text-center">
             <a class="konnect-home" href="https://orcid.org/oauth/authorize?client_id=APP-WINEWRK2EVHK9GD9&response_type=code&scope=/authenticate&redirect_uri=http://oneway-it.com/projets/concours/register.php">
                 Connect using OCRID account
             </a>
         </div>
      </div>
    </div>
  </div>
</section>
<!-- About Us -->
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-6 hidden-sm hidden-xs text-center"> <img src="static/img/man-people-space-desk.jpg" alt="responsive design" class="img-responsive"> </div>
	  <div class="col-md-6 col-sm-12">
        <h2 class="section-heading text-dark">Partner with <span>Recruit Plus</span></h2>
        <h4>INCREASE YOUR STRENGTH OR HAPPY EMPLOYEE QUOTIENT </h4>
        <div class="konnect-space"></div>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, quisquam, culpa, soluta hic aperiam porro ipsum nisi optio necessitatibus commodi dolorum sapiente voluptatem officiis similique maiores! Quaerat, quisquam quibusdam quam iure vel accusamus nisi velit est at et temporibus sunt delectus dolorem. Reprehenderit, possimus aperiam iste hic repudiandae tempora sit laborum ut velit id! Obcaecati at architecto in vitae porro. </p>
        <ul class="konnect-list">
          <li> Recruitment </li>
          <li> Consulting </li>
          <li> US Staffing </li>
          <li> Training </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!--Our Services-->
<section class="light-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-dark">
        <!--Services Heading-->
        <h2 class="section-heading text-dark">Recruit Plus <span>Corporate Services </span></h2>
        <h4>INDUSTRY SPECIFIC RECRUITMENT SOLUTIONS </h4>
        <div class="konnect-space"></div>
      </div>
    </div>
    <div class="row services">
      <div class="col-md-4 col-sm-6">
        <div class="service-box"> <img src="static/img/teamwork.png" alt="icon">
          <H4>PERMANENT STAFFING</H4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="service-box"> <img src="static/img/search.png" alt="icon">
          <H4>EXECUTIVE SEARCH</H4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="service-box"> <img src="static/img/payroll.png" alt="icon">
          <H4>PAYROLL MANAGEMENT</H4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="service-box"> <img src="static/img/consulting.png" alt="icon">
          <H4>CONSULTING SERVICES</H4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="service-box"> <img src="static/img/erp.png" alt="icon">
          <H4>ERP SOLUTIONS</H4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6">
        <div class="service-box"> <img src="static/img/temporary.png" alt="icon">
          <H4>TEMPORARY STAFFING</H4>
          <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam.</p>
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
