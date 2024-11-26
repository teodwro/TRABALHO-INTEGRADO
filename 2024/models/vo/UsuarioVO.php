<?php

namespace Model\VO;

final class UsuarioVO extends VO {
    private $login;
    private $senha;
    private $nivel;
    
    public function __construct($id = 0, $login = "", $senha = "", $nivel = 1){
        parent::__construct($id);
        $this->login = $login;
        $this->senha = $senha;
        $this->nivel = $nivel;
    }

    public function getLogin(){
        return $this->login;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getNivel() {
        return $this->nivel;
    }
    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }
}
