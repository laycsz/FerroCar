<head>
<link rel="stylesheet" href="../assets/css/navbar.css">
</head>
<header>
        <div class="logo">LOGO</div>
        <nav>
            <ul class="nav-links">
                <li><a href="../veiculos/horarios.php">Horarios</a></li>
                <li><a href="#">Usuários</a></li>
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