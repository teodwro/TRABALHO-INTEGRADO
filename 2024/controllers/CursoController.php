<?php

namespace Controller;

use Model\CursoModel;
use Model\VO\CursoVO;

final class CursoController extends Controller {

    public function list() {
        $model = new CursoModel();
        $data = $model->selectAll(new CursoVO());

        $this->loadView("listaCursos", [
            "cursos" => $data
        ]);
    }

    public function form() {

        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("cursos.php");
            exit;
        }

        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new CursoModel();
            $vo = new CursoVO($id);
            $curso = $model->selectOne($vo);
        } else {
            $curso = new CursoVO();
        }

        $this->loadView("formCurso", [
            "curso" => $curso
        ]);
    }

    public function save() {

        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("cursos.php");
            exit;
        }

        $id = $_POST["id"];

        $vo = new CursoVO($id, $_POST["nome_curso"], $_POST["professor_curso"]);
        $model = new CursoModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("cursos.php");
    }

    public function remove() {
        
        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("cursos.php");
            exit;
        }

        $vo = new CursoVO($_GET["id"]);
        $model = new CursoModel();

        $result = $model->delete($vo);

        $this->redirect("cursos.php");
    }

}