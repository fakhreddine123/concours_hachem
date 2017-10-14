<?php
class Publication{

	public $id;
	public $position;
	public $author;
	
	
	/**
	*Récupérer la liste des publications
	**/
	public static function getAll($author){
		$requette="SELECT * FROM publication WHERE author='$author'";
		return DB::fetchAll($requette);
	}
	
	/**
	*Récupérer une publication
	*@param int $id identifiant du type
	**/
	public static function getById($id){
		$sql="SELECT * FROM publication WHERE id=:id";
		return DB::fetch($sql,array(
			':id'=>$id
		));
	}
	
	/**
	*Suuprimer
	**/
	public static function delete($id){
		$sql="DELETE FROM publication WHERE id=:id";
		return DB::query($sql,array(
			':id'=>$id
		));
	}
	
	/**
	*ajouter
	**/
	public function add(){
		$sql="INSERT INTO publication(id,position,author)
		VALUES(:id,:position,:author)";
		return DB::query($sql,array(
			':id'=>$this->id,
			':position'=>$this->position,
			':author'=>$this->author
		));
	}
	
	/**
	*Modifier
	**/
	public function edit(){
		$sql="UPDATE publication SET position=:position WHERE id=:id";
		return DB::query($sql,array(
			':position'=>$this->position,
			':id'=>$this->id
		));
	}
	
	public static function count(){
		$requette="SELECT * FROM publication ";
		return DB::count($requette);
	}

}
?>
