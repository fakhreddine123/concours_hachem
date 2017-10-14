<?php
class User{

	public $id;
	public $nom;
	public $prenom;
	public $email;
	public $password;
	/**
	*Connexion administrateur
	*@param string $email email de l'administrateur
	*@param string $password mot de passe de l'administrateur
	**/
	public static function connect($email,$password){
		$db=new DB();
		$sql="SELECT * FROM user WHERE email=:email AND password=:password";
		return $db->fetch($sql,array(
			':email'=>$email,
			':password'=>md5($password)
		));
	}
	
	/**
	*Récupérer un administrateur
	*@param int $id identifiant de l'administrateur
	**/
	public static function getById($id){
		$db=new DB();
		$sql="SELECT * FROM user WHERE id=:id";
		return $db->fetch($sql,array(
			':id'=>$id
		));
	}
	
	/**
	*Vérifier l'existance de l'adresse email
	*@param string $email adresse email à vérifier
	**/
	public static function verifEmail($email){
		$db=new DB();
		$sql="SELECT email FROM user WHERE email=:email";
		return $db->count($sql,array(
			':email'=>$email
		));
	}
	
	/**
	*Modifier les informations de l'administrateur
	**/
	public function update(){
		$db=new DB();
		$sql="UPDATE user SET nom=:nom,prenom=:prenom,email=:email,password=:password WHERE id=:id";
		return $db->query($sql,array(
			':nom'=>$this->nom,
			':prenom'=>$this->prenom,
			':email'=>$this->email,
			':password'=>$this->password,
			':id'=>$this->id
		));
	}
	
	/**
	*Ajouter un nouvel administrateur
	**/
	public function add(){
		$db=new DB();
		$sql="INSERT user admin(nom,prenom,email,password,role) VALUES (:nom,:prenom,:email,:password,:role)";
		$db->query($sql,array(
			':nom'=>$this->nom,
			':prenom'=>$this->prenom,
			':email'=>$this->email,
			':role'=>$this->role,
			':password'=>$this->password
		));
		return $db->getLastId();
	}
	
	
	/**
	*Récupérer un adminpar son email
	*@param string $email adresse email de l'admin
	**/
	public static function getByEmail($email){
		$db=new DB();
		$sql="SELECT * FROM user WHERE email=:email";
		return $db->fetch($sql,array(
			':email'=>$email
		));
	}
	
	/**
	*Modifier le mot de passe de l'administrateur
	**/
	public static function updatePassword($pass,$id){
		$db=new DB();
		$sql="UPDATE user SET password=:password WHERE id=:id";
		return $db->query($sql,array(
			':password'=>$pass,
			':id'=>$id
		));
	}
	
	/**
	*Mot de passe aléatoire
	**/
	public static function generatePassword(){
		$pass="";
		for($i=0;$i<10;$i++){
			$num=rand(65,122);
			if($num<=90 || $num >=97){
				$pass.=chr($num);
			}
		}
		return $pass;
	}

}
?>
