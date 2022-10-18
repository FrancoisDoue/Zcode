<?php
require('src/config.php');
require('src/switchPath.php');
require('src/sessionCtrl.php');
require('src/reqsql.php');
require('src/admintool/connectAdm.php');


require('templates/head.php');
// require('templates/navbar.php');
require('templates/mpages/mAdmintool.php');
require('templates/footer.php');

// if(!isset($_GET) OR count($_GET)===0){
//     header('Location: '.$_SERVER['REQUEST_URI'].'?login=admin');
//     var_dump('test');
// }else if(isset($_GET['login']) && $_GET['login']!=''){
    
// }

