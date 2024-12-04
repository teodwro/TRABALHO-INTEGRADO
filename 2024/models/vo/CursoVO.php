<?php

namespace Model\VO;

final class CursoVO extends VO {

    private $nome_curso;
    private $professor_curso;

    public function __construct($id = 0, $nome_curso = "", $professor_curso = "") {
        parent::__construct($id);
        $this->nome_curso = $nome_curso;
        $this->professor_curso = $professor_curso;
    }

    public function getNomeCurso() {
        return $this->nome_curso;
    }

    public function setNomeCurso($nome_curso) {
        $this->nome_curso = $nome_curso;
    }
 
    public function getProfessorCurso() {
        return $this->nome_curso;
    }

    public function setProfessorCurso($professor_curso) {
        $this->professor_curso = $professor_curso;
    }
}