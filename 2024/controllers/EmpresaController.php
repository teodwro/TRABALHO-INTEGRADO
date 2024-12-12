<?php

namespace Controller;

use Model\EmpresaModel;
use Model\VO\EmpresaVO;
use Model\RepresentanteModel;
use Model\VO\RepresentanteVO;
use Model\CidadeModel;
use Model\VO\CidadeVO;

final class EmpresaController extends Controller {

    public function list() {
        $model = new EmpresaModel();
        $data = $model->selectAll(new EmpresaVO());

        $this->loadView("listaEmpresas", [
            "empresas" => $data
        ]);
    }

    public function form() {

        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("empresas.php");
            exit;
        }

        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new EmpresaModel();
            $vo = new EmpresaVO($id);
            $empresa = $model->selectOne($vo);
        } else {
            $empresa = new EmpresaVO();
        }

        $model = new RepresentanteModel();
        $data = $model->selectAll(new RepresentanteVO());

        $model_cidade = new CidadeModel();
        $data_cidade = $model_cidade->selectAll(new CidadeVO());

        $this->loadView("formEmpresa", [
            "empresa" => $empresa,
            "representantes" => $data,
            "cidades" => $data_cidade,
        ]);
    }

    public function save() {

        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("empresas.php");
            exit;
        }

        $id_empresa = $_POST["id_empresa"];

        $vo = new EmpresaVO($id_empresa, $_POST["nome_empresa"], $_POST["endereco_empresa"], $_POST["telefone_empresa"], $_POST["email_empresa"], $_POST["cnpj_empresa"], $_POST["representante_empresa"], $_POST["cidade_empresa"]);
        $model = new EmpresaModel();

        if(empty($id_empresa)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("empresas.php");
    }

    public function remove() {

        if($_SESSION["usuario"]->getNivel() == 1) {
            $this->redirect("empresas.php");
            exit;
        }
        
        $vo = new EmpresaVO($_GET["id"]);
        $model = new EmpresaModel();

        $result = $model->delete($vo);

        $this->redirect("empresas.php");
    }

}