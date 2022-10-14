<?php
// $navbar = true;
$cssLink = 'inscr_connect.css';
include_once('mod/head.php');

if(!isset($_GET) OR count($_GET)===0){
    header('Location: '.$_SERVER['REQUEST_URI'].'?login=admin');
    var_dump('test');
}else if(isset($_GET['login']) && $_GET['login']!=''){?>
<div id="sideconnect">
    <p>
        <a href="index" class="simple-link">Retour à l'accueil</a>
    </p>
</div>
<form id="formConnect" action="" method="post">
    <h3>Bienvenue, identifiez vous :</h3>
    <div>
        <label for="usname">Pseudo</label>
        <input type="text" name="usname">
    </div>
    <div>
        <label for="mail">Adresse Mail</label>
        <input type="mail" name="mail">
    </div>
    <div>
        <label for="psw">Mot de passe</label>
        <input type="text" name="psw">
    </div>
    <button type="button" id="connectAdm">CONNEXION ADMIN</button>
</form>
<?php
}
include_once('mod/footer.php');
?>