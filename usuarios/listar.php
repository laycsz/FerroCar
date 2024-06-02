<?php
require_once '../conexao/conexao.php';






?>
<head>
    <title>Listar Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="../assets/images/icon/parking (1).png">
    <link rel="stylesheet" href="../assets/css/listarusuario.css">
</head>
<body><div class="box-search">
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
                    <th class="th-clie-listar" scope="col">NOME</th>
                    <th class="th-clie-listar" scope="col">CPF</th>
                    <th class="th-clie-listar" scope="col">EMAIL</th>
    

                    <th scope="col">EDITAR</th>
                </thead>



                <tbody>
                    <?php

                    if (!empty($_GET['search'])) {
                        $data = $_GET['search'];
                        $query_usuarios = "SELECT * FROM usuariologin WHERE nome LIKE '%$data%' or nome LIKE  '%$data%'  ORDER BY id_login DESC ";
                    } else {
                        $query_usuarios = "SELECT * FROM usuariologin ORDER BY id_login DESC";
                    }
                    $result_usuarios = $conn->prepare($query_usuarios);
                    //  $result_usuarios->bindParam(':cliente_id', $data, PDO::PARAM_STR);




                    $result_usuarios->execute();
                    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                        //var_dump($row_usuario);
                        extract($row_usuario);
                        echo "<td>  $id_login</td>";
                        echo "<td>  $nome</td>";
                        echo "<td>  $cpf</td>";
                        echo "<td>  $email</td>";
            

                        echo "<td><a href='../usuarios/editar.php?id= $id_login'><i class='bi bi-pencil'></i></a>";
                        echo "</tr>";
                    }
                    ?>
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
        window.location = '../usuarios/listar.php?search=' + search.value;
    }
</script>
</body>
<style>
 

</style>

</html>