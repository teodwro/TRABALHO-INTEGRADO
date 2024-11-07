<?php

namespace Model;

use Model\VO\ProfessorVO;

final class ProfessorModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT * FROM professores";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new ProfessorVO($row["id_professor"], $row["nome_professor"], $row["email_professor"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM professores WHERE id_professor = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new professorVO($data[0]["id_professor"], $data[0]["nome_professor"], $data[0]["email_professor"]);
    }

    public function insert($vo) {
        $db = new Database();

        $query = "INSERT INTO professores (nome_professor, email_professor) VALUES (:nome_professor, :email_professor)";
        $binds = [
            ":nome_professor" => $vo->getNomeProfessor(),
            ":email_professor" => $vo->getEmailProfessor()
        ];
        
        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();

        $query = "UPDATE professores SET nome_professor = :nome_professor, email_professor = :email_professor WHERE id_professor = :id";
        $binds = [
            ":nome_professor" => $vo->getNomeProfessor(),
            ":email_professor" => $vo->getEmailProfessor(),
            ":id" => $vo->getId()
        ];
       

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM professores WHERE id_professor = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}