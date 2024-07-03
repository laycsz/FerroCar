<head>
<link rel="stylesheet" href="../assets/css/header.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<link rel="icon" href="../assets/images/icon/parking (1).png">
</head>
<header>
    <a href="../inc/home.php">
   <img class="img" src="../assets/images/icon/logo.png" alt="logo">
    </a>
      
        <nav>
            <ul class="nav-links">
            <li><a href="../clientes/register.php">Cadastro de Clientes</a></li>
                <li><a href="../veiculos/register.php">Cadastro de Veículos</a></li>
                <li><a href="../movimento/index.php">Entradas/Saídas</a></li>
                <li><a href="../relatorio/index.php">Relatórios</a></li>
                <li><a href="../veiculos/horarios.php">Horarios</a></li>
             
                <li><a href="../logout.php" class="login-btn">Sair</a></li>
            </ul>
            <div class="hamburger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </nav>
    </header>

    <script>document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');

    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
});
</script>
