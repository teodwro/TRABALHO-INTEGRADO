<?php

namespace Model;

use Model\VO\CursoVO;

final class CursoModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT 
        c.id_curso,
        c.nome_curso,
        p.nome_professor        
        FROM cursos c
        JOIN professores p ON c.professor_curso = p.id_professor";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new CursoVO($row["id_curso"], $row["nome_curso"], $row["professor_curso"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM cursos WHERE id_curso = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new CursoVO($data[0]["id_curso"], $data[0]["nome_curso"], $data[0]["professor_curso"]);
    }

    public function insert($vo) {
        $db = new Database();

        $query = "INSERT INTO cursos (nome_curso, professor_curso) VALUES (:nome_curso, :professor_curso)";
        $binds = [
            ":nome_curso" => $vo->getNomeCurso(),
            ":professor_curso" => $vo->getProfessorCurso()
        ];
        
        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();

        $query = "UPDATE cursos SET nome_curso = :nome_curso, professor_curso WHERE id = :id";
        $binds = [
            ":nome_curso" => $vo->getNomeCurso(),
            ":id" => $vo->getId(),
        ];
       

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM cursos WHERE id = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}