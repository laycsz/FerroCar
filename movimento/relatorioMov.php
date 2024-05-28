<?php

include '../conexao/conexao.php';
date_default_timezone_set("America/Sao_Paulo");
?>


<head>
    <title>Relatorios</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="../assets/images/icon/parking (1).png">
    <link rel="icon" href="../assets/images/icon/parking (1).png">
</head>

<body>
    ><div class="box-search">
    <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
    <button onclick="searchData()" class="btn btn-dark">
        <i class="bi bi-search"></i>
    </button>
</div>
    <p id="horario"><?php echo date("d/m/Y H:i:s");  ?></p>
    <script>
        // var apHorario = document.getElementById("horario");
        function atualizarHorario() {
            var data = new Date().toLocaleString("pt-br", {
                timeZone: "America/Sao_Paulo"
            });
            // var formatarData = data.replace(",", " - ");
            // apHorario.innerHTML = formatarData;
            document.getElementById("horario").innerHTML = data.replace(",", " - ");
        }
        setInterval(atualizarHorario, 1000);
    </script>


    <?php
    $sql = "SELECT * FROM movimento ORDER BY hr_saida ASC";

    $result = $conn->query($sql);

    ?>
    <br><br><br><br><br><br><br>
    <div class="tabela">

        <table class="table">

            <thead>

                <th scope="col">ID</th>

                <th scope="col">Placa</th>

                <th scope="col">Cliente</th>

                <th scope="col">Modelo</th>

                <th scope="col">Cor</th>

                <th scope="col">Vaga</th>

                <th scope="col">Categoria</th>



                <th scope="col">Entrada</th>

                <th scope="col">Saida</th>
                <th scope="col">Valor</th>



            </thead>
            <tbody>

                <?php

                if (!empty($_GET['search'])) {
                        $data = $_GET['search'];
                        $query_usuarios = "SELECT * FROM movimento WHERE placas LIKE '%$data%' or placas LIKE  '%$data%' or categoria LIKE  '%$data%'  ORDER BY id DESC ";
                    } else {
                        $query_usuarios = "SELECT * FROM movimento ORDER BY id DESC";
                    }
                    $result_usuarios = $conn->prepare($query_usuarios);
                    //  $result_usuarios->bindParam(':cliente_id', $data, PDO::PARAM_STR);




                    $result_usuarios->execute();
                    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                        //var_dump($row_usuario);
                        extract($row_usuario);
                        echo "<td>  $id</td>";
                        echo "<td>  $placas</td>";
                        echo "<td>  $nome</td>";
                        echo "<td>  $modelo</td>";
                        echo "<td>  $cor</td>";
                        echo "<td>  $vaga</td>";
                        echo "<td>  $categoria</td>";
                        echo "<td>  $hr_entrada</td>";
                        echo "<td>  $hr_saida</td>";
                        echo "<td> R$  $valor,00</td>";

                      
                        echo "</tr>";
                    }
                ?>

            </tbody>

        </table>

    </div><!-- fechamento da div tabela -->
</body>

    <script>
    var search = document.getElementById('pesquisar');
    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            searchData();
        }
    });



    function searchData() {
        window.location = '../movimento/relatorio.php?search=' + search.value;
    }
</script>
<style>
    .box-search{
  border-radius: 30px;
  background: rgb(41, 19, 65);
  background: linear-gradient(90deg, rgba(41, 19, 65, 1) 0%, rgba(33, 15, 52, 1) 49%, rgba(12, 0, 40, 1) 100%);

  display: flex;
  justify-content: center;
  gap: .1%;
  margin-top: 150px;
}
input.form-control{
    height: 35px;
    width: 200px;
  background-color: #1e0d39;
  border-color: #beadc1;
  outline: none;
  color: #cba8dc;
  border-radius: 20px;

}
.btn-dark{
    border-color:#3a1c78 ;
    width: 30px;
    border-radius:20px ;
  background-color: #3a1c78;
  border-width: 1px;
}
.btn-dark:hover{
  background-color: #261250;
}
input.form-control:focus{
  background-color: #1e0d39;

  outline: none;
  color: #cba8dc;
  border-color: #cccccc;
outline: 0;
-webkit-box-shadow: none;
    box-shadow: none;
}
    body {

        background: rgb(41, 19, 65);
        background: linear-gradient(90deg, rgba(41, 19, 65, 1) 0%, rgba(33, 15, 52, 1) 49%, rgba(12, 0, 40, 1) 100%);

        font-family: sans-serif;
        font-weight: 100;
    }

    #horario {
        font-family: 'Courier New', Courier, monospace;
        text-align: center;
        color: white;
    }

    table {

        font-family: Arial, Helvetica, sans-serif;

        margin: auto;
        text-align: center;
        width: 950px;
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
</style>