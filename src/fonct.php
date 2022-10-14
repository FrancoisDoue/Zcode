<?php
require('src/config.php');
function connectDb($param = 0,$requete = false){
    try{
        $connexion = new PDO('mysql:host='.DBHOST.':'.DBPORT.';dbname='.DBNAME.';charset=utf8',DBUSER,DBPWD);
        if($param != 0){
            if($param === 1){
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $result = $connexion -> query($requete);
                $datas = $result -> fetchAll(PDO::FETCH_OBJ);
                $connexion = null;
                return $datas;
            }else if($param === 2){
                $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $result = $connexion -> query($requete);
                $datas = $result -> fetch(PDO::FETCH_OBJ);
                $connexion = null;
                return $datas;
            }else if($param === 3){
                return $connexion;
                return true;
            }
        }else{
            $connexion = null;
            return true;
        }
    }
    catch(PDOException $error){
        echo 'n° '.$error->getCode().'<br/>';
        die ('Erreur : '.$error->getMessage().'<br/>');
        return false;
    }
}