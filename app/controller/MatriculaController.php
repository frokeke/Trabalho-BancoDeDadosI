
<?php

require_once __DIR__ . '/../model/Matricula.php';

class MatriculaController
{
    private $matricula;
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
        $this->matricula = new Matricula($pdo);
    }

    // Cadastrar matrícula
    public function cadastrar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acao']) && $_POST['acao'] == 'cadastrar') {
            $aluno = $_POST['aluno'];
            $turma = $_POST['turma'];
            $data = $_POST['data'];
            $status = $_POST['status'];

            $this->matricula->cadastrar($aluno, $turma, $data, $status);

            header('Location: index.php');
            exit;
        }

    }

    // Excluir matrícula
    public function excluir()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['acao']) && $_POST['acao'] == 'excluir') {
        
        $this->matricula->excluir($_POST['aluno'], $_POST['turma']);

        header('Location: index.php');
        exit;
        }
    }

    // Listar matrículas
    public function listar()
    {
        return $this->matricula->listar();
    }

    // Primeira consulta JOIN
    public function consultarAlunosTurmas()
    {
        return $this->matricula->listar();
    }

    // Segunda consulta JOIN
    public function consultarTurmas()
    {
        return $this->matricula->consultarTurmas();
    }

    // Buscar alunos
    public function buscarAlunos()
    {
        $sql = "SELECT id_aluno, nome FROM Aluno ORDER BY nome";
        return $this->pdo->query($sql)->fetchAll();
    }

    // Buscar turmas
    public function buscarTurmas()
    {
        $sql = "SELECT id_turma, nome_turma FROM Turma ORDER BY nome_turma";
        return $this->pdo->query($sql)->fetchAll();
    }
}

?>