<?php
require_once '../../conexao/conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="../../assets/images/icon/parking (1).png">
    <link rel="stylesheet" href="../../assets/css/listarusuario.css">
    <link rel="stylesheet" href="../../assets/css/global.css">
</head>
<body class="body-clie-listar">
    <div class="box-voltar">
        <a href="../../relatorio/index.php">
            <button class="btn btn-dark">
                <i class="bi bi-arrow-return-left"> Voltar</i>
            </button>
        </a>
        <input type="search" class="form-control w-25" placeholder="Pesquisar pelo nome/CPF " id="pesquisar">
    </div>
    <div class="container-clie">
        <div class="table">
            <table class="table-clie">
                <thead class="thead-clie-list">
                    <tr>
                        <th class="th-clie-listar" scope="col">ID</th>
                        <th class="th-clie-listar" scope="col">NOME</th>
                        <th class="th-clie-listar" scope="col">CPF</th>
                        <th class="th-clie-listar" scope="col">EMAIL</th>
                        <th scope="col">EDITAR</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    if (!empty($_GET['search'])) {
                        $data = $_GET['search'];
                        $query_usuarios = "SELECT * FROM usuariologin WHERE LOWER(nome) LIKE LOWER('%$data%') OR LOWER(cpf) LIKE LOWER('%$data%') ORDER BY id_login DESC";
                    } else {
                        $query_usuarios = "SELECT * FROM usuariologin ORDER BY id_login DESC";
                    }
                    $result_usuarios = $conn->prepare($query_usuarios);
                    $result_usuarios->execute();

                    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_usuario);
                        echo "<tr>";
                        echo "<td>$id_login</td>";
                        echo "<td>$nome</td>";
                        echo "<td>$cpf</td>";
                        echo "<td>$email</td>";
                        echo "<td><a href='../usuarios/editar.php?id=$id_login'><i class='bi bi-pencil'></i></a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function debounce(func, wait) {
            let timeout;
            return function (...args) {
                const context = this;
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(context, args), wait);
            };
        }

        function searchData() {
            const searchValue = document.getElementById('pesquisar').value.toLowerCase();
            fetch(`../usuarios/listar.php?search=${searchValue}`)
                .then(response => response.text())
                .then(data => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(data, 'text/html');
                    const newTableBody = doc.getElementById('table-body').innerHTML;
                    document.getElementById('table-body').innerHTML = newTableBody;
                });
        }

        document.getElementById('pesquisar').addEventListener('input', debounce(searchData, 300));
    </script>
</body>
</html>
