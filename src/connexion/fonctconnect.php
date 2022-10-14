<?php
function simpleConnect($request){
    $username = $request[1];
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect('localhost','root','root','forum');
    $req = sprintf($request[0],mysqli_real_escape_string($mysqli,$username));
    $connectDB = mysqli_query($mysqli,$req);
    $connectDB = $connectDB->fetch_object();
    $verifPsw = password_verify($_POST['psw'],$connectDB->pswuser);
    if($verifPsw){
        mysqli_close($mysqli);
        $verifRole = connectDb(2, verifRole($connectDB->id_user));
        if($verifRole){
            return array($verifPsw,$connectDB);
        }else{
            // attribute role
            $insert = connectDb(3);
            $reqInsert = $insert->prepare(isInvite());
            $reqInsert -> bindParam('ID', $connectDB->id_user, PDO::PARAM_INT);
            $reqInsert -> execute();
            $insert = null;
            
            simpleConnect($request);
        }
    }else{
        return array($verifPsw);
    }
}