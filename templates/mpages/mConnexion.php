<div class="fullbodydiv">
        <div class="bodydiv">

<div id="sideconnect">
    <p>
        <a href="index" class="simple-link">Retour à l'accueil</a>
    </p>
</div>
<?php
    if(isset($_SESSION['error_connect'])){
        $p = $_SESSION['error_connect'];
        unset($_SESSION['error_connect']);
    }else{
        $p = array('','','','');
    }
if(isset($_GET['connect'])){
    switch($_GET['connect']){
        case 1:?>
        <form id="formConnect" action="connexion?connect=2" method="post">
            <p>
                <?=$p[0]?>
                Vous n'êtes pas encore inscrit? <a href="inscription?inscr=1" class="simple-link">Inscription</a>
            </p>
            <div>
                <label for="usname">Pseudo :</label>
                <input class="<?= $p[3]?>" type="text" name="usname" value="<?= $p[1]?>">
            </div>
            <div>
                <label for="psw">Mot de passe :</label>
                <input class="<?= $p[3]?>" type="password" name="psw" value="<?= $p[2]?>">
            </div>
            <button class="btn" id="connexion" type="submit">Se connecter</button>
        </form>
<?php break;
        case 2 :

            if(simpleConnect(getPws($_POST['usname']))[0]){ 
                $arrayConnect = simpleConnect(getPws($_POST['usname']));
            ?>
                <div class="endconnect">
                    <h3>Vous êtes connecté</h3>
                    <p>Redirection vers l'accueil : <span id="redirCount"></span></p>
                </div><span></span>
            <?php
            ConnectAndPush($arrayConnect[1]->pswuser);
            unset($_POST);
            header('Refresh: 5; url=index');
            }else{
                $_SESSION['error_connect'] = array('<span class="red">Pseudo ou mot de passe incorrect</span><br><br>',$_POST['usname'],$_POST['psw'],'red');
                unset($_POST);
                
                header('Location: connexion?connect=1');
            }
            break;
    }
}
?>
        </div>
</div>