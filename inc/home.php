<?php

include '../inc/header.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <title>Gestão de Estacionamento</title>


    <link rel="icon" href="../assets/images/icon/parking (1).png">
    <script defer>
        document.addEventListener('DOMContentLoaded', () => {
            const clientCountElement = document.getElementById('client-count');
            const vehicleCountElement = document.getElementById('vehicle-count');

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

            fetchCount('../clientes/get_client_count.php', clientCountElement);
            fetchCount('../veiculos/get_vehicle_count.php', vehicleCountElement);
            setInterval(() => fetchCount('../clientes/get_client_count.php', clientCountElement), 5000);
            setInterval(() => fetchCount('../veiculos/get_vehicle_count.php', vehicleCountElement), 5000);
        });
    </script>
</head>

<body>


<section class="hero">
        <div class="hero-content">
            <h1>Explore a Gestão Inteligente de Estacionamento</h1>
            <p>Otimize e simplifique o gerenciamento do seu estacionamento com nosso sistema inovador e eficiente.</p>
            <a href="#about" class="btn">Saiba Mais</a>
            
        </div>
    </section>
        </div>
    </section>
    <section id="about" class="about">
        <h2>Sobre o Estacionamento</h2>
        <p>
            Bem-vindo ao nosso sistema de gestão de estacionamento, onde a tecnologia se encontra com a eficiência para proporcionar a melhor experiência aos nossos clientes. Nosso estacionamento é meticulosamente projetado para oferecer segurança, conveniência e facilidade de uso.
        </p>
        <p>
            Nossa missão é proporcionar um ambiente seguro e organizado para seus veículos, facilitando o acesso e otimizando o tempo dos nossos clientes. Estamos comprometidos em manter um padrão de excelência através de um atendimento ágil e personalizado.
        </p>
    </section>

    <h2 class="h2st">Estatisticas</h2>
    <section class="statistics">
          
        <div class="stat-card">
      
            <h3>Vagas Disponíveis</h3>
            <p class="stat-number">40</p>
        </div>
        <div class="stat-card">
            <h3>Clientes Cadastrados</h3>
            <p id="client-count" class="stat-number">0</p>
        </div>
        <div class="stat-card">
            <h3>Veículos Registrados</h3>
            <p id="vehicle-count" class="stat-number">0</p>
        </div>
    </section>


    <section class="testimonials">
        <h2>O que nossos clientes dizem</h2>
        <div class="testimonial">
            <p>"Excelente sistema de gestão, super fácil de usar!"</p>
            <span>- João Silva</span>
        </div>
        <div class="testimonial">
            <p>"Melhorou muito a organização do meu estacionamento."</p>
            <span>- Maria Oliveira</span>
        </div>
        
    </section>

 
</body>

</html>

<?php
include '../inc/footer.php';
?>

<style>
 
</style>