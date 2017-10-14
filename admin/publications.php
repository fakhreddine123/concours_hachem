<?php
require_once "../class/system/includes.php";
require_once "../class/Candidat.php";
require_once "../class/User.php";
require_once "../class/Publication.php";
if(!isset($_SESSION["admin"])){
    redirect("./");
}
if(empty($_GET['r']) or !is_numeric($_GET["r"])){
    redirect("candidats.php");
}
$candidat=Candidat::getById($_GET['r']);
if(!$candidat){
    redirect("candidats.php");
}
$listPublications=Publication::getAll($candidat->id);
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
          <h1 class="page-header">Publications</h1>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <td>Details</td>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($activities as $i=>$activity):
                $c=$i+1;
                $path='//activities:group['.$c.']/work:work-summary';
                $putCode=$publications->xpath($path);
                $code=xml_attribute($putCode[0],"put-code");
                ?>
                <tr>
                  <td <?php if(isset($pubs[$code])){echo 'style="background-color: #dff0d8;"';} ?>><?php echo $code; ?></td>
                  <td><?php echo $activity; ?></td>
                  <td><a href="details.php?pub=<?php echo $code; ?>">Show</a></td>
                </tr>
                <?php
                endforeach;
                ?>
              </tbody>
            </table>
            <a href="javascript:history.back()" class="btn btn-info">
                <i class="glyphicon glyphicon-arrow-left">&nbsp;</i>Back
            </a>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
