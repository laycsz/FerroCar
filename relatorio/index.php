<?php


include '../inc/header.php'

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Relatórios</title>
  <link rel="stylesheet" href="../assets/css/relatorio.css">
  <!-- Inclua o jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Inclua o jQuery Mask Plugin -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>

  <main>
    <section class="hero">
      <div class="hero-content">
        <h1>Relatórios de Gestão</h1>
        <p>Veja os relatórios detalhados sobre veículos, clientes, usuários e movimentação.</p>
      </div>
    </section>

    <section class="report-section">
      <div class="container">
        <div class="report-card">
          <h3>Veículos Cadastrados</h3>
          <p class="numbers" id="vehicle-count">0</p>
          <a href="../management/veiculos/listar.php">
          <h1 class="detalhes">Ver detalhes</h1>
          </a>
         
        </div>
        <div class="report-card">
          <h3>Clientes Cadastrados</h3>
          <p id="client-count">0</p>
          <a href="../management/clientes/listar.php">
          <h1 class="detalhes">Ver detalhes</h1>
          </a>
        </div>
        <div class="report-card">
          <h3>Usuários Cadastrados</h3>
          <p id="user-count">0</p>
          <a href="../management/usuarios/listar.php">
          <h1 class="detalhes">Ver detalhes</h1>
          </a>
        </div>
        <div class="report-card">
          <h3>Movimentação</h3>
          <p id="movement-count">0</p>
          <a href="../movimento/relatorio.php">
          <h1 class="detalhes">Ver detalhes</h1>
          </a>
        </div>
      </div>
    </section>

  </main>

  <script src="assets/js/scripts.js"></script>
</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', () => {
            const clientCountElement = document.getElementById('client-count');
            const vehicleCountElement = document.getElementById('vehicle-count');
            const userCountElement = document.getElementById('user-count')
            const movCountElement = document.getElementById('movement-count')

            async function fetchCount(url, element) {
                try {
                    const response = await fetch(url);
                    const data = await response.json();
                    console.log('Count response:', data);
                    element.textContent = data.count;
                } catch (error) {
                    console.error('Error:', error);
                }
            }

            fetchCount('../../management/clientes/get_client_count.php', clientCountElement);
            fetchCount('../../management/veiculos/get_vehicle_count.php', vehicleCountElement);
            fetchCount('../../management/usuarios/get_user_count.php', userCountElement);
            fetchCount('../movimento/get_mov_count.php', movCountElement);
            setInterval(() => fetchCount('../../management/clientes/get_client_count.php', clientCountElement), 5000);
            setInterval(() => fetchCount('../../management/veiculos/get_vehicle_count.php', vehicleCountElement), 5000);
            setInterval(() => fetchCount('../../management/usuarios/get_user_count.php', userCountElement), 5000);
            setInterval(() => fetchCount('../movimento/get_mov_count.php', movCountElement), 5000);
});

</script>

<?php
include '../inc/footer.php'
?>