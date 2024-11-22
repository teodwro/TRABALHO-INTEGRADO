<?php

namespace Model\VO;

final class RepresentanteVO extends VO {

    private $id_representante;
    private $nome_representante;
    private $funcao_representante;
    private $cpf_representante;
    private $rg_representante;
    private $email_representante;

    public function __construct($id_representante = 0, $nome_representante = "", $funcao_representante = "", $cpf_representante = "", $rg_representante = "", $email_representante = "") {
        parent::__construct($id_representante);
        $this->nome_representante = $nome_representante;
        $this->funcao_representante = $funcao_representante;
        $this->cpf_representante = $cpf_representante;
        $this->rg_representante = $rg_representante;
        $this->email_representante = $email_representante;
    }

    public function getIdRepresentante() {
        return $this->id_representante;
    }

    public function setIdRepresentante($id_representante) {
        $this->id_representante = $id_representante;
    }

    public function getNomeRepresentante() {
        return $this->nome_representante;
    }

    public function setNomeRepresentante($nome_representante) {
        $this->nome_representante = $nome_representante;
    }

    public function getFuncaoRepresentante() {
        return $this->funcao_representante;
    }

    public function setFuncaoRepresentante($funcao_representante) {
        $this->funcao_representante = $funcao_representante;
    }

    public function getCpfRepresentante() {
        return $this->cpf_representante;
    }

    public function setCpfRepresentante($cpf_representante) {
        $this->cpf_representante = $cpf_representante;
    }

    public function getRgRepresentante() {
        return $this->rg_representante;
    }

    public function setRgRepresentante($rg_representante) {
        $this->rg_representante = $rg_representante;
    }

    public function getEmailRepresentante() {
        return $this->email_representante;
    }

    public function setEmailRepresentante($email_representante) {
        $this->email_representante = $email_representante;
    }
}
