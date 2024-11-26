<?php

namespace Model;

use Model\VO\EstudanteVO;

final class EstudanteModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT 
        e.id AS estudante_id,
        e.nome_estudante,
        e.cpf,
        e.rg,
        e.email,
        e.endereco,
        c.nome AS cidade_nome,
        e.telefone,
        e.matricula
    FROM estudantes e
    JOIN cidades c ON e.cidade_id = c.id;
    ";
        
        $data = $db->select($query);
        $arrayDados = [];

        foreach($data as $row) {
            $vo = new EstudanteVO($row["estudante_id"], $row["nome_estudante"], $row["cpf"], $row["rg"],$row["email"],$row["endereco"],$row["cidade_nome"],$row["telefone"],$row["matricula"] );
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM estudantes WHERE id = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new EstudanteVO($data[0]["id"], $data[0]["nome_estudante"], $data[0]["cpf"],$data[0]["rg"],$data[0]["email"],$data[0]["endereco"],$data[0]["cidade_id"],$data[0]["telefone"],$data[0]["matricula"],);
    }

    public function insert($vo) {
        $db = new Database();

        $query = "INSERT INTO estudantes (nome_estudante, cpf, rg, email, endereco, cidade_id, telefone, matricula)
        VALUES (:nome_estudante, :cpf, :rg, :email, :endereco, :cidade_id, :telefone, :matricula) ";
        $binds = [
            ":nome_estudante" => $vo->getNomeEstudante(),
            "cpf" => $vo->getCpf(),
            "rg" => $vo->getRg(),
            "email" => $vo->getEmail(),
            "endereco" => $vo->getEndereco(),
            "cidade_id" => $vo->getCidadeId(),
            "telefone" => $vo->getTelefone(),
            "matricula" => $vo->getMatricula(),
        ];
        
        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();

        $query = "UPDATE estudantes
        SET 
            nome_estudante = :nome_estudante,
            cpf = :cpf,
            rg = :rg,
            email = :email,
            endereco = :endereco,
            cidade_id = :cidade_id,
            telefone = :telefone,
            matricula = :matricula
        WHERE id = :id ";
        $binds = [
            ":id" => $vo->getId(),
            ":nome_estudante" => $vo->getNomeEstudante(),
            "cpf" => $vo->getCpf(),
            "rg" => $vo->getRg(),
            "email" => $vo->getEmail(),
            "endereco" => $vo->getEndereco(),
            "cidade_id" => $vo->getCidadeId(),
            "telefone" => $vo->getTelefone(),
            "matricula" => $vo->getMatricula(),
        ];
       

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM estudantes WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}