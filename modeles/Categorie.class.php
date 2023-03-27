<?php

class Categorie{
    private $id;
    private $libelle;

    /**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

    /**
	 * @return mixed
	 */
	public function getLibelle() {
		return $this->libelle;
	}

    public static function recupererToutes(){
        $req = MonPdo::getInstance() -> prepare("SELECT * FROM categorie");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'categorie');
        $req -> execute();
        $lesResultats = $req -> fetchAll();

        return $lesResultats;
    }

    public static function trouverUneCategorie($id){
        $req = MonPdo::getInstance() -> prepare("SELECT libelle FROM categorie WHERE id = :id");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'categorie');
        $req -> execute(array(':id' => $id));
        $lesResultats = $req -> fetchAll();

        return $lesResultats;
    }
}