<?php 
session_start();
if(isset($_SESSION) && isset($_SESSION['user']) && isset($_SESSION['psw']) && isset($_SESSION['cod']) &&isset($_SESSION['rol'])){
    if($_SESSION['rol'] === 'ADMIN' && $_SESSION['cod'] === 'ADM'){
        $nav4 = '<li class="green"><a href="admintool">ADMINISTRATION</a></li>';
    }else{
        $nav4 = '<li></li>';
    }
    $nav5 = '<li id="userButton">'.$_SESSION['user'].' : '.ucwords(strtolower($_SESSION['rol'])).'</li>';
    $connected = true;
}else{
    $nav4 = '<li><a href="inscription?inscr=1">INSCRIPTION</a></li>';
    $nav5 = '<li><a href="connexion?connect=1">CONNEXION</a></li>';
}