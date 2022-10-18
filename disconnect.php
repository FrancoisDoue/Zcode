<?php
require('src/sessionCtrl.php');
function disconnect(){
    // foreach($_SESSION as $ses){
    //     unset($ses);
    // }
    session_unset();
    session_destroy();
    header('Location: index');
}
disconnect();