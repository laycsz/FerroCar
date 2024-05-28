<?php
require_once '../conexao/conexao.php';





?>

<head>
    <title>Listar Veiculos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="../assets/images/icon/parking (1).png">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-dark">
            <i class="bi bi-search"></i>
        </button>
    </div>

    <body class="body-clie-listar">
        <div class="container-clie">
            <div class="table">
                <table class="table-clie">
                    <thead class="thead-clie-list">
                        <th class="th-clie-listar" scope="col">ID</th>
                        <th class="th-clie-listar" scope="col">PLACA</th>
                        <th class="th-clie-listar" scope="col">COR</th>
                        <th class="th-clie-listar" scope="col">MODELO</th>
                        <th class="th-clie-listar" scope="col">CATEGORIA</th>
                        <th class="th-clie-listar" scope="col">NOME DO CLIENTE</th>


                        <th scope="col">EDITAR</th>
                    </thead>


                    <tbody>
                        <?php

                        if (!empty($_GET['search'])) {
                            $data = $_GET['search'];
                            $query_usuarios = "SELECT * FROM veiculos WHERE placas LIKE '%$data%' or placas LIKE  '%$data%' or modelo LIKE  '%$data%'  ORDER BY veiculo_id DESC ";
                        } else {
                            $query_usuarios = "SELECT * FROM veiculos ORDER BY  veiculo_id DESC";
                        }
                        $result_usuarios = $conn->prepare($query_usuarios);
                        //  $result_usuarios->bindParam(':cliente_id', $data, PDO::PARAM_STR);




                        $result_usuarios->execute();

                        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                            //var_dump($row_usuario);
                            extract($row_usuario);
                            echo "<td>  $veiculo_id</td>";
                            echo "<td>  $placas</td>";
                            echo "<td>  $cor</td>";
                            echo "<td>  $modelo</td>";
                            echo "<td>  $categoria</td>";
                            echo "<td>  $veic_clie_id</td>";

                            echo "<td><a href='../veiculos/editar.php?id= $veiculo_id'><i class='bi bi-pencil'></i></a>";
                            echo "</tr>";
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <script>
    var search = document.getElementById('pesquisar');
    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            searchData();
        }
    });



    function searchData() {
        window.location = '../veiculos/listar.php?search=' + search.value;
    }
</script>

    </body>
    <style>
        body {

            background: rgb(41, 19, 65);
            background: linear-gradient(90deg, rgba(41, 19, 65, 1) 0%, rgba(33, 15, 52, 1) 49%, rgba(12, 0, 40, 1) 100%);

            font-family: sans-serif;
            font-weight: 100;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        table {
            width: 800px;
            border-collapse: collapse;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        th,
        td {
            padding: 15px;
            background-color: #523b5f;
            color: #cba8dc;
        }

        th {
            text-align: left;
        }

        a {
            color: #cba8dc;
            font-family: arial;
            font-size: 13px;

        }

        thead,
        th {

            background-color: #2e183a;

        }

        .box-search {
            background: rgb(41, 19, 65);
            background: linear-gradient(90deg, rgba(41, 19, 65, 1) 0%, rgba(33, 15, 52, 1) 49%, rgba(12, 0, 40, 1) 100%);

            display: flex;
            justify-content: center;
            gap: .1%;
            margin-top: 150px;
        }

        input.form-control {
            background-color: #1e0d39;
            border-color: #beadc1;
            outline: none;
            color: #cba8dc;

        }

        input.form-control:focus {
            background-color: #1e0d39;

            outline: none;
            color: #cba8dc;
            border-color: #cccccc;
            outline: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
        }
    </style>

    </html>