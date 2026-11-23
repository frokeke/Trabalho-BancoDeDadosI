
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
        $nome = trim($_POST['aluno_nome']);
        $turma = $_POST['turma'];
        $data = $_POST['data'];
        $status = $_POST['status'];
        $alunos = $this->matricula->buscarAlunoPorNome($nome);
        if (count($alunos) == 0) {
            header('Location: index.php?erro=aluno');
            exit;
        }
        if (count($alunos) > 1) {
            header('Location: index.php?erro=duplicado');
            exit;
        }
        $aluno = $alunos[0]['id_aluno'];

        $this->matricula->cadastrar($aluno, $turma, $data, $status);
        header('Location: index.php?sucesso=1');
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

    
    // Buscar turmas com seus cursos
    public function buscarTurmas()
    {
        return $this->matricula->listarTurmasComCurso();
    }

}

?>