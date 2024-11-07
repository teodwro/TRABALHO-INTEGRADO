<?php

namespace Controller;

use Model\EstagioModel;
use Model\VO\EstagioVO;

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

        $this->loadView("formEstagio", [
            "estagio" => $estagio
        ]);
    }

    public function save() {

        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("estagio.php");
            exit;
        }

        $id = $_POST["id"];

        $vo = new EstagioVO($id, $_POST["nome"]);
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