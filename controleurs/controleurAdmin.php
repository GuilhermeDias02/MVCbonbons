<?php

include "modeles/Admin.class.php";

if(isset($_POST['login']) && isset($_POST['mdp'])){
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];
}
else{
    echo "probleme post";
}

if (isset($_GET['choix'])){
    $choix = $_GET['choix'];
}

switch($choix){
    case 'formulaire':
        include ('vues/formAdmin.php');
        break;
    case 'verif':
        $rep = Admin::verifier($login, md5($mdp));

        if ($rep == true){
            $_SESSION['autorisation'] = "OK";
            include ('vues/accueilAdmin.php');
        }
        else{
            include ('vues/echecRecherche.php');
        }
        break;
}


if(isset($_POST['produit']) && isset($_POST['prix']) && isset($_FILES)){
    $produit = $_POST['produit'];
    $prix = $_POST['prix'];

    $nom_image = basename($_FILES["image"]['nameImage']);
    $chemin_destination = 'images/' . $nom_image;
    $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin_destination);

    Produit::ajout($produit, $prix, $chemin_destination, $bdd);
}