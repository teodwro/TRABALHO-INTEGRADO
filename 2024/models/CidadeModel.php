<?php

namespace Model;

use Model\VO\CidadeVO;

final class CidadeModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM cidades";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new CidadeVO($row["id"], $row["nome"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM cidades WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new CidadeVO($data[0]["id"], $data[0]["nome"]);
    }

    public function insert($vo) {
        $db = new Database();

        $query = "INSERT INTO cidades (nome) VALUES (:nome)";
        $binds = [
            ":nome" => $vo->getNome(),
        ];
        
        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();

        $query = "UPDATE cidades SET nome = :nome WHERE id = :id";
        $binds = [
            ":nome" => $vo->getNome(),
            ":id" => $vo->getId(),
        ];
       

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM cidades WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}