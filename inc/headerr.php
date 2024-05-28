<?php
require '../config/config.php';
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ferrocar</title>
  <link rel="icon" href="../assets/images/icon/parking (1).png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php BASEURL ?>/assets/css/style.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="<?php BASEURL ?>/assets/css/style_button.css" media="screen" />
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Ropa+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Hind+Guntur:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand+SC&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Anek+Gujarati&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">

</head>

<body>
  <header id="navbar">

    <nav class="navbar-container container">
      <a href="<?php BASEURL ?>/home/home.php" class="home-link">
        <div class="">
          <i class="bi bi-car-front"></i>
        </div>
        Ferrocar
      </a>
      <button type="button" id="navbar-toggle" aria-controls="navbar-menu" aria-label="Toggle menu" aria-expanded="false">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div id="navbar-menu" aria-labelledby="navbar-toggle">
        <ul class="navbar-links">

        <li class="navbar-item"><a class="navbar-link" href="<?php BASEURL ?>/veiculos/horarios.php">Horarios</a></li>
          <li class="navbar-item"><a class="navbar-link" href="<?php BASEURL ?>/logout.php">Sair</a></li>
        </ul>
      </div>
    </nav>
  </header>