<?php
function switchPath(){
    $getURI = explode('/',explode('?',$_SERVER['PHP_SELF'])[0]);
    $getURI = end($getURI);
    $addHead = '';
    switch($getURI){
        case 'account.php':
            $addHead = '
            <script defer src="script/accueil.js"></script>
            <link rel="stylesheet" href="src\account\style\styleaccount.css">
            <title>Zcode - Accueil</title>
        ';
            break;
        case 'admintool.php':
            $addHead = '
                <link rel="stylesheet" href="css/inscr_connect.css">
                <link rel="stylesheet" href="css/admintool.css">
                <title>Zcode - Administration</title>
            ';
            break;
        case 'connexion.php':
            $addHead = '
                <script defer src="script/connect.js"></script>
                <link rel="stylesheet" href="css/inscr_connect.css">
                <title>Zcode - Connexion</title>
            ';
            break;
        case 'inscription.php':
            $addHead = '
                <script defer src="script/inscr.js"></script>
                <link rel="stylesheet" href="css/inscr_connect.css">
                <title>Zcode - Inscription</title>
            ';
            break;
        case 'index.php':
            $addHead = '
                <script defer src="script/accueil.js"></script>
                <title>Zcode - Accueil</title>
            ';
            break;
        default:
            $addHead = '
            <title>Document</title>
            ';
            break;
        }
    return $addHead;
}
