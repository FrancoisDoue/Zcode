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
                function mainTool(){
                    $maintool = '<div id="maintool">a</div>';
                    return $maintool;
                }
                function showTool($method){ 
                    $tabTool = array('Gestion des droits','Requêtes','Signalements','Gestion des projets');
                    $sideBar = '';
                    $cpt = 1;
                    foreach($tabTool as $li){
                        if($cpt == $method){
                            $class = 'selectedTool';
                        }else{
                            $class = '';
                        }
                        $sideBar.= '<li><a class="'.$class.'" href="'.explode('&',$_SERVER['REQUEST_URI'])[0].'&tool='.$cpt.'">'.$li.'</a></li>';
                        $cpt++;
                    }
                    $sideBar .= '<li><a href="disconnect">Déconnexion</a></li>';
                    $sideBar = '<div id="sideAdm"><ul>'.$sideBar.'</ul></div>';
                    switch($method){
                        case 1 :
                            // var_dump($_SERVER['REQUEST_URI']);
                            $tool = mainTool();
                            break;
                        case 2 :
                            // var_dump($_SERVER['REQUEST_URI']);
                            $tool = mainTool();
                            break;
                        case 3 :
                            // var_dump($_SERVER['REQUEST_URI']);
                            $tool = mainTool();
                            break;
                        case 4 :
                            // var_dump($_SERVER['REQUEST_URI']);
                            $tool = mainTool();
                            break;
                        default :
                            // var_dump('Outils en développement');
                            break;
                    }
                    echo $sideBar;
                    echo $tool;
                }
?>
                <?php
                    if(isset($_GET['tool'])){
                        showTool($_GET['tool']);
                    }else{
                        header('Location: admintool?admin='.$getKey.'&tool=1');
                    }

            }else{
                header('Location: admintool');
            }
        }?>
    </div>
</div>