<?php

namespace Controller;

use Model\EstagioModel;
use Model\VO\EstagioVO;
use Model\EstudanteModel;
use Model\VO\EstudanteVO;
use Model\CursoModel;
use Model\VO\CursoVO;
use Model\ProfessorModel;
use Model\VO\ProfessorVO;
use Model\EmpresaModel;
use Model\VO\EmpresaVO;

final class EstagioController extends Controller {

    public function list() {
        $model = new EstagioModel();
        $data = $model->selectAll(new EstagioVO());

        $this->loadView("listaEstagios", [
            "estagios" => $data
        ]);
    }

    public function form() {

        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("estagios.php");
            exit;
        }

        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new EstagioModel();
            $vo = new EstagioVO($id);
            $estagio = $model->selectOne($vo);
        } else {
            $estagio = new EstagioVO();
        }
        
        $model_estudante = new EstudanteModel();
        $data_estudante = $model_estudante->selectAll(new EstudanteVO());
        $model_curso = new CursoModel();
        $data_curso = $model_curso->selectAll(new CursoVO());
        $model_professor = new ProfessorModel();
        $data_professor = $model_professor->selectAll(new ProfessorVO());
        $model_empresa = new EmpresaModel();
        $data_empresa = $model_empresa->selectAll(new EmpresaVO());

        $this->loadView("formEstagio", [
            "estagio" => $estagio,
            "estudantes" => $data_estudante,
            "cursos" => $data_curso,
            "professores" => $data_professor,
            "empresas" => $data_empresa,

        ]);
    }

    public function save() {

        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("estagio.php");
            exit;
        }

        $id = $_POST["id"];

        $planoAtividades = isset($_FILES["plano_atividades"]) ? $this->uploadFile($_FILES["plano_atividades"]) : null;
        $relatorioFinal = isset($_FILES["relatorio_final"]) ? $this->uploadFile($_FILES["relatorio_final"]) : null;
        $fichaAutoavaliacao = isset($_FILES["ficha_autoavaliacao"]) ? $this->uploadFile($_FILES["ficha_autoavaliacao"]) : null;
        $fichaAvaliacaoEmpresa = isset($_FILES["ficha_avaliacao_empresa"]) ? $this->uploadFile($_FILES["ficha_avaliacao_empresa"]) : null;
        $termoCompromisso = isset($_FILES["termo_compromisso"]) ? $this->uploadFile($_FILES["termo_compromisso"]) : null;
        

        $vo = new EstagioVO($id, $_POST["estudante_estagio"], $_POST["curso_estagio"], $_POST["professor_orientador"], $_POST["professor_coorientador"], $_POST["empresa_estagio"], $_POST["encaminhamentos_estagio"], $planoAtividades, $relatorioFinal, $fichaAutoavaliacao, $fichaAvaliacaoEmpresa, $termoCompromisso, $_POST["supervisor_empresa"], $_POST["cargo_formacao_supervisor"], $_POST["telefone_supervisor_empresa"], $_POST["email_supervisor_empresa"], $_POST["numero_convenio"], $_POST["tipo_processo"], $_POST["status_processo"], $_POST["carga_horaria"], $_POST["periodo_estagio_inicio"], $_POST["periodo_estagio_fim"]);

        $model = new EstagioModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("estagios.php");
    }

    public function remove() {
        
        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("estagios.php");
            exit;
        }

        $vo = new EstagioVO($_GET["id"]);
        $model = new EstagioModel();

        $result = $model->delete($vo);

        $this->redirect("estagios.php");
    }

}