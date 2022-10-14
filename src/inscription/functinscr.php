<?php
function inscription($req){
    $datas = connectDb(3);
    $req = $datas->prepare($req);

    $req -> bindParam('PSEUDO', $_SESSION['usname'],    PDO::PARAM_STR);
    $req -> bindParam('NOM',    $_SESSION['nom'],       PDO::PARAM_STR);
    $req -> bindParam('PRENOM', $_SESSION['prenom'],    PDO::PARAM_STR);
    $req -> bindParam('MAIL',   $_SESSION['mail'],      PDO::PARAM_STR);
    $req -> bindParam('PSW',    $_SESSION['ctrlPsw'],   PDO::PARAM_STR);
    
    $req -> execute();
    $datas = null;
}