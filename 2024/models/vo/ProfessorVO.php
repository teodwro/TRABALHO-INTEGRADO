<?php

namespace Model\VO;

final class ProfessorVO extends VO {

    private $nome_professor;
    private $email_professor;

    public function __construct($id = 0, $nome_professor = "", $email_professor = "") {
        parent::__construct($id);
        $this->nome_professor = $nome_professor;
        $this->email_professor = $email_professor;
    }

    public function getNomeProfessor() {
        return $this->nome_professor;
    }

    public function setNomeProfessor($nome_professor) {
        $this->nome_professor = $nome_professor;
    }
    
    public function getEmailProfessor() {
        return $this->email_professor;
    }
    public function setEmailProfessor($email_professor) {
        $this->email_professor = $email_professor;
    }
}