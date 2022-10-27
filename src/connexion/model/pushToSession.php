<?php
function ConnectAndPush($psw){
    $info = connectDb(2, sqlReqInfo($_POST['usname'], $_POST['psw'], $psw));
    $_SESSION['user'] = $info->username;
    $_SESSION['psw'] = $info->pswuser;
    $_SESSION['cod'] = $info->cod_role;
    $_SESSION['rol'] = $info->lib_role;
}
