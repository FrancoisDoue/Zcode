<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <?=switchPath()?>
</head>
<body>
    <div id="mainContainer">
        <div class="fullheaderdiv">
            <div class="headerdiv">
                <header>
                    <?php 
                    $currentPage = explode('/',$_SERVER['PHP_SELF']);
                    if(end($currentPage) != 'index.php'){
                    ?>
                    <div class="imglogo">
                        <a href="index">
                            <img src="assets/imgsite/temp_logo_1_white.png" alt="zcode">
                        </a>
                    </div>
                    <?php 
                    }else{
                    ?>
                    <div class="imglogo">
                        <img src="assets/imgsite/temp_logo_1_white.png" alt="zcode">
                    </div>
                    <?php
                    }
                    if(end($currentPage) != 'inscription.php' && end($currentPage) != 'connexion.php'){ ?>
                        <form id="formsearch" action="" method="get">
                            <input type="text" name="search" id="seachbar">
                        </form>
                    <?php } ?>
                </header>
            </div>
        </div>
                <?php
                if(isset($connected) && $connected && end($currentPage) != 'admintool.php' && end($currentPage) != 'connexion.php'){
                    ?>
                <div id="connected">
                    <ul>
                        <li><a href="account?profile=<?=$_SESSION['user']?>">Mon compte</a> </li>
                        <li><a href="">Mes posts</a> </li>
                        <li><a href="">test</a> </li>
                        <li><a href="disconnect">Déconnexion</a></li>
                    </ul>
                </div>
                <?php } ?>
