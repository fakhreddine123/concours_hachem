<?php
class Candidat{

    public $id;
    public $name;
    public $orcid;
    public $university;
    public $email;
    public $phone;
    public $description;

    public static function checkOrcid($orcid){
        $sql="SELECT * FROM candidat WHERE orcid='$orcid'";
        return DB::fetch($sql);
    }

    public function register(){
		$sql="INSERT INTO candidat(name,orcid)
		VALUES(:name,:orcid)";
		DB::query($sql,array(
			':name'=>$this->name,
			':orcid'=>$this->orcid
		));
        $this->id = DB::getLastId();
	}

    public function updateProfile(){
		$sql="UPDATE candidat SET name=:name, university=:university, email=:email, phone=:phone, description=:description WHERE id=:id";
		DB::query($sql,array(
			':name'=>$this->name,
            ':university'=>$this->university,
			':email'=>$this->email,
            ':phone'=>$this->phone,
            ':description'=>$this->description,
            ':id'=>$this->id
		));
	}

    public static function getById($id){
		$sql="SELECT * FROM candidat WHERE id=:id";
		return DB::fetch($sql,array(
			':id'=>$id
		));
	}
	
	public static function count(){
		$requette="SELECT * FROM candidat ";
		return DB::count($requette);
	}
	
	public static function getAll(){
		$requette="SELECT * FROM candidat";
		return DB::fetchAll($requette);
	}


}
?>
