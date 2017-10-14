<?php

class DB{

	protected static $_pdo=NULL;

	/**
	*Connexion à la base de données
	**/
	public static function getInstance(){
		$configs=parse_ini_file('config.ini');
		if(self::$_pdo==NULL){
			try{
				self::$_pdo=new PDO("mysql:dbname=".$configs['DB_name'].";host=".$configs['DB_host'],
									$configs['DB_user'],
									$configs['DB_pass'],
									array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'));
				self::$_pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			}
			catch(PDOException $e){
				die($e->getMessage());
			}
		}
		return self::$_pdo;
	}

	/**
	*Exécuter une requete
	*Requetes autorisées : UPDATE / DELETE / INSERT
	**/
	public static function query($sql,$data=array()){
		try{
			$prepared=self::getInstance()->prepare($sql);
			$prepared->execute($data);
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}

	/**
	*Récupérer une liste d'entregistrement
	**/
	public static function fetchAll($sql,$data=array()){
		try{
			$prepared=self::getInstance()->prepare($sql);
			$prepared->execute($data);
			return $prepared->fetchAll(PDO::FETCH_OBJ);
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}

	/**
	*Récupérer un seul enregistrement
	**/
	public static function fetch($sql,$data=array()){
		try{
			$prepared=self::getInstance()->prepare($sql);
			$prepared->execute($data);
			return ($prepared->rowCount()==1) ? $prepared->fetch(PDO::FETCH_OBJ) : false;
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}

	/**
	*Compter la liste des enregistrements
	**/
	public static function count($sql,$data=array()){
		try{
			$prepared=self::getInstance()->prepare($sql);
			$prepared->execute($data);
			return $prepared->rowCount();
		}
		catch(PDOException $e){
			die($e->getMessage());
		}
	}

	/**
	*Identifiant de la dernière ligne insérée
	**/
	 public static function getLastId() {
        return self::getInstance()->lastInsertId();
    }


}
function slug($str){
	$a = array('À','Á','Â','Ã','Ä','Å','Æ','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ð','Ñ','Ò','Ó','Ô','Õ','Ö','Ø','Ù','Ú','Û','Ü','Ý','ß','à','á','â','ã','ä','å','æ','ç','è','é','ê','ë','ì','í','î','ï','ñ','ò','ó','ô','õ','ö','ø','ù','ú','û','ü','ý','ÿ','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','Ð','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','?','?','J','j','K','k','L','l','L','l','L','l','?','?','L','l','N','n','N','n','N','n','?','O','o','O','o','O','o','Œ','œ','R','r','R','r','R','r','S','s','S','s','S','s','Š','š','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Ÿ','Z','z','Z','z','Ž','ž','?','ƒ','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','?','?','?','?','?','?');
	$b = array('A','A','A','A','A','A','AE','C','E','E','E','E','I','I','I','I','D','N','O','O','O','O','O','O','U','U','U','U','Y','s','a','a','a','a','a','a','ae','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','o','u','u','u','u','y','y','A','a','A','a','A','a','C','c','C','c','C','c','C','c','D','d','D','d','E','e','E','e','E','e','E','e','E','e','G','g','G','g','G','g','G','g','H','h','H','h','I','i','I','i','I','i','I','i','I','i','IJ','ij','J','j','K','k','L','l','L','l','L','l','L','l','l','l','N','n','N','n','N','n','n','O','o','O','o','O','o','OE','oe','R','r','R','r','R','r','S','s','S','s','S','s','S','s','T','t','T','t','T','t','U','u','U','u','U','u','U','u','U','u','U','u','W','w','Y','y','Y','Z','z','Z','z','Z','z','s','f','O','o','U','u','A','a','I','i','O','o','U','u','U','u','U','u','U','u','U','u','A','a','AE','ae','O','o');
	return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/','/[ -]+/','/^-|-$/'),array('','-',''),str_replace($a,$b,$str)));
}
$db=new DB();
?>
