<?php

include "vues/header.php";

include "modeles/Produit.class.php";
include "modeles/Categorie.class.php";
include "modeles/monPdo.php";


if(empty($_GET["uc"])){
    $uc = "accueil";
}
else{
    $uc = $_GET["uc"];
}

switch($uc){
    case "accueil":
        $lesCategories = Categorie::recupererToutes();
        include "vues/accueil.php";
        break;
    case "bonbons":
        include "controleurs/controleurBonbons.php";
        break;
    case "admin":
        include "controleurs/controleurAdmin.php";
        break;
}

echo '<a href="vues/voirpdf.php">Générer un pdf</a>';

include "vues/footer.php";