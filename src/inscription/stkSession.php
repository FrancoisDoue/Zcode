<?php
function stkSession($array, $opt = true){
    if($opt){
        foreach(array_keys($array, true) as $info){
            if(!isset($_SESSION[$info])){
                if($info == 'ctrlPsw'){
                    $_SESSION[$info] = password_hash($array[$info],PASSWORD_BCRYPT);
                }else{
                    $_SESSION[$info] = $array[$info];
                }
            }
        }
    }else{
        unset($_SESSION['usname']);
        unset($_SESSION['nom']);
        unset($_SESSION['prenom']);
        unset($_SESSION['mail']);
    }
}