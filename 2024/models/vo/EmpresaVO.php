<?php

namespace Model\VO;

final class EmpresaVO extends VO {

    private $nome_empresa;
    private $endereco_empresa;
    private $telefone_empresa;
    private $email_empresa;
    private $cnpj_empresa;
    private $representante_empresa;
    private $cidade_empresa;

    public function __construct($id = 0, $nome_empresa = "", $endereco_empresa = "", $telefone_empresa = "", $email_empresa = "", $cnpj_empresa = "", $representante_empresa = "", $cidade_empresa="") {
        parent::__construct($id);
        $this->nome_empresa = $nome_empresa;
        $this->endereco_empresa = $endereco_empresa;
        $this->telefone_empresa = $telefone_empresa;
        $this->email_empresa = $email_empresa;
        $this->cnpj_empresa = $cnpj_empresa;
        $this->representante_empresa = $representante_empresa;
        $this->cidade_empresa = $cidade_empresa;
    }

    public function getNomeEmpresa() {
        return $this->nome_empresa;
    }

    public function setNomeEmpresa($nome_empresa) {
        $this->nome_empresa = $nome_empresa;
    }

    public function getEnderecoEmpresa() {
        return $this->endereco_empresa;
    }

    public function setEnderecoEmpresa($endereco_empresa) {
        $this->endereco_empresa = $endereco_empresa;
    }

    public function getTelefoneEmpresa() {
        return $this->telefone_empresa;
    }

    public function setTelefoneEmpresa($telefone_empresa) {
        $this->telefone_empresa = $telefone_empresa;
    }

    public function getEmailEmpresa() {
        return $this->email_empresa;
    }

    public function setEmailEmpresa($email_empresa) {
        $this->email_empresa = $email_empresa;
    }

    public function getCnpjEmpresa() {
        return $this->cnpj_empresa;
    }

    public function setCnpjEmpresa($cnpj_empresa) {
        $this->cnpj_empresa = $cnpj_empresa;
    }

    public function getRepresentanteEmpresa() {
        return $this->representante_empresa;
    }

    public function setRepresentanteEmpresa($representante_empresa) {
        $this->representante_empresa = $representante_empresa;
    }

    public function getCidadeEmpresa() {
        return $this->cidade_empresa;
    }

    public function setCidadeEmpresa($cidade_empresa) {
        $this->cidade_empresa = $cidade_empresa;
    }
}