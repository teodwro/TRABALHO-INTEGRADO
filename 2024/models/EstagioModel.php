<?php

namespace Model;

use Model\VO\EstagioVO;
use Model\Database;

final class EstagioModel extends Model {

    public function filtrarEstagios($curso_id, $filtro_data, $estudante_nome, $empresa_id, $professor_id, $cidade_id) {
        $db = new Database(); 
        
        $query = "
            SELECT e.*, es.nome_estudante, c.nome_curso, p.nome_professor AS orientador_nome
            FROM estagios e
            JOIN estudantes es ON e.id_estudante = es.id
            JOIN cursos c ON e.id_curso_estagio = c.id_curso
            JOIN professores p ON e.id_professor_orientador = p.id_professor
            WHERE 1=1
        ";
        
        $params = [];
        
        if ($curso_id) {
            $query .= " AND e.id_curso_estagio = :curso_id";
            $params[':curso_id'] = $curso_id;
        }
        if ($filtro_data) {
            $query .= " AND :filtro_data BETWEEN periodo_estagio_inicio AND periodo_estagio_fim";
            $params[':filtro_data'] = $filtro_data;
        }
        if ($estudante_nome) {
            $query .= " AND es.nome_estudante LIKE :estudante_nome";
            $params[':estudante_nome'] = "%" . $estudante_nome . "%";
        }
        if ($empresa_id) {
            $query .= " AND e.id_empresa_estagio = :empresa_id";
            $params[':empresa_id'] = $empresa_id;
        }
        if ($professor_id) {
            $query .= " AND p.id_professor = :professor_id";
            $params[':professor_id'] = $professor_id;
        }
        if ($cidade_id) {
            $query .= " AND es.cidade_id = :cidade_id";
            $params[':cidade_id'] = $cidade_id;
        }
        
        return $db->select($query, $params); 
    }
    

    public function selectAll($vo)
    {
        $db = new Database();
        $query = "SELECT 
        estagios.id_estagio,
        estudantes.nome_estudante,
        cursos.nome_curso,
        professores_orientador.nome_professor AS professor_orientador,
        professores_coorientador.nome_professor AS professor_coorientador,
        empresas.nome_empresa AS empresa_estagio,
        estagios.encaminhamentos_secoes_estagio,
        estagios.plano_atividades,
        estagios.relatorio_final,
        estagios.ficha_autoavaliacao,
        estagios.ficha_avaliacao_empresa,
         estagios.termo_compromisso,
        estagios.supervisor_empresa,
        estagios.cargo_formacao_supervisor,
        estagios.telefone_supervisor_empresa,
        estagios.email_supervisor_empresa,
        estagios.numero_convenio,
        estagios.tipo_processo,
        estagios.status_processo,
        estagios.carga_horaria,
        estagios.periodo_estagio_inicio,
        estagios.periodo_estagio_fim
        FROM 
            estagios
        JOIN estudantes ON estagios.id_estudante = estudantes.id
        JOIN cursos ON estagios.id_curso_estagio = cursos.id_curso
        JOIN empresas ON empresas.id_empresa = estagios.id_empresa_estagio
        JOIN professores AS professores_orientador ON estagios.id_professor_orientador = professores_orientador.id_professor
        JOIN professores AS professores_coorientador ON estagios.id_professor_coorientador = professores_coorientador.id_professor
";


        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new EstagioVO(
                $row['id_estagio'],
                $row['nome_estudante'],
                $row['nome_curso'],
                $row['professor_orientador'],
                $row['professor_coorientador'],
                $row['empresa_estagio'],
                $row['encaminhamentos_secoes_estagio'],
                $row['plano_atividades'],
                $row['relatorio_final'],
                $row['ficha_autoavaliacao'],
                $row['ficha_avaliacao_empresa'],
                $row['termo_compromisso'],
                $row['supervisor_empresa'],
                $row['cargo_formacao_supervisor'],
                $row['telefone_supervisor_empresa'],
                $row['email_supervisor_empresa'],
                $row['numero_convenio'],
                $row['tipo_processo'],
                $row['status_processo'],
                $row['carga_horaria'],
                $row['periodo_estagio_inicio'],
                $row['periodo_estagio_fim']
            );
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne($vo)
    {
        $db = new Database();
        $query = "SELECT 
            id_estagio,
            id_estudante,
            id_curso_estagio,
            id_professor_orientador,
            id_professor_coorientador,
            id_empresa_estagio,
            encaminhamentos_secoes_estagio,
            plano_atividades,
            relatorio_final,
            ficha_autoavaliacao,
            ficha_avaliacao_empresa,
            termo_compromisso,
            supervisor_empresa,
            cargo_formacao_supervisor,
            telefone_supervisor_empresa,
            email_supervisor_empresa,
            numero_convenio,
            tipo_processo,
            status_processo,
            carga_horaria,
            periodo_estagio_inicio,
            periodo_estagio_fim
        FROM estagios
        WHERE id_estagio = :id";
        $binds = [':id' => $vo->getId()];

        $data = $db->select($query, $binds);

        return new EstagioVO(
            $data[0]['id_estagio'],
            $data[0]['id_estudante'],
            $data[0]['id_curso_estagio'],
            $data[0]['id_professor_orientador'],
            $data[0]['id_professor_coorientador'],
            $data[0]['id_empresa_estagio'],
            $data[0]['encaminhamentos_secoes_estagio'],
            $data[0]['plano_atividades'],
            $data[0]['relatorio_final'],
            $data[0]['ficha_autoavaliacao'],
            $data[0]['ficha_avaliacao_empresa'],
            $data[0]['termo_compromisso'],
            $data[0]['supervisor_empresa'],
            $data[0]['cargo_formacao_supervisor'],
            $data[0]['telefone_supervisor_empresa'],
            $data[0]['email_supervisor_empresa'],
            $data[0]['numero_convenio'],
            $data[0]['tipo_processo'],
            $data[0]['status_processo'],
            $data[0]['carga_horaria'],
            $data[0]['periodo_estagio_inicio'],
            $data[0]['periodo_estagio_fim'],
        );
    }

    public function insert($vo)
    {
        $db = new Database();
        $query = "INSERT INTO estagios (
            id_estudante,
            id_curso_estagio,
            id_professor_orientador,
            id_professor_coorientador,
            id_empresa_estagio,
            encaminhamentos_secoes_estagio,
            plano_atividades,
            relatorio_final,
            ficha_autoavaliacao,
            ficha_avaliacao_empresa,
            termo_compromisso,
            supervisor_empresa,
            cargo_formacao_supervisor,
            telefone_supervisor_empresa,
            email_supervisor_empresa,
            numero_convenio,
            tipo_processo,
            status_processo,
            carga_horaria,
            periodo_estagio_inicio,
            periodo_estagio_fim
        ) VALUES (
            :id_estudante,
            :id_curso_estagio,
            :id_professor_orientador,
            :id_professor_coorientador,
            :id_empresa_estagio,
            :encaminhamentos_secoes_estagio,
            :plano_atividades,
            :relatorio_final,
            :ficha_autoavaliacao,
            :ficha_avaliacao_empresa,
            :termo_compromisso,
            :supervisor_empresa,
            :cargo_formacao_supervisor,
            :telefone_supervisor_empresa,
            :email_supervisor_empresa,
            :numero_convenio,
            :tipo_processo,
            :status_processo,
            :carga_horaria,
            :periodo_estagio_inicio,
            :periodo_estagio_fim
        )";
        $binds = [
            ":id_estudante" => $vo->getEstudanteEstagio(),
            ":id_curso_estagio" => $vo->getCursoEstagio(),
            ":id_professor_orientador" => $vo->getProfessorOrientador(),
            ":id_professor_coorientador" => $vo->getProfessorCoorientador(),
            ":id_empresa_estagio" => $vo->getEmpresaEstagio(),
            ":encaminhamentos_secoes_estagio" => $vo->getEncaminhamentosSecoesEstagio(),
            ":plano_atividades" => $vo->getPlanoAtividades(),
            ":relatorio_final" => $vo->getRelatorioFinal(),
            ":ficha_autoavaliacao" => $vo->getFichaAutoavaliacao(),
            ":ficha_avaliacao_empresa" => $vo->getFichaAvaliacaoEmpresa(),
            ":termo_compromisso" => $vo->getTermoCompromisso(),
            ":supervisor_empresa" => $vo->getSupervisorEmpresa(),
            ":cargo_formacao_supervisor" => $vo->getCargoFormacaoSupervisor(),
            ":telefone_supervisor_empresa" => $vo->getTelefoneSupervisorEmpresa(),
            ":email_supervisor_empresa" => $vo->getEmailSupervisorEmpresa(),
            ":numero_convenio" => $vo->getNumeroConvenio(),
            ":tipo_processo" => $vo->getTipoProcesso(),
            ":status_processo" => $vo->getStatusProcesso(),
            ":carga_horaria" => $vo->getCargaHoraria(),
            ":periodo_estagio_inicio" => $vo->getPeriodoEstagioInicio(),
            ":periodo_estagio_fim" => $vo->getPeriodoEstagioFim(),
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo)
    {
        $db = new Database();
        $query = "UPDATE estagios SET
            id_estudante = :id_estudante,
            id_curso_estagio = :id_curso_estagio,
            id_professor_orientador = :id_professor_orientador,
            id_professor_coorientador = :id_professor_coorientador,
            id_empresa_estagio = :id_empresa_estagio,
            encaminhamentos_secoes_estagio = :encaminhamentos_secoes_estagio,
            plano_atividades = :plano_atividades,
            relatorio_final = :relatorio_final,
            ficha_autoavaliacao = :ficha_autoavaliacao,
            ficha_avaliacao_empresa = :ficha_avaliacao_empresa,
            termo_compromisso = :termo_compromisso,
            supervisor_empresa = :supervisor_empresa,
            cargo_formacao_supervisor = :cargo_formacao_supervisor,
            telefone_supervisor_empresa = :telefone_supervisor_empresa,
            email_supervisor_empresa = :email_supervisor_empresa,
            numero_convenio = :numero_convenio,
            tipo_processo = :tipo_processo,
            status_processo = :status_processo,
            carga_horaria = :carga_horaria,
            periodo_estagio_inicio = :periodo_estagio_inicio,
            periodo_estagio_fim = :periodo_estagio_fim
        WHERE id_estagio = :id_estagio";
        $binds = [
            ":id_estagio" => $vo->getId(),
            ":id_estudante" => $vo->getEstudanteEstagio(),
            ":id_curso_estagio" => $vo->getCursoEstagio(),
            ":id_professor_orientador" => $vo->getProfessorOrientador(),
            ":id_professor_coorientador" => $vo->getProfessorCoorientador(),
            ":id_empresa_estagio" => $vo->getEmpresaEstagio(),
            ":encaminhamentos_secoes_estagio" => $vo->getEncaminhamentosSecoesEstagio(),
            ":plano_atividades" => $vo->getPlanoAtividades(),
            ":relatorio_final" => $vo->getRelatorioFinal(),
            ":ficha_autoavaliacao" => $vo->getFichaAutoavaliacao(),
            ":ficha_avaliacao_empresa" => $vo->getFichaAvaliacaoEmpresa(),
            ":termo_compromisso" => $vo->getTermoCompromisso(),
            ":supervisor_empresa" => $vo->getSupervisorEmpresa(),
            ":cargo_formacao_supervisor" => $vo->getCargoFormacaoSupervisor(),
            ":telefone_supervisor_empresa" => $vo->getTelefoneSupervisorEmpresa(),
            ":email_supervisor_empresa" => $vo->getEmailSupervisorEmpresa(),
            ":numero_convenio" => $vo->getNumeroConvenio(),
            ":tipo_processo" => $vo->getTipoProcesso(),
            ":status_processo" => $vo->getStatusProcesso(),
            ":carga_horaria" => $vo->getCargaHoraria(),
            ":periodo_estagio_inicio" => $vo->getPeriodoEstagioInicio(),
            ":periodo_estagio_fim" => $vo->getPeriodoEstagioFim(),
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo)
    {
        $db = new Database();
        $query = "DELETE FROM estagios WHERE id_estagio = :id_estagio";
        $binds = [":id_estagio" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}
