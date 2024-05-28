<?php

include '../conexao/conexao.php';
date_default_timezone_set("America/Sao_Paulo");
?>


<head>
  <title>Saida veiculos</title>
  <link rel="icon" href="../assets/images/icon/parking (1).png">
</head>

<body>

  <br><br>
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
  <br>
  <a href="../home/home.php">
    <button>
      <span>Voltar</span>
    </button>
  </a>

  <?php
  $sql = "SELECT * FROM movimento LEFT JOIN clientes ON movimento.nome = clientes.nome WHERE  hr_saida is null and  clientes.nome is not null ORDER BY hr_saida is null DESC, clientes.saida";

  $result = $conn->query($sql);

  ?>
  <br><br><br><br><br><br><br>
  <div class="tabela">

    <table class="table">

      <thead>



        <th scope="col">Placa</th>

        <th scope="col">Cliente</th>

        <th scope="col">Modelo</th>

        <th scope="col">Cor</th>

        <th scope="col">Vaga</th>

        <th scope="col">Categoria</th>



        <th scope="col">Entrada</th>

        <th scope="col">Saída Prevista</th>





      </thead>
      <tbody>

        <?php

        while ($infos = $result->fetch(PDO::FETCH_ASSOC)) {

          echo "<tr>";


          echo "<td>" . $infos['placas'] . "</td>";

          echo "<td>" . $infos['nome'] . "</td>";


          echo "<td>" . $infos['modelo'] . "</td>";

          echo "<td>" . $infos['cor'] . "</td>";
          echo "<td>" . $infos['vaga'] . "</td>";

          echo "<td>" . $infos['categoria'] . "</td>";



          echo "<td>" . $infos['hr_entrada'] . "</td>";

          echo "<td>" . $infos['saida'] . "</td>";

       

          echo "</tr>";
        }

        ?>

      </tbody>

    </table>


  </div>
  <!-- fechamento da div tabela -->
</body>
<style>
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

  button {

    margin: auto;
    position: relative;

    padding: 0.8em 1em;
    outline: none;
    text-decoration: none;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    border: none;
    text-transform: uppercase;
    background-color: #1c052b;
    border-radius: 10px;
    color: #fff;

    font-size: 12px;
    font-family: inherit;
    z-index: 0;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.02, 0.01, 0.47, 1);
  }

  button:hover {
    animation: sh0 0.5s ease-in-out both;
  }

  @keyframes sh0 {
    0% {
      transform: rotate(0deg) translate3d(0, 0, 0);
    }

    25% {
      transform: rotate(7deg) translate3d(0, 0, 0);
    }

    50% {
      transform: rotate(-7deg) translate3d(0, 0, 0);
    }

    75% {
      transform: rotate(1deg) translate3d(0, 0, 0);
    }

    100% {
      transform: rotate(0deg) translate3d(0, 0, 0);
    }
  }

  button:hover span {
    outline: none;
    animation: storm 0.7s ease-in-out both;
    animation-delay: 0.06s;
  }

  button::before,
  button::after {
    content: '';
    position: absolute;
    right: 0;
    bottom: 0;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: #fff;
    opacity: 0;
    transition: transform 0.15s cubic-bezier(0.02, 0.01, 0.47, 1), opacity 0.15s cubic-bezier(0.02, 0.01, 0.47, 1);
    z-index: -1;
    transform: translate(100%, -25%) translate3d(0, 0, 0);
  }

  button:hover::before,
  button:hover::after {
    opacity: 0.15;
    transition: transform 0.2s cubic-bezier(0.02, 0.01, 0.47, 1), opacity 0.2s cubic-bezier(0.02, 0.01, 0.47, 1);
  }

  button:hover::before {
    transform: translate3d(50%, 0, 0) scale(0.9);
  }

  button:hover::after {
    transform: translate(50%, 0) scale(1.1);
  }
</style>