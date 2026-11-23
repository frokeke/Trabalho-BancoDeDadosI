
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Escola de Cursos Livres</title>
</head>

<body>

    <h1>Escola de Cursos Livres</h1>

    <hr>

    <h2>Cadastro de Matrícula</h2>

    <form method="POST" action="index.php">

        <input type="hidden" name="acao" value="cadastrar">

        
        <label>Nome do aluno:</label>
        <input type="text" name="aluno_nome" placeholder="Digite o nome completo do aluno" required>
        
        <br><br>

    <label>Turma:</label>
    <select name="turma" required>
        <option value="">Selecione uma turma</option>

        <?php foreach ($turmas as $turma): ?>
            <option value="<?= $turma['id_turma'] ?>">
                <?= htmlspecialchars($turma['nome_turma']) ?>
                - <?= htmlspecialchars($turma['curso']) ?>
            </option>
        <?php endforeach; ?>
        
    </select>


        <br><br>

        <label>Data da matrícula:</label>
        <input type="date" name="data" required>

        <br><br>

        <label>Status:</label>
        <select name="status" required>
            <option value="ativa">Ativa</option>
            <option value="cancelada">Cancelada</option>
            <option value="concluida">Concluída</option>
        </select>

        <br><br>

        <button type="submit">Cadastrar matrícula</button>

    </form>

    <hr>

    <h2>Matrículas cadastradas</h2>

    <table border="1" cellpadding="8">

        <tr>
            <th>Aluno</th>
            <th>Turma</th>
            <th>Data da matrícula</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>

        <?php foreach ($matriculas as $matricula): ?>

            <tr>
                <td><?= htmlspecialchars($matricula['aluno']) ?></td>
                <td><?= htmlspecialchars($matricula['turma']) ?></td>
                <td><?= htmlspecialchars($matricula['data_matricula']) ?></td>
                <td><?= htmlspecialchars($matricula['status']) ?></td>

                <td>
                    <form method="POST" action="index.php">
                        <input type="hidden" name="acao" value="excluir">
                        <input type="hidden" name="aluno" value="<?= $matricula['id_aluno'] ?>">
                        <input type="hidden" name="turma" value="<?= $matricula['id_turma'] ?>">
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>

        <?php endforeach; ?>

        <?php if (empty($matriculas)): ?>
            <tr>
                <td colspan="5">Nenhuma matrícula cadastrada.</td>
            </tr>
        <?php endif; ?>

    </table>

    <hr>

    <h2>Consulta 1 — Alunos e suas Turmas</h2>

    <table border="1" cellpadding="8">

        <tr>
            <th>Aluno</th>
            <th>Turma</th>
            <th>Data da matrícula</th>
            <th>Status</th>
        </tr>

        <?php foreach ($consultaAlunosTurmas as $item): ?>

            <tr>
                <td><?= htmlspecialchars($item['aluno']) ?></td>
                <td><?= htmlspecialchars($item['turma']) ?></td>
                <td><?= htmlspecialchars($item['data_matricula']) ?></td>
                <td><?= htmlspecialchars($item['status']) ?></td>
            </tr>

        <?php endforeach; ?>

        <?php if (empty($consultaAlunosTurmas)): ?>
            <tr>
                <td colspan="4">Nenhum resultado encontrado.</td>
            </tr>
        <?php endif; ?>

    </table>

    <hr>

    <h2>Consulta 2 — Turmas, Cursos e Professores</h2>

    <table border="1" cellpadding="8">

        <tr>
            <th>Turma</th>
            <th>Curso</th>
            <th>Professor</th>
        </tr>

        <?php foreach ($consultaTurmas as $item): ?>

            <tr>
                <td><?= htmlspecialchars($item['turma']) ?></td>
                <td><?= htmlspecialchars($item['curso']) ?></td>
                <td><?= htmlspecialchars($item['professor']) ?></td>
            </tr>

        <?php endforeach; ?>

        <?php if (empty($consultaTurmas)): ?>
            <tr>
                <td colspan="3">Nenhum resultado encontrado.</td>
            </tr>
        <?php endif; ?>

    </table>

</body>
</html>
