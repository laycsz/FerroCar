<?php

include '../inc/header.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/global.css">
  <link rel="stylesheet" href="/assets/css/home.css">
  <title>home</title>
</head>

<body>



  <div class="text-center">
    <div>
      <div>
        <div editable="rich">
          <p class="lead user-select-none">
          <div class="lead user-select-none">
          </p>

          </div>


        </div>


      </div>
    </div>
    <br>
    <br>
    <div class="text-align-center">
      <h1>Você está logado :)</h1>

      <br>
      <a href="../clientes/register.php">
        <h1>Cadastrar cliente</h1>
      </a>

    

      <br>
      <a href="../veiculos/register.php">
        <h3>Cadastrar veiculos</h3>
      </a>

    </div>

    <br>
    <br>





    <div class="container">

      <div class="card">
        <i class="bi bi-fullscreen-exit"></i>
        <span>Saida</span>
        <a href="../saida/index.php">
          <button class="cta">
            <span class="hover-underline-animation"> Saiba mais</span>
            <svg viewBox="0 0 46 16" height="100" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
              <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
            </svg>
          </button>
        </a>

      </div>
      <div class="card">
        <i class="bi bi-calendar4"></i>
        <span>Relatórios</span>
        <a href="../relatorio/index.php">
          <button class="cta">
            <span class="hover-underline-animation"> Saiba mais </span>
            <svg viewBox="0 0 46 16" height="100" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
              <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
            </svg>
          </button>
        </a>

      </div>
      <div class="card">
        <i class="bi bi-arrow-down-up"></i>
        <span>Movimento</span>
        <a href="../movimento/index.php">
          <button class="cta">
            <span class="hover-underline-animation"> Saiba mais </span>
            <svg viewBox="0 0 46 16" height="100" width="30" xmlns="http://www.w3.org/2000/svg" id="arrow-horizontal">
              <path transform="translate(30)" d="M8,0,6.545,1.455l5.506,5.506H-30V9.039H12.052L6.545,14.545,8,16l8-8Z" data-name="Path 10" id="Path_10"></path>
            </svg>
          </button>
        </a>


      </div>
      <div>

      </div>
    </div>
  </div>
  </div>
  </div>
  <style>
    
  </style>

  <?php
  include '../inc/footer.php';
  ?>

</body>




</html>