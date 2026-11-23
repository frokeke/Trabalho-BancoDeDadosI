<?php

$host = '200.129.139.155';
$usuario = 'aluno';
$senha = 'Aluno@2026';
$banco = 'meubanco';

$link = mysqli_connect($host, $usuario, $senha, $banco);

if (mysqli_connect_error()) {
    printf('Erro de conexão: %s', mysqli_connect_error());
    exit;
}

if (!mysqli_set_charset($link, 'utf8')) {
    printf('Error ao usar utf8: %s', mysqli_error($link));
    exit;
}

if ($result = mysqli_query($link, 'SELECT * FROM nome')) {

    /* Pega os dados */
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['nome'];
    }

    /* libera os resultados */
    mysqli_free_result($result);
} else {
    /*Trata o erro da query, se ocorrer*/
    printf('Erro na query: %s', mysqli_error($link));
    exit;
}

/* fecha a conexão */
mysqli_close($link);
?>