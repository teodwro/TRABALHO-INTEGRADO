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
        parent::__construct($id_estagio);
        $this->id_estudante = $id_estudante;
        $this->nome_estudante = $nome_estudante;
        $this->id_curso_estagio = $id_curso_estagio;
        $this->id_professor_orientador = $id_professor_orientador;
        $this->id_professor_coorientador = $id_professor_coorientador;
        $this->encaminhamentos_secoes_estagio = $encaminhamentos_secoes_estagio;
        $this->plano_atividades = $plano_atividades;
        $this->relatorio_final = $relatorio_final;
        $this->ficha_autoavaliacao = $ficha_autoavaliacao;
        $this->ficha_avaliacao_empresa = $ficha_avaliacao_empresa;
        $this->termo_compromisso = $termo_compromisso;
        $this->supervisor_empresa = $supervisor_empresa;
        $this->cargo_formacao_supervisor = $cargo_formacao_supervisor;
        $this->telefone_supervisor_empresa = $telefone_supervisor_empresa;
        $this->email_supervisor_empresa = $email_supervisor_empresa;
        $this->numero_convenio = $numero_convenio;
        $this->tipo_processo = $tipo_processo;
        $this->status_processo = $status_processo;
        $this->carga_horaria = $carga_horaria;
        $this->periodo_estagio_inicio = $periodo_estagio_inicio;
        $this->periodo_estagio_fim = $periodo_estagio_fim;
    } 

    public function getIdEstagio() {
        return $this->id_estagio;
    }

    public function setIdEstagio($id_estagio) {
        $this->id_estagio = $id_estagio;
    }

    public function getIdEstudante() {
        return $this->id_estudante;
    }

    public function setIdEstudante($id_estudante) {
        $this->id_estudante = $id_estudante;
    }

    public function getNomeEstudante() {
        return $this->nome_estudante;
    }

    public function setNomeEstudante($nome_estudante) {
        $this->nome_estudante = $nome_estudante;
    }

    public function getIdCursoEstagio() {
        return $this->id_curso_estagio;
    }

    public function setIdCursoEstagio($id_curso_estagio) {
        $this->id_curso_estagio = $id_curso_estagio;
    }

    public function getIdProfessorOrientador() {
        return $this->id_professor_orientador;
    }

    public function setIdProfessorOrientador($id_professor_orientador) {
        $this->id_professor_orientador = $id_professor_orientador;
    }

    public function getIdProfessorCoorientador() {
        return $this->id_professor_coorientador;
    }

    public function setIdProfessorCoorientador($id_professor_coorientador) {
        $this->id_professor_coorientador = $id_professor_coorientador;
    }

    public function getEncaminhamentosSecoesEstagio() {
        return $this->encaminhamentos_secoes_estagio;
    }

    public function setEncaminhamentosSecoesEstagio($encaminhamentos_secoes_estagio) {
        $this->encaminhamentos_secoes_estagio = $encaminhamentos_secoes_estagio;
    }

    public function getPlanoAtividades() {
        return $this->plano_atividades;
    }

    public function setPlanoAtividades($plano_atividades) {
        $this->plano_atividades = $plano_atividades;
    }

    public function getRelatorioFinal() {
        return $this->relatorio_final;
    }

    public function setRelatorioFinal($relatorio_final) {
        $this->relatorio_final = $relatorio_final;
    }

    public function getFichaAutoavaliacao() {
        return $this->ficha_autoavaliacao;
    }

    public function setFichaAutoavaliacao($ficha_autoavaliacao) {
        $this->ficha_autoavaliacao = $ficha_autoavaliacao;
    }

    public function getFichaAvaliacaoEmpresa() {
        return $this->ficha_avaliacao_empresa;
    }

    public function setFichaAvaliacaoEmpresa($ficha_avaliacao_empresa) {
        $this->ficha_avaliacao_empresa = $ficha_avaliacao_empresa;
    }

    public function getTermoCompromisso() {
        return $this->termo_compromisso;
    }

    public function setTermoCompromisso($termo_compromisso) {
        $this->termo_compromisso = $termo_compromisso;
    }

    public function getSupervisorEmpresa() {
        return $this->supervisor_empresa;
    }

    public function setSupervisorEmpresa($supervisor_empresa) {
        $this->supervisor_empresa = $supervisor_empresa;
    }

    public function getCargoFormacaoSupervisor() {
        return $this->cargo_formacao_supervisor;
    }

    public function setCargoFormacaoSupervisor($cargo_formacao_supervisor) {
        $this->cargo_formacao_supervisor = $cargo_formacao_supervisor;
    }

    public function getTelefoneSupervisorEmpresa() {
        return $this->telefone_supervisor_empresa;
    }

    public function setTelefoneSupervisorEmpresa($telefone_supervisor_empresa) {
        $this->telefone_supervisor_empresa = $telefone_supervisor_empresa;
    }

    public function getEmailSupervisorEmpresa() {
        return $this->email_supervisor_empresa;
    }

    public function setEmailSupervisorEmpresa($email_supervisor_empresa) {
        $this->email_supervisor_empresa = $email_supervisor_empresa;
    }

    public function getNumeroConvenio() {
        return $this->numero_convenio;
    }

    public function setNumeroConvenio($numero_convenio) {
        $this->numero_convenio = $numero_convenio;
    }

    public function getTipoProcesso() {
        return $this->tipo_processo;
    }

    public function setTipoProcesso($tipo_processo) {
        $this->tipo_processo = $tipo_processo;
    }

    public function getStatusProcesso() {
        return $this->status_processo;
    }

    public function setStatusProcesso($status_processo) {
        $this->status_processo = $status_processo;
    }

    public function getCargaHoraria() {
        return $this->carga_horaria;
    }

    public function setCargaHoraria($carga_horaria) {
        $this->carga_horaria = $carga_horaria;
    }

    public function getPeriodoEstagioInicio() {
        return $this->periodo_estagio_inicio;
    }

    public function setPeriodoEstagioInicio($periodo_estagio_inicio) {
        $this->periodo_estagio_inicio = $periodo_estagio_inicio;
    }

    public function getPeriodoEstagioFim() {
        return $this->periodo_estagio_fim;
    }

    public function setPeriodoEstagioFim($periodo_estagio_fim) {
        $this->periodo_estagio_fim = $periodo_estagio_fim;
    }

}