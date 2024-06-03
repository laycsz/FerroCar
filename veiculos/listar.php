<?php
include '../inc/header.php';
require_once '../conexao/conexao.php';
?>

<head>
    <title>Listar Veículos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="../assets/images/icon/parking (1).png">
    <link rel="stylesheet" href="../assets/css/listarveiculo.css">
    <link rel="stylesheet" href="../assets/css/global.css">
</head>

<body>
    <div class="box-voltar">
  <a href="../relatorio/index.php">
    <button onclick="searchData()" class="btn btn-dark">
     <i class="bi bi-arrow-return-left">  Voltar</i>
     </button>
    </a>
          
       
        <input type="search" class="form-control w-25" placeholder="Pesquisar pela placa" id="pesquisar">
       
    </div>

    <body class="body-veic-listar">
        <div class="container-veic">
            <div class="table">
                <table class="table-veic">
                    <thead class="thead-veic-list">
                        <th class="th-veic-listar" scope="col">ID</th>
                        <th class="th-clie-listar" scope="col">PLACA</th>
                        <th class="th-clie-listar" scope="col">COR</th>
                        <th class="th-clie-listar" scope="col">MODELO</th>
                        <th class="th-clie-listar" scope="col">CATEGORIA</th>
                        <th class="th-clie-listar" scope="col">NOME DO CLIENTE</th>
                        <th scope="col">EDITAR</th>
                    </thead>
                    <tbody id="table-body">
                        <?php
                        $query_usuarios = "SELECT * FROM veiculos ORDER BY veiculo_id DESC";
                        if (!empty($_GET['search'])) {
                            $data = $_GET['search'];
                            $query_usuarios = "SELECT * FROM veiculos WHERE placas LIKE '%$data%' OR modelo LIKE '%$data%' ORDER BY veiculo_id DESC";
                        }
                        $result_usuarios = $conn->prepare($query_usuarios);
                        $result_usuarios->execute();

                        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                            extract($row_usuario);
                            echo "<tr>";
                            echo "<td>$veiculo_id</td>";
                            echo "<td>$placas</td>";
                            echo "<td>$cor</td>";
                            echo "<td>$modelo</td>";
                            echo "<td>$categoria</td>";
                            echo "<td>$veic_clie_id</td>";
                            echo "<td><a href='../veiculos/editar.php?id=$veiculo_id'><i class='bi bi-pencil'></i></a></td>";
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
                const searchValue = document.getElementById('pesquisar').value;
                fetch(`../veiculos/listar.php?search=${searchValue}`)
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
