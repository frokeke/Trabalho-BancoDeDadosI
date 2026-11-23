<?php

class Matricula
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Cadastrar matrícula
    public function cadastrar($aluno, $turma, $data, $status)
    {
        $sql = "INSERT INTO Matricula (id_aluno, id_turma, data_matricula, status) VALUES (?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$aluno, $turma, $data, $status]);
    }

    // Listar matrículas com nomes dos alunos e turmas
    public function listar()
    {
        $sql = "SELECT
                    a.nome AS aluno,
                    t.nome_turma AS turma,
                    m.id_aluno,
                    m.id_turma,
                    m.data_matricula,
                    m.status
                FROM Matricula m
                INNER JOIN Aluno a ON m.id_aluno = a.id_aluno
                INNER JOIN Turma t ON m.id_turma = t.id_turma";

        return $this->pdo->query($sql)->fetchAll();
    }

    // Excluir matrícula
    public function excluir($aluno, $turma)
    {
        $sql = "DELETE FROM Matricula WHERE id_aluno = ? AND id_turma = ?";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$aluno, $turma]);
    }

    // Consulta JOIN: turmas, cursos e professores
    public function consultarTurmas()
    {
        $sql = "SELECT
                    t.nome_turma AS turma,
                    c.nome AS curso,
                    p.nome AS professor
                FROM Turma t
                INNER JOIN Curso c ON t.id_curso = c.id_curso
                INNER JOIN Professor p ON t.id_professor = p.id_professor";

        return $this->pdo->query($sql)->fetchAll();
    }
}

?>