<?php
require_once '../Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
$data->setOutputEncoding('CP1251');
$data->read('../Journal.xls');
error_reporting(E_ALL ^ E_NOTICE);
$nb_col = 17;
$nb_ligne = $data->sheets[0]['numRows'] + 1;
?>

<table class="table table-striped table-responsive">
    <tr>
        <th>Id</th>
        <!--1--><th>Rank</th>
        <!--2--><th>Full Journal Title</th>
        <!--3<th>JCR Abbreviated Title</th>-->
        <!--4<th>ISSN</th>-->
        <!--5<th>Total Cites</th>-->
        <!--6--><th>Journal Impact Factor</th>
        <!--7<th>Impact Factor without Journal Self Cites</th>-->
        <!--8<th>5-Year Impact Factor</th>-->
        <!--9<th>Immediacy Index</th>-->
        <!--10<th>Citable Items</th>-->
        <!--11<th>Cited Half-Life</th>-->
        <!--12<th>Citing Half-life</th>-->
        <!--13<th>Eigenfactor Score</th>-->
        <!--14<th>Article Influence Score</th>-->
        <!--15<th>Articles in Citable Items</th>-->
        <!--16<th>Average Journal Impact Factor Percentile</th>-->
        <!--17<th>Normalized Eigenfactor</th>-->


    </tr>
    <?php
    
    $nom=$_GET["nom"];
    for ($l = 2; $l < $nb_ligne; $l++) {
        $champ=$data->sheets[0]['cells'][$l][2];
        //if(stristr($champ,$nom)=== TRUE){
        if(stristr($champ, $nom)==TRUE){
        ?>
        <tr>
            <td><?php echo $l - 1 ?></td>
            <td><?php echo $data->sheets[0]['cells'][$l][1] ?></td>
            <td><?php echo $data->sheets[0]['cells'][$l][2] ?></td>
            <td><?php echo $data->sheets[0]['cells'][$l][6] ?></td>

        </tr> 
        <?php
        }
    }
    ?>
</table>