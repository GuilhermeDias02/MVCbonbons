<h1>Accueil Admin</h1>


<h2>Ajouter</h2>
<form action="index.php?uc=admin" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nomProduit" class="form-label">Produit</label>
        <input type="text" class="form-control" id="nomProduit" name="produit" placeholder="ex: bananes">
    </div>
    <div class="mb-3">
        <label for="Prix" class="form-label">Prix</label>
        <input type="text" class="form-control" id="Prix" name="prix" placeholder="ex: 1.50">
    </div>
    <div class="mb-3">
        <a>Image du produit</a><input type="file" class="form-control" name="nameImage">
    </div>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<h2>Modifier</h2>
<form action="index.php?uc=admin" method="POST">
    <div class="mb-3">
        <label for="colonneProduit" class="form-label">Colonne</label>
        <input type="text" class="form-control" id="colonneProduit" name="colonne" placeholder="ex: nom, prix, photo">
    </div>
    <div class="mb-3">
        <label for="Valeur" class="form-label">Valeur</label>
        <input type="text" class="form-control" id="Valeur" name="valeur" placeholder="ex: bananes, 1.50, Images/bananes.png">
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

if(isset($_POST['colonne']) && isset($_POST['valeur'])){
    $colonne = $_POST['colonne'];
    $valeur = $_POST['valeur'];

    modifier($colonne, $choix, $valeur, $bdd);
}