<?php

$action = $_GET["action"];

function securiser ($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);

    return $donnees;
}

if (isset($_POST['recherche'])) {
    $recherche = securiser($_POST['recherche']);
}

if (isset($_POST['categorie'])){
    $categorie = $_POST['categorie'];
}

switch ($action){
    case "liste":
        $lesProduits = Produit::afficherTous();
        include "vues/listeProduits.php";
        break;
    case "recherche":
        $lesProduits = Produit::afficherRecherche($recherche);
        include "vues/listeProduits.php";
        break;
    case "ListeCat":
        $lesProduits = Produit::trouverProduit($categorie);
        include "vues/listeParCat.php";
        break;
}