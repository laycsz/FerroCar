<?php

include '../inc/header.php';


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    .container {

      display: flex;
      align-items: center;
      justify-content: center;
      margin: auto;
    }

    .card {

      font-family: "Montserrat", sans-serif;
      margin: 2%;
      background: #30193f;
      width: 350px;
      height: 250px;
      box-shadow: 0 2px 3px 0px rgba(0, 0, 0, 0.25);
      border-radius: 10px;
      transition: .2s all;
      cursor: pointer;
      align-items: center;
      text-align: center;
      font-size: 20px;
      padding-top: 30px;
      margin-top: 200px;

    }

    .card>span {
      display: block;
      margin: auto;

    }

    .container:hover .card {
      filter: blur(3px);
      opacity: .5;
      transform: scale(.98);
      box-shadow: none;
    }

    .container:hover .card:hover {
      transform: scale(1);
      filter: blur(0px);
      opacity: 1;
      box-shadow: 0 8px 20px 0px rgba(0, 0, 0, 0.125);
      background: #402b4e;
      color: white;
    }

    .cta {
      margin-bottom: 10px;
      border: none;
      background: none;
    }

    .cta span {
      color: white;
      padding-bottom: 7px;
      letter-spacing: 4px;
      font-size: 14px;
      padding-right: 15px;
      text-transform: uppercase;
    }

    .cta svg {
      transform: translateX(-8px);
      transition: all 0.3s ease;
    }

    .cta:hover svg {
      transform: translateX(0);
    }

    .cta:active svg {
      transform: scale(0.9);
    }

    .hover-underline-animation {

      color: whitesmoke;
      padding-bottom: 20px;
    }

    .hover-underline-animation:after {
      content: "";

      width: 100%;
      transform: scaleX(0);
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: #ffff;
      transform-origin: bottom right;
      transition: transform 0.25s ease-out;
    }

    .cta:hover .hover-underline-animation:after {
      color: #30193f;
      transform: scaleX(1);
      transform-origin: bottom left;
    }
  </style>

  <?php
  include '../inc/footer.php';
  ?>

</body>




</html>