<?php
// get password for connexion
function getPws($username){
    $usernm = htmlspecialchars($username);
    $req = 'SELECT `id_user`,`pswuser`
            FROM `user`
            WHERE `username` = "'.$usernm.'";';
    return array($req,$usernm);
}
//-------------------------
//
// get the role for the connexion
function verifRole($id){
    $req = 'SELECT `id_role`
            FROM `possede`
            WHERE id_user ='.$id.';';
    return $req;
}
//---------------------------
//
// setting role for a first connexion
function isInvite(){
    $req = 'INSERT INTO `possede`(`id_user`,`id_role`)
            VALUES(:ID,2)';
    return $req;
}
// --------------------------
//
//get info for setting the session
function sqlReqInfo($usname,$psw,$getCryptedPsw){
    define('GETUSERINFO','  SELECT `pswuser`, `username`, `cod_role`, `lib_role`
                            FROM `possede`
                            NATURAL JOIN `user`
                            NATURAL JOIN `role`
                            WHERE username = "'.$usname.'"
                            AND '.password_verify($psw,$getCryptedPsw).';');
    return GETUSERINFO; 
}
//---------------------------
//
function sqlInscr(){
    $req = 'INSERT INTO `user`(`username`,`nomuser`,`prenomuser`,`mailuser`,`pswuser`,`inscruser`)
            VALUES (:PSEUDO, :NOM, :PRENOM, :MAIL, :PSW, CURRENT_TIMESTAMP)';
    return $req;
}
//connexion for admin
function sqlAdm($usname,$mail){
    $req = 'SELECT `username`,`mailuser`,`pswuser`
            FROM `possede`
            NATURAL JOIN `user`
            NATURAL JOIN `role`
            WHERE `cod_role` = "ADM" 
            AND `username` = "'.$usname.'"
            AND `mailuser` = "'.$mail.'";';
    return $req;
}
// ---------------------
//
function getUserInfo($user){
    $req = 'SELECT `username`,`nomuser`,`prenomuser`,`mailuser`,`pswuser`,`teluser`,`inscruser`,`lib_role`,`nam_img`
            FROM `user`
            NATURAL JOIN `possede`
            NATURAL JOIN `role`
            NATURAL JOIN `images`
            WHERE username = "'.htmlspecialchars($user).'";';
    return $req;
}