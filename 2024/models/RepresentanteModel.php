<?php

namespace Model;

use Model\VO\RepresentanteVO;
use Model\Database;

final class RepresentanteModel extends Model {
    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT id_representante, nome_representante, funcao_representante, cpf_representante, rg_representante, email_representante
                  FROM representantes";
        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new RepresentanteVO($row['id_representante'], $row['nome_representante'], $row['funcao_representante'], $row['cpf_representante'], $row['rg_representante'], $row['email_representante']);
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT id_representante, nome_representante, funcao_representante, cpf_representante, rg_representante, email_representante
                  FROM representantes
                  WHERE id_representante = :id";
        $binds = [':id' => $vo->getId()];

        $data = $db->select($query, $binds);

        return new RepresentanteVO($data[0]['id_representante'], $data[0]['nome_representante'], $data[0]['funcao_representante'], $data[0]['cpf_representante'], $data[0]['rg_representante'], $data[0]['email_representante']);
    }

    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO representantes (nome_representante, funcao_representante, cpf_representante, rg_representante, email_representante)
                  VALUES (:nome_representante, :funcao_representante, :cpf_representante, :rg_representante, :email_representante)";
        $binds = [
            ":nome_representante" => $vo->getNomeRepresentante(),
            ":funcao_representante" => $vo->getFuncaoRepresentante(),
            ":cpf_representante" => $vo->getCpfRepresentante(),
            ":rg_representante" => $vo->getRgRepresentante(),
            ":email_representante" => $vo->getEmailRepresentante(),
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();
        $query = "UPDATE representantes 
                  SET nome_representante = :nome_representante, funcao_representante = :funcao_representante, cpf_representante = :cpf_representante, rg_representante = :rg_representante, email_representante = :email_representante
                  WHERE id_representante = :id";
        $binds = [
            ":nome_representante" => $vo->getNomeRepresentante(),
            ":funcao_representante" => $vo->getFuncaoRepresentante(),
            ":cpf_representante" => $vo->getCpfRepresentante(),
            ":rg_representante" => $vo->getRgRepresentante(),
            ":email_representante" => $vo->getEmailRepresentante(),
            ":id" => $vo->getIdRepresentante(),
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM representantes WHERE id_representante = :id_representante";
        $binds = [":id_representante" => $vo->getIdRepresentante()];

        return $db->execute($query, $binds);
    }
}
