<h1>bienvenue sur la boutique de bonbons</h1>

<a href="../MVCbonbons?uc=bonbons&action=liste">Voir la liste</a>

<form action="index.php?uc=bonbons&action=ListeCat" method="POST">
    <select name="categorie">
        <?php
        foreach($lesCategories as $categorie){
            echo '<option value="'.$categorie->getId().'">'.$categorie->getLibelle().'</option>';
        }
        ?>
    </select>

    <button class="btn btn-outline-success" type="submit">Voir</button>
</form>

</br>
</br>

<form class="d-flex" action="index.php?uc=admin&choix=verif" method="POST">
    <input class="form-control me-2" type="text" placeholder="Nom d'utilisateur" aria-label="Nom d'utilisateur" name="login">
    </br></br>
    <input class="form-control me-2" type="password" placeholder="Mot de passe" aria-label="Mot de passe" name="mdp">
    </br></br>
    <button class="btn btn-outline-success" type="submit">Connect</button>
</form>