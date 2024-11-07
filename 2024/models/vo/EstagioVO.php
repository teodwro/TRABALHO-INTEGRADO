<?php

namespace Model\VO;

final class EstagioVO extends VO {

    private $id_estagio;
    private $id_estudante;
    private $nome_estudante;
    private $id_curso_estagio;
    private $id_professor_orientador;
    private $id_professor_coorientador;
    private $encaminhamentos_secoes_estagio;
    private $plano_atividades;
    private $relatorio_final;
    private $ficha_autoavaliacao;
    private $ficha_avaliacao_empresa;
    private $termo_compromisso;
    private $supervisor_empresa;
    private $cargo_formacao_supervisor;
    private $telefone_supervisor_empresa;
    private $email_supervisor_empresa;
    private $numero_convenio;
    private $tipo_processo;
    private $status_processo;
    private $carga_horaria;
    private $periodo_estagio_inicio;
    private $periodo_estagio_fim;


    public function __construct($id_estagio = 0,$id_estudante = 0, $nome_estudante = "", $id_curso_estagio = 0, $id_professor_orientador = 0, $id_professor_coorientador = 0, $encaminhamentos_secoes_estagio = "", $plano_atividades = "", $relatorio_final = "", $ficha_autoavaliacao = "",$ficha_avaliacao_empresa = "", $termo_compromisso = "",$supervisor_empresa = "",$cargo_formacao_supervisor = "",$telefone_supervisor_empresa = "",$email_supervisor_empresa = "",$numero_convenio = "",$tipo_processo = "",$status_processo = "",$carga_horaria = 0,$periodo_estagio_inicio = NULL,$periodo_estagio_fim = NULL,) {
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