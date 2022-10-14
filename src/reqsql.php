<?php
function getPws($username){
    $usernm = htmlspecialchars($username);
    $req = 'SELECT `id_user`,`pswuser`
            FROM `user`
            WHERE `username` = "'.$usernm.'";';
    return array($req,$usernm);
}
function verifRole($id){
    $req = 'SELECT `id_role`
            FROM `possede`
            WHERE id_user ='.$id.';';
    return $req;
}
function isInvite(){
    $req = 'INSERT INTO `possede`(`id_user`,`id_role`)
            VALUES(:ID,2)';
    return $req;
}
function sqlReqInfo($usname,$psw,$getCryptedPsw){
    define('GETUSERINFO','  SELECT `pswuser`, `username`, `cod_role`, `lib_role`
                            FROM `possede`
                            NATURAL JOIN `user`
                            NATURAL JOIN `role`
                            WHERE username = "'.$usname.'"
                            AND '.password_verify($psw,$getCryptedPsw).';');
    return GETUSERINFO; 
}
function sqlInscr(){
    $req = 'INSERT INTO `user`(`username`,`nomuser`,`prenomuser`,`mailuser`,`pswuser`,`inscruser`)
            VALUES (:PSEUDO, :NOM, :PRENOM, :MAIL, :PSW, CURRENT_TIMESTAMP)';
    return $req;
}