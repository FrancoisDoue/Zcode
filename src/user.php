<?php
class User{
    public string $user_name;
    public string $crypt_psw;
    public string $cod_role;
    public string $role;
    public function __construct($u,$p,$c,$r)
    {
        $this->user_name = $u;
        $this->crypt_psw = $p;
        $this->cod_role = $c;
        $this->role = $r;
    }
}