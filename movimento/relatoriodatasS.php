<?php
// Incluir conexao com BD
include_once('../conexao/conexao.php');
include '../inc/headerr.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title> Relatorio</title>
</head>

<body>

    <h1>Visualizar relatorios</h1>

    <?php

    // Receber os dados do formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


    ?>

    <!-- Formulário pesquisar entre datas -->
    <form method="POST" action="">
        <?php
        // Manter os dados no campo
        $data_inicio = "";
        if (isset($dados['data_inicio'])) {
            $data_inicio = $dados['data_inicio'];
        }
        ?>
        <label>Data de Inicio</label>
        <input type="date" name="data_inicio" value="<?php echo $data_inicio; ?>">
        <br><br>

        <?php
        // Manter os dados no campo
        $data_final = "";
        if (isset($dados['data_final'])) {
            $data_final = $dados['data_final'];
        }
        ?>
        <label>Data de Final</label>
        <input type="date" name="data_final" value="<?php echo $data_final; ?>">
        <br><br>

        <input type="submit" value="Pesquisar" name="PesqUsuario"><br><br>

    </form>

    <?php
    // Acessa o IF quando o usuário clicar no botão pesquisar
    if (!empty($dados['PesqUsuario'])) {

        // QUERY sql para pesquisar entre datas
        $query_usuarios = "SELECT *
                FROM movimento
                WHERE dt_entrada BETWEEN :data_inicio AND :data_final AND id BETWEEN 1 and 10000";

        // Prepara a QUERY
        $result_usuarios = $conn->prepare($query_usuarios);

        // Substitui os link da QUERY pelo valor
        $result_usuarios->bindParam(':data_inicio', $dados['data_inicio']);
        $result_usuarios->bindParam(':data_final', $dados['data_final']);

        // Executar a QUERY
        $result_usuarios->execute();

        // Acessa o IF quando encontrar registro no banco de dados
        if (($result_usuarios) and ($result_usuarios->rowCount() != 0)) {
    ?>
            <div class="lista">
        <?php
            // Ler os registros retornado do banco de dados
            while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {

                // Extrair o array para imprimir pela chave do array
                extract($row_usuario);


                // Imprimir os dados usando a chave do array como variável em função do extract executado acima


                echo  @"ID:$id <br> ";
                echo "Data entrada: " . date('d/m/Y', strtotime(@$dt_entrada)) . "<br>";
                echo @"Hora entrada: $hr_entrada <br>";
                echo "data Saida: " . date('d/m/Y', strtotime(@$dt_saida)) . "<br>";
                echo @"Hora saida: $hr_saida <br>";
                echo @"Placa: $placas<br>";
                echo @"Categoria: $categoria<br>";
                echo @"Nome: $nome <br> ";


                // Converter a data para o formato brasileiro
                echo "Cadastrado: " . date('d/m/Y', strtotime(@$dt_entrada)) . "<br>";
                echo "<hr>";
            }
        } else { // Acessa o ELSE quando não encontrar nenhum registro no banco de dados e imprime a mensagem de erro
            echo "<p style='color: #f00'>Erro: Nenhum registro   encontrado!</p>";
        }
    }
        ?>
            </div>
</body>
<style>
    body {

        font-weight: 700;
        font-size: 15px;

        color: white;
    }

    form {

        font-family: 'Amatic SC', cursive;
        margin-top: 50px;
        text-align: center;
    }

    .lista {
        margin: auto;
        font-family: Arial, Helvetica, sans-serif;
        display: flex;
        flex-wrap: wrap;
        width: 50%;
        justify-content: center;
        gap: 1rem;
        color: #967ea7;

    }

    a {
        color: white;
    }

    input {

        font-weight: 600;
        font-size: 18px;
        margin-left: 20px;
        height: 35px;
        border-radius: 20px;
        width: 150px;
    }

    h1 {
        font-family: 'Amatic SC', cursive;
        margin-top: 50px;
        text-align: center;
    }

    label {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 17px;
    }
</style>

</html>