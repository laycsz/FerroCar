<?php
include '../conexao/conexao.php';
date_default_timezone_set("America/Sao_Paulo");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Movimentos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/listarmovimento.css">
    <link rel="icon" href="../assets/images/icon/parking (1).png">
    <style>
        
    </style>
</head>
<body class="body-clie-listar">
    <div class="container-clie">
    <div class="box-voltar">
        <a href="../relatorio/index.php">
            <button class="btn btn-dark">
                <i class="bi bi-arrow-return-left"> Voltar</i>
            </button>
        </a>
        <input type="search" class="form-control w-25" placeholder="Pesquisar pela placa" id="pesquisar">
    </div>

        <form method="POST" action="" class="form-date">
            <label for="data_inicio">Data de Início</label>
            <input type="date" name="data_inicio" id="data_inicio" value="<?php echo isset($_POST['data_inicio']) ? $_POST['data_inicio'] : ''; ?>">
            <label for="data_final">Data Final</label>
            <input type="date" name="data_final" id="data_final" value="<?php echo isset($_POST['data_final']) ? $_POST['data_final'] : ''; ?>">
            <input type="submit" value="Pesquisar" name="PesqUsuario">
            <input type="button" value="Limpar" onclick="limparDatas()">          
        </form>

        <div class="table-container">
            <table class="table-clie">
                <thead class="thead-clie-list">
                    <tr>
                        <th class="th-clie-listar">ID</th>
                        <th class="th-clie-listar">Placa</th>
                        <th class="th-clie-listar">Cliente</th>
                        <th class="th-clie-listar">Modelo</th>
                        <th class="th-clie-listar">Cor</th>
                        <th class="th-clie-listar">Vaga</th>
                        <th class="th-clie-listar">Data Entrada</th>
                        <th class="th-clie-listar">Hora Entrada</th>
                        <th class="th-clie-listar">Hora Saída</th>
                        <th class="th-clie-listar">Valor</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    $query_usuarios = "SELECT * FROM movimento";

                    if (!empty($_GET['search'])) {
                        $data = $_GET['search'];
                        $query_usuarios .= " WHERE LOWER(placas) LIKE LOWER('%$data%') OR LOWER(categoria) LIKE LOWER('%$data%') ORDER BY id DESC";
                    } elseif (!empty($_POST['data_inicio']) && !empty($_POST['data_final'])) {
                        $data_inicio = $_POST['data_inicio'];
                        $data_final = $_POST['data_final'];
                        $query_usuarios .= " WHERE dt_entrada BETWEEN :data_inicio AND :data_final ORDER BY id DESC";
                    } else {
                        $query_usuarios .= " ORDER BY id DESC";
                    }

                    $result_usuarios = $conn->prepare($query_usuarios);

                    if (!empty($_POST['data_inicio']) && !empty($_POST['data_final'])) {
                        $result_usuarios->bindParam(':data_inicio', $data_inicio);
                        $result_usuarios->bindParam(':data_final', $data_final);
                    }

                    $result_usuarios->execute();

                    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                        $dt_entrada = !empty($row_usuario['dt_entrada']) ? new DateTime($row_usuario['dt_entrada']) : null;
                        $hr_entrada = !empty($row_usuario['hr_entrada']) ? new DateTime($row_usuario['hr_entrada']) : null;
                        $hr_saida = !empty($row_usuario['hr_saida']) ? new DateTime($row_usuario['hr_saida']) : null;

                        echo "<tr>";
                        echo "<td>{$row_usuario['id']}</td>";
                        echo "<td>{$row_usuario['placas']}</td>";
                        echo "<td>{$row_usuario['nome']}</td>";
                        echo "<td>{$row_usuario['modelo']}</td>";
                        echo "<td>{$row_usuario['cor']}</td>";
                        echo "<td>{$row_usuario['vaga']}</td>";
                        echo "<td>" . ($dt_entrada ? $dt_entrada->format('d/m/Y') : '-') . "</td>";
                        echo "<td>" . ($hr_entrada ? $hr_entrada->format('H:i:s') : '-') . "</td>";
                        echo "<td>" . ($hr_saida ? $hr_saida->format('H:i:s') : '-') . "</td>";
                        echo "<td>R$ {$row_usuario['valor']},00</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('pesquisar').addEventListener('input', function() {
            searchData(this.value);
        });

        function searchData(query) {
            fetch('relatorio.php?search=' + query)
                .then(response => response.text())
                .then(data => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(data, 'text/html');
                    const newTableBody = doc.getElementById('table-body').innerHTML;
                    document.getElementById('table-body').innerHTML = newTableBody;
                });
        }

        function limparDatas() {
            document.getElementById('data_inicio').value = '';
            document.getElementById('data_final').value = '';
            window.location = 'relatorio.php';
        }

        function limparPesquisa() {
            document.getElementById('pesquisar').value = '';
            window.location = 'relatorio.php';
        }
    </script>
</body>
</html>
