<?php

namespace Controller;

use Model\ProfessorModel;
use Model\VO\ProfessorVO;

final class ProfessorController extends Controller {

    public function list() {
        $model = new ProfessorModel();
        $data = $model->selectAll(new professorVO());

        $this->loadView("listaProfessores", [
            "professores" => $data
        ]);
    }

    public function form() {

        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("professores.php");
            exit;
        }

        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new professorModel();
            $vo = new professorVO($id);
            $professor = $model->selectOne($vo);
        } else {
            $professor = new professorVO();
        }

        $this->loadView("formProfessor", [
            "professor" => $professor
        ]);
    }

    public function save() {

        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("professores.php");
            exit;
        }

        $id = $_POST["id"];

        $vo = new professorVO($id, $_POST["nome_professor"], $_POST["email_professor"]);
        $model = new professorModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("professores.php");
    }

    public function remove() {
        
        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("professores.php");
            exit;
        }

        $vo = new professorVO($_GET["id"]);
        $model = new professorModel();

        $result = $model->delete($vo);

        $this->redirect("professores.php");
    }

}