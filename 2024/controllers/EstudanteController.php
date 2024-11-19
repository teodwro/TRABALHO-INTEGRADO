<?php

namespace Controller;

use Model\EstudanteModel;
use Model\VO\EstudanteVO;
use Model\CidadeModel;
use Model\VO\CidadeVO;

final class EstudanteController extends Controller {

    public function list() {
        $model = new EstudanteModel();
        $data = $model->selectAll(new EstudanteVO());

        $this->loadView("listaEstudantes", [
            "estudantes" => $data,
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new EstudanteModel();
            $vo = new EstudanteVO($id);
            $estudante = $model->selectOne($vo);
        } else {
            $estudante = new EstudanteVO();
        }

        $model = new CidadeModel();
        $data = $model->selectAll(new CidadeVO());

        $this->loadView("formEstudante", [
            "estudante" => $estudante,
            "cidades" => $data,
        ]);
    }

    public function save() {
        $id = $_POST["id"];

        print_r($_POST);

        $vo = new EstudanteVO($id, $_POST["nome_estudante"],$_POST["cpf"],$_POST["rg"],$_POST["email"],$_POST["endereco"],$_POST["cidade_id"],$_POST["telefone"], $_POST["matricula"],);
        $model = new EstudanteModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("estudantes.php");
    }

    public function remove() {
        $vo = new EstudanteVO($_GET["id"]);
        $model = new EstudanteModel();

        $result = $model->delete($vo);

        $this->redirect("cidades.php");
    }

}