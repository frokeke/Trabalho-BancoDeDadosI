
<?php

require_once __DIR__ . '/../app/config/dbconn.php';
require_once __DIR__ . '/../app/controller/MatriculaController.php';

$controller = new MatriculaController($pdo);

// Executar ações solicitadas
$controller->cadastrar();
$controller->excluir();

// Buscar dados para a página
$matriculas = $controller->listar();

$alunos = $controller->buscarAlunos();
$turmas = $controller->buscarTurmas();

$consultaAlunosTurmas = $controller->consultarAlunosTurmas();
$consultaTurmas = $controller->consultarTurmas();

// Exibe a página
require_once __DIR__ . '/../app/view/matriculas/index.php';

?>
