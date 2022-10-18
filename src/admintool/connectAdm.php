<?php
function connectAdm($usname,$mail,$psw){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);
    $req = sprintf(
        sqlAdm(htmlspecialchars($usname),htmlspecialchars($mail)),
        mysqli_real_escape_string($mysqli,$usname),
        mysqli_real_escape_string($mysqli,$mail)
    );
    $connectDB = mysqli_query($mysqli,$req);
    $connectDB = $connectDB->fetch_object();
    mysqli_close($mysqli);
    if(!is_null($connectDB)){
        $bool = password_verify($psw,$connectDB->pswuser);
        return array($bool,$connectDB->pswuser);
    }else{
        return array(false);
    }
}