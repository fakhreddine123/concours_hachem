<?php
if(!isset($is)){
    $is="home";
}
?>
<div class="col-sm-3 col-md-2 sidebar">
  <ul class="nav nav-sidebar">
    <li <?php if($is=="home"){echo 'class="active"';} ?>><a href="home.php">Overview <span class="sr-only">(current)</span></a></li>
    <li <?php if($is=="candidats"){echo 'class="active"';} ?>><a href="candidats.php">Researchers</a></li>
    <li <?php if($is=="Journaux"){echo 'class="active"';} ?>><a href="journaux.php">Journaux</a></li>
    <li <?php if($is=="Categorie"){echo 'class="active"';} ?>><a href="categorie.php">Categorie</a></li>
  </ul>
</div>
