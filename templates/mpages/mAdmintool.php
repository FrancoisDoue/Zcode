<div class="fullbodydiv">
    <div class="bodydiv">
        <?php
        if(isset($_GET['admin']) && $_GET['admin'] === 'connect'){
            if(connectAdm($_POST['usname'],$_POST['mail'],$_POST['psw'])[0]){
                $getKey = connectAdm($_POST['usname'],$_POST['mail'],$_POST['psw'])[1];
                $_SESSION['pswAdmin'] = $_POST['psw'];
                header('Location: admintool?admin='.$getKey.'&tool=1');
            }else{
                header('Location: admintool');
            }
        }else if(!isset($_GET['admin'])){
        ?>
        <div id="sideconnect">
            <p>
                <a href="index" class="simple-link">Retour à l'accueil</a>
            </p>
        </div>
        <form id="formConnect" action="admintool?admin=connect" method="post">
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
                <input type="password" name="psw">
            </div>
            <button type="submit" id="connectAdm">CONNEXION ADMIN</button>
        </form>

<?php   }else{
            if(password_verify($_SESSION['pswAdmin'],$_GET['admin'])){
?>
                <div id="sideAdm">
                    <ul>
                        <li><a href="<?=explode('&',$_SERVER['REQUEST_URI'])[0].'&tool=1'?>">Gestion des droits</a></li>
                        <li><a href="<?=explode('&',$_SERVER['REQUEST_URI'])[0].'&tool=2'?>">Requêtes</a></li>
                        <li><a href="<?=explode('&',$_SERVER['REQUEST_URI'])[0].'&tool=3'?>">Signalements</a></li>
                        <li><a href="<?=explode('&',$_SERVER['REQUEST_URI'])[0].'&tool=4'?>">Gestion des projets</a></li>
                        <li><a href="disconnect">Déconnexion</a></li>
                    </ul>
                </div>
                <?php
                switch($_GET['tool']){
                    case 1 :
                        // var_dump($_SERVER['REQUEST_URI']);
                        break;
                    case 2 :
                        // var_dump($_SERVER['REQUEST_URI']);
                        break;
                    case 3 :
                        // var_dump($_SERVER['REQUEST_URI']);
                        break;
                    case 4 :
                        // var_dump($_SERVER['REQUEST_URI']);
                        break;
                    default :
                        var_dump('Outils en développement');
                        break;
                }
            }else{
                header('Location: admintool');
            }
        }?>
    </div>
</div>