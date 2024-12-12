<?php

namespace Model;

use Model\VO\EmpresaVO;

final class EmpresaModel extends Model {

    public function selectAll($vo) {
        $db = new Database();
        $query = "SELECT 
            e.id_empresa AS empresa_id,
            e.nome_empresa,
            e.endereco_empresa,
            e.telefone_empresa,
            e.email_empresa,
            e.cnpj_empresa,
            r.nome_representante,
            c.nome AS cidade_nome
        FROM empresas e
        JOIN representantes r ON e.representante_empresa = r.id_representante
        LEFT JOIN cidades c ON e.cidade_empresa = c.id";
            
        $data = $db->select($query);
        $arrayDados = [];
    
        foreach($data as $row) {
            $vo = new EmpresaVO(
                $row["empresa_id"],
                $row["nome_empresa"],
                $row["endereco_empresa"],
                $row["telefone_empresa"],
                $row["email_empresa"],
                $row["cnpj_empresa"],
                $row["nome_representante"],
                $row["cidade_nome"],
            );
            array_push($arrayDados, $vo);
        }
    
        return $arrayDados;
    }
    
    public function selectOne($vo) {
        $db = new Database();
        $query = "SELECT * FROM empresas WHERE id_empresa = :id";
        $binds = [":id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new EmpresaVO(
            $data[0]["id_empresa"],
            $data[0]["nome_empresa"],
            $data[0]["endereco_empresa"],
            $data[0]["telefone_empresa"],
            $data[0]["email_empresa"],
            $data[0]["cnpj_empresa"],
            $data[0]["representante_empresa"],
            $data[0]["cidade_empresa"]
        );
    }

    public function insert($vo) {
        $db = new Database();

        $query = "INSERT INTO empresas 
                    (nome_empresa, endereco_empresa, telefone_empresa, email_empresa, cnpj_empresa, representante_empresa, cidade_empresa)
                  VALUES
                    (:nome_empresa, :endereco_empresa, :telefone_empresa, :email_empresa, :cnpj_empresa, :representante_empresa, :cidade_empresa)";
        $binds = [
            ":nome_empresa" => $vo->getNomeEmpresa(),
            ":endereco_empresa" => $vo->getEnderecoEmpresa(),
            ":telefone_empresa" => $vo->getTelefoneEmpresa(),
            ":email_empresa" => $vo->getEmailEmpresa(),
            ":cnpj_empresa" => $vo->getCnpjEmpresa(),
            ":representante_empresa" => $vo->getRepresentanteEmpresa(),
            ":cidade_empresa" => $vo->getCidadeEmpresa(),
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Database();

        $query = "UPDATE empresas
                  SET 
                    nome_empresa = :nome_empresa,
                    endereco_empresa = :endereco_empresa,
                    telefone_empresa = :telefone_empresa,
                    email_empresa = :email_empresa,
                    cnpj_empresa = :cnpj_empresa,
                    representante_empresa = :representante_empresa,
                    cidade_empresa = :cidade_empresa
                  WHERE id_empresa = :id";
        $binds = [
            ":id" => $vo->getId(),
            ":nome_empresa" => $vo->getNomeEmpresa(),
            ":endereco_empresa" => $vo->getEnderecoEmpresa(),
            ":telefone_empresa" => $vo->getTelefoneEmpresa(),
            ":email_empresa" => $vo->getEmailEmpresa(),
            ":cnpj_empresa" => $vo->getCnpjEmpresa(),
            ":representante_empresa" => $vo->getRepresentanteEmpresa(),
            ":cidade_empresa" => $vo->getCidadeEmpresa(),
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM empresas WHERE id_empresa = :id";
        $binds = [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}
