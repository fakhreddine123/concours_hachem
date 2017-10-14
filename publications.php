<?php
require_once "class/system/includes.php";
require_once "class/Candidat.php";
require_once "class/Publication.php";
if(!isset($_SESSION["user"]["id"])){
    redirect("./");
}
$listPublications=Publication::getAll($_SESSION["user"]["id"]);
$pubs=[];
foreach($listPublications as $p){
    $pubs[$p->id]=1;
}
/**
* Get token
**/
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://orcid.org/oauth/token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "client_id=APP-WINEWRK2EVHK9GD9&client_secret=78c62802-32c9-42a6-8133-e8b967443472&grant_type=client_credentials&scope=/read-public");
curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = "Accept: application/json";
$headers[] = "Content-Type: application/x-www-form-urlencoded";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

$data = json_decode($result);
$token=$data->access_token;

/**
* Get record
**/

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://pub.orcid.org/v2.0/0000-0001-8268-8870/works");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


$headers = array();
$headers[] = "Accept: application/vnd.orcid+xml";
$headers[] = "Authorization: Bearer $token";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

$publications = new SimpleXMLElement($result);
$activities=$publications->xpath('//activities:group/work:work-summary/work:title/common:title/text()');
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
    <h1><i class="fa fa-angle-double-right" aria-hidden="true"></i>My publications</h1>
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

        <!-- publications -->

        <div class="col-sm-12 text-dark">
            <h2 class="section-heading text-dark">Summary of <span> your research works</span></h2>
            <div class="konnect-space"></div>
        </div>

        <div class="row">
            <?php flash(); ?>

            <div class="job-single-header">
                <div class="col-sm-10">Title</div>
                <div class="col-sm-2">Details</div>
            </div>
            <?php
            foreach($activities as $i=>$activity):
            $c=$i+1;
            $path='//activities:group['.$c.']/work:work-summary';
            $putCode=$publications->xpath($path);
            $code=xml_attribute($putCode[0],"put-code");
            ?>
            <div class="job-single row-line" style="width:100%;<?php if(isset($pubs[$code])){echo "background-color: #dff0d8;";} ?>">
                <div class="col-sm-10">
                    <?php echo $activity; ?>
                </div>
                <div class="col-sm-2">
                    <a  href="details.php?pub=<?php echo $code; ?>">Details</a>
                </div>
            </div>
            <?php
            endforeach;
            ?>
        </div>
        <!-- /publications -->

      </div>
      <!-- Blog Single- Right Sidebar-->
      <div class="side-bar col-sm-12 col-md-4 col-xs-12">
        <div class="blog-subscribe">
          <h3>Menu</h3>
            <ul class="list-group">
                <li class="list-group-item"><a href="profil.php">My profile</a></li>
                <li class="list-group-item active"><a href="publications.php">My publications</a></li>
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
