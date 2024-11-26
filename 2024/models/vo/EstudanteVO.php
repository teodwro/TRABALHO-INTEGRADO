<?php

namespace Model\VO;

final class EstudanteVO extends VO {

    private $nome_estudante;
    private $cpf;
    private $rg;
    private $email;
    private $endereco;
    private $cidade_id;
    private $cidade;
    private $telefone;
    private $matricula;


    public function __construct($id = 0, $nome_estudante = "", $cpf = "", $rg = "", $email = "", $endereco = "", $cidade_id = 0, $telefone = "", $matricula = "",$cidade = "") {
        parent::__construct($id);
        $this->nome_estudante = $nome_estudante;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->email = $email;
        $this->endereco = $endereco;
        $this->cidade_id = $cidade_id;
        $this->telefone = $telefone;
        $this->matricula = $matricula;
        $this->cidade = $cidade;
    }

    public function getNomeEstudante() {
        return $this->nome_estudante;
    }

    public function setNomeEstudante($nome_estudante) {
        $this->nome = $nome_estudante;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getRg(){
        return $this->rg;
    }

    public function setRg($rg){
        $this->rg = $rg;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEndereco(){
        return $this->endereco;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    public function getCidadeId(){
        return $this->cidade_id;
    }

    public function setCidadeId($cidade_id){
        $this->cidade_id = $cidade_id;
    }

    public function getCidade(){
        return $this->cidade;
    }

    public function setCidade($cidade){
        $this->cidade = $cidade;
    }

    public function getTelefone(){
        return $this->telefone;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getMatricula(){
        return $this->matricula;
    }

    public function setMatricula($matricula){
        $this->matricula = $matricula;
    }

}