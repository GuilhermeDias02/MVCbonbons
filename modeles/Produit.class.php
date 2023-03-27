<?php

class Produit{
    private $id;
    private $nom;
    private $prix;
    private $photo;
	private $idCat;

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNom() {
		return $this->nom;
	}
	
	/**
	 * @param mixed $nom 
	 * @return self
	 */
	public function setNom($nom): self {
		$this->nom = $nom;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPrix() {
		return $this->prix;
	}
	
	/**
	 * @param mixed $prix 
	 * @return self
	 */
	public function setPrix($prix): self {
		$this->prix = $prix;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPhoto() {
		return $this->photo;
	}
	
	/**
	 * @param mixed $photo 
	 * @return self
	 */
	public function setPhoto($photo): self {
		$this->photo = $photo;
		return $this;
	}

	public function getIdCat(){
		return Categorie::trouverUneCategorie($this->idCat);
	}

    public static function afficherTous(){
        $req = MonPdo::getInstance() -> prepare("SELECT * FROM produit");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'produit');
        $req -> execute();
        $lesResultats = $req -> fetchAll();

        return $lesResultats;
    }

	public static function afficherRecherche($nom){
		$req = MonPdo::getInstance() -> prepare("SELECT * FROM produit WHERE LOWER(nom) LIKE :nom");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'produit');
        $req -> execute(array(':nom' => $nom.'%'));
        $lesResultats = $req -> fetchAll();

        return $lesResultats;	
	}

    public static function trouverProduit($idCat){
		$req = MonPdo::getInstance() -> prepare("SELECT * FROM produit WHERE idCat = :idCat");
        $req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'produit');
        $req -> execute(array(':idCat' => $idCat.'%'));
        $lesResultats = $req -> fetchAll();

        return $lesResultats;	
	}

	public static function ajout($nom, $prix, $image, $bdd){
		$req = MonPdo::getInstance() -> prepare("INSERT INTO 'produit' ('nom', 'prix', 'photo') VALUES (LOWER(:nom), :prix, :image);");
		$req -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'produit');
        $req -> execute(array(':nom' => $nom, ':prix' => $prix, ':image' => $image));
	}

}