<?php

namespace Model;

use Model\VO\EmpresaVO;
use Model\Database;

final class EmpresaModel extends Model {
    public function selectAll ($vo) {
        $db = new Database();
        $query = "SELECT e.id_empresa, e.nome_empresa, e.cnpj_empresa, r.nome_representante, r.funcao_representante
        FROM empresas e
        JOIN representantes r ON e.representante_empresa = r.id_representante;";
        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new EmpresaVO($row['id_empresa'], $row['nome_empresa'], $row['endereco_empresa'], $row['telefone_empresa'], $row['email_empresa'], $row['cnpj_empresa'], $row['representante_empresa']);
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne ($vo) {
        $db = new Database();
        $query = "SELECT e.id_empresa, e.nome_empresa, e.cnpj_empresa, r.nome_representante, r.funcao_representante
        FROM empresas e
        JOIN representantes r ON e.representante_empresa = r.id_representante;
        WHERE id_empresa = :id";
        $binds = [':id' => $vo->getId()];

        $data = $db->select($query, $binds);

        return new EmpresaVO($data[0]['id_empresa'], $data[0]['nome_empresa'], $data[0]['endereco_empresa'], $data[0]['telefone_empresa'],$data[0]['email_empresa'],$data[0]['cnpj_empresa'],$data[0]['representante_empresa']  );

    }
    
    public function insert ($vo) {
        $db = new Database();
        $query = "INSERT INTO empresas (nome_empresa, endereco_empresa, telefone_empresa, email_empresa, cnpj_empresa, representante_empresa) 
                    VALUES (:login, :senha, :nivel)";
        $binds = [
            ":login" => $vo->getLogin(),
            ":senha" => md5($vo->getSenha()),
            ":nivel" => $vo->getNivel()
        ];

        return $db->execute($query, $binds);
    }
    public function update ($vo) {
        $db = new Database();
        if(empty($vo->getSenha())){
            $query = "UPDATE usuarios SET login = :login, nivel = :nivel
            WHERE id = :id";
            
            $binds = [
                ":login" => $vo->getLogin(),
                ":nivel" => $vo->getNivel(),
                ":id" => $vo->getId()
            ];
        } else {
            
            $query = "UPDATE usuarios SET login = :login, 
                        senha = :senha, nivel = :nivel, 
                        WHERE id = :id";
            $binds = [
                ":login" => $vo->getLogin(),
                ":nivel" => $vo->getNivel(),
                ":senha" => md5($vo->getSenha()),
                ":id" => $vo->getId()
            ];
        }

        return $db->execute($query, $binds);
    }
    public function delete ($vo) {
        $db = new Database();
        $query = "DELETE FROM usuarios WHERE id = :id";
        $binds= [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }

    public function doLogin ($vo) {
        $db = new Database();
        $query = "SELECT * FROM usuarios 
                WHERE login = :login AND senha = :senha";

        $binds = [
            ":login" => $vo->getLogin(),
            ":senha" => md5($vo->getSenha()),
        ];

        $data  = $db->select($query, $binds);

        if(count($data) == 0) {
            return null;
        }

        $_SESSION['usuario'] = new UsuarioVO($data[0]['id'], $data[0]['login'], $data[0]['senha'], $data[0]['nivel']);

        return $_SESSION['usuario'];
    }
}
