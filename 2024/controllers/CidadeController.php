<?php

namespace Controller;

use Model\CidadeModel;
use Model\VO\CidadeVO;

final class CidadeController extends Controller {

    public function list() {
        $model = new CidadeModel();
        $data = $model->selectAll(new CidadeVO());

        $this->loadView("listaCidades", [
            "cidades" => $data
        ]);
    }

    public function form() {

        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("cidades.php");
            exit;
        }

        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new CidadeModel();
            $vo = new CidadeVO($id);
            $cidade = $model->selectOne($vo);
        } else {
            $cidade = new CidadeVO();
        }

        $this->loadView("formCidade", [
            "cidade" => $cidade
        ]);
    }

    public function save() {
        $id = $_POST["id"];

        $nomeArquivo = $this->uploadFile($_FILES["foto"]);

        $vo = new CidadeVO($id, $_POST["nome"]);
        $model = new CidadeModel();

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("cidades.php");
    }

    public function remove() {
        $vo = new CidadeVO($_GET["id"]);
        $model = new CidadeModel();

        $result = $model->delete($vo);

        $this->redirect("cidades.php");
    }

}