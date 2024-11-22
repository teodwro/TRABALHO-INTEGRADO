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
                    VALUES (:nome_empresa, :endereco_empresa, :telefone_empresa, :email_empresa, :cnpj_empresa, :representante_empresa)";
        $binds = [
            ":nome_empresa" => $vo->getNomeEmpresa(),
            ":endereco_empresa" => $vo->getEnderecoEmpresa(),
            ":telefone_empresa" => $vo->getTelefoneEmpresa(),
            ":email_empresa" => $vo->getEmailEmpresa(),
            ":cnpj_empresa" => $vo->getCnpjEmpresa(),
            ":representante_empresa" => $vo->getRepresentanteEmpresa(),
        ];

        return $db->execute($query, $binds);
    }
    public function update ($vo) {
        $db = new Database();
       
            $query = "UPDATE empresas SET nome_empresa = :nome_empresa, endereco_empresa = :endereco_empresa, 
            telefone_empresa = :telefone_empresa, email_empresa = :email_empresa, cnpj_empresa = :cnpj_empresa, representante_empresa = :representante_empresa
                        WHERE id = :id";
            $binds = [
                ":nome_empresa" => $vo->getNomeEmpresa(),
                ":endereco_empresa" => $vo->getEnderecoEmpresa(),
                ":telefone_empresa" => $vo->getTelefoneEmpresa(),
                ":email_empresa" => $vo->getEmailEmpresa(),
                ":cnpj_empresa" => $vo->getCnpjEmpresa(),
                ":representante_empresa" => $vo->getRepresentanteEmpresa(),
                ":id" => $vo->getIdEmpresa(),
            ];
        

        return $db->execute($query, $binds);
    }
    
    public function delete ($vo) {
        $db = new Database();
        $query = "DELETE FROM empresas WHERE id = :id";
        $binds= [":id" => $vo->getIdEmpresa()];

        return $db->execute($query, $binds);
    }
}
