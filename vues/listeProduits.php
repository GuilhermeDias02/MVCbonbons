<?php
foreach($lesProduits as $produit){
  echo '
        <div class="card" style="width: 18rem;">
          <img src="images/' . $produit->getPhoto() . '" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">' . $produit->getNom() . '</h5>
            <p class="card-text">' . $produit->getPrix() . '€</p>
            <a href="ajout_panier.php?id=' . $produit->getId() . '" class="btn btn-primary">Ajouter au panier</a>
          </div>
        </div>
          ';
}