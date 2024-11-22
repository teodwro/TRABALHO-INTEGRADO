<?php

namespace Controller;

use Model\RepresentanteModel;
use Model\VO\RepresentanteVO;

final class RepresentanteController extends Controller {

    public function list() {
        $model = new RepresentanteModel();
        $data = $model->selectAll(new RepresentanteVO());

        $this->loadView("listaRepresentantes", [
            "representantes" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new RepresentanteModel();
            $vo = new RepresentanteVO($id);
            $representante = $model->selectOne($vo);
        } else {
            $representante = new RepresentanteVO();
        }

        $this->loadView("formRepresentante", [
            "representante" => $representante
        ]);
    }

    public function save() {
        $id_representante = $_POST["id_representante"];

        $vo = new RepresentanteVO($id_representante, $_POST["nome_representante"],$_POST["funcao_representante"], $_POST["cpf_representante"], $_POST["rg_representante"], $_POST["email_representante"]);
        $model = new RepresentanteModel();

        if(empty($id_representante)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("representantes.php");
    }

    public function remove() {
        $vo = new RepresentanteVO($_GET["id_representante"]);
        $model = new RepresentanteModel();

        $result = $model->delete($vo);

        $this->redirect("representantes.php");
    }

}