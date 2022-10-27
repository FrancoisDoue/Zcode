<?php
if(!($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['profile']))){
    if($connected){
        $header = 'Refresh:0; url= account?profile='.$_SESSION['user'];
        var_dump($header);
        header($header);
    }else{
        
    }
}else{
    loadProfile();
}
function loadProfile(){
?>
    <div class="bodydiv">
        <div id="asideProfile">
            <div id="imgPro">
                <img src="" alt="image de profil">
            </div>
            <div id="linksPro">
                <ul>

                </ul>
            </div>
        </div>
        <div id="mainProfile">
            <div id="infoPro">
                <h2>Nom Profil</h2><span id="editProfile"></span>
                <ul>

                </ul>
            </div>
            <div id="histoPro">

            </div>
        </div>
    </div>
</div>
<?php
}
function unloadProfile(){
?>
<div class="fullbodydiv">
    <div class="bodydiv">
        <h2>Vous ne pouvez pas consulter un profil sans être connecté</h2>
    </div>
</div>
<?php
}
?>