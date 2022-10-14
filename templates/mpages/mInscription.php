<div class="fullbodydiv">
        <div class="bodydiv">

<div id="sideconnect">
    <p>
        <a href="index" class="simple-link">Retour à l'accueil</a>
    </p>
</div>
<?php 
if(isset($_GET['inscr'])){
    switch($_GET['inscr']){
        case 1: 
?>
    <form id="formInscr" action="<?= $_SERVER['PHP_SELF'].'?inscr=2' ?>" method="post">
        <p>
            Vous possédez déjà un compte? <a href="connexion?connect=1" class="simple-link">Connexion</a>
        </p>
        <div>
            <label for="usname">Pseudo <span>*</span></label>
            <input type="text" name="usname">
        </div>
        <div>
            <label for="nom">Nom <span>*</span></label>
            <input type="text" name="nom">
        </div>
        <div>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom">
        </div>
        <button class="btn" id="nextInscr" type="button">Suivant</button>
    </form>
<?php       break;
        case 2: 
    stkSession($_POST);
?>
    <form id="formInscr" action="<?= $_SERVER['PHP_SELF'].'?inscr=3' ?>" method="post">
        <div>
            <label for="mail">Adresse Email</label>
            <input type="mail" name="mail">
        </div>
        <div>
            <label for="psw">Mot de passe</label>
            <input type="password" name="psw">
        </div>
        <div>
            <label for="ctrlPsw">Confirmer mot de passe</label>
            <input type="password" name="ctrlPsw">
        </div>
        <button class="btn" id="endInscr" type="button">S'inscrire</button>
    </form>
<?php       break;
        case 3:
        stkSession($_POST);
        echo '<h3>Vous êtes bien inscrit</h3>';
        inscription(sqlInscr());
        stkSession($_POST,false);
        break;
    }
}?>
    </div>
</div>