<?php
/**
*Méthode qui permet de supprimer les caractéres spéciaux
*trim() : permet de supprimer les éspaces avant et après le mot
*addslashes() : permet d'ajouter des antislashe '\' avant les caractéres spéciaux
*strip_tags() : permet de supprimer les tags HTML
**/
function safe($string,$tags=true){
	$string=addslashes(trim($string));
	if($tags){return strip_tags($string);}
	return $string;
}
/**
*Méthode qui permet preparer un message d'alerte
*@param strint $message le message à stocker
*@param string $class classe css
**/
function setFlash($message,$class=''){
	$_SESSION['message']['texte']=$message;
	$_SESSION['message']['class']=$class;
}
/**
*Méthode qui permet d'afficher un message d'alerte
*@param boolean $closable true si on veux afficher le boutton fermer su le message et false sinon
**/
function flash($closable=true){
	if(isset($_SESSION['message'])){
		echo '<div class="alert margin '.$_SESSION['message']['class'].'">';
		echo $_SESSION['message']['texte'].'</div>';
		unset($_SESSION['message']);
	}
}
/**
*Méthode permettant de vérifier si l'administrateur est connecté
**/
function verifSession(){
	if(!isset($_SESSION['user'])){
		header('location:../');
	}
}
/**
*Vérifier un fichier
**/
function verifFile($file,$extensions=array()){
	$maxSize=5000000;
	$size=$file['size'];
	if($size>$maxSize){
		return 0;
	}
	else{
		$info=pathinfo($file['name']);
		if(!in_array(strtolower($info['extension']),$extensions)){
			return 1;
		}
		else{
			return 2;
		}
	}
}
/**
*Uploader un fichier
**/
function uploadFile($file,$directory,$newNname=''){
	if($newNname!=''){
		$exts=explode('.',$file['name']);
		$exten=$exts[count($exts)-1];
		//$newNname.='.'.$exten;
		$root = $directory.'/'.$newNname;
		$name=$newNname;
	}
	move_uploaded_file($file['tmp_name'],$root);
	return $name;
}
/**
*Afficher la date en français
**/
function showDate($timestamp){
	$m=date('m',$timestamp);
	$months=array('Janvier','Fevrier','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
	return date('d',$timestamp).' '.$months[$m-1].' '.date('Y',$timestamp);
}
/**
*Convertir la date from FR to EN
**/
function ConvertToEn($d) {
	$date="";
	if($d==""){
		return "";
	}
	else{
	 $date = $date.substr($d,6,4)."-"; // année
	 $date = $date.substr($d,3,2)."-";  // mois
	 $date = $date.substr($d,0,2) ;        // jour
	  return $date;
	}
}
/**
*Définir des variant_absbles utiles
**/
define('_WEBSITE_NAME_','ATEN');
/**
*fonction de redirection
**/
function redirect($path){
	header('location:'.$path);
	exit();
}
/**
*get XML attribute
**/
function xml_attribute($object, $attribute)
{
    if(isset($object[$attribute]))
        return (string) $object[$attribute];
}
?>
