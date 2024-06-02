<head>
<link rel="stylesheet" href="../assets/css/header.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

</head>
<header>
    <a href="../home/index.php">
    <div class="logo">Ferocar</div>
    </a>
      
        <nav>
            <ul class="nav-links">
            <li><a href="../clientes/register.php">Incluir Clientes</a></li>
                <li><a href="../veiculos/register.php">Incluir Veículos</a></li>
                <li><a href="../movimento/index.php">Incluir Entrada e Saída de veículos</a></li>
                <li><a href="../relatorio/index.php">Relatórios</a></li>
                <li><a href="../veiculos/horarios.php">Horario de funcionamento</a></li>
             
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
