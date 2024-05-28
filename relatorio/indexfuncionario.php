<?php
include '../inc/headerr.php';

?>

<body>
    <br>
    <br>
    <br>
    <br>
    <br>

    <h2>
        Visualize os relatórios:
    </h2>
    <div class="card-group">
        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Relatório de clientes</h5>
                <br>
                <p class="card-text">Acesse as informações de cada cliente.</p>
                <br>
                <a href="../clientes/listarClientes.php">
                    <button class="cta">
                        <span>Acessar</span>
                        <svg viewBox="0 0 13 10" height="10px" width="15px">
                            <path d="M1,5 L11,5"></path>
                            <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Relatório de veículos</h5>
                <br>
                <p class="card-text">Acesse as informações de cada veículo.</p>
                <br>
                <a href="../veiculos/listarVeiculos.php">
                    <button class="cta">
                        <span>Acessar</span>
                        <svg viewBox="0 0 13 10" height="10px" width="15px">
                            <path d="M1,5 L11,5"></path>
                            <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Relatório de usuário</h5>
                <br>
                <p class="card-text">Acesse as informações de cada usuário.</p>
                <br>
                <a href="../usuarios/listarUsuarios.php">
                    <button class="cta">

                        <span>Acessar</span>
                        <svg viewBox="0 0 13 10" height="10px" width="15px">
                            <path d="M1,5 L11,5"></path>
                            <polyline points="8 1 12 5 8 9"></polyline>
                        </svg>
                    </button>
                </a>

            </div>
        </div>
    </div>
    <br>
    <br>
    <a href="../movimento/relatorioMov.php">
        <h3>relatórios de movimentos</h3>
    </a>
    <a href="../movimento/relatoriodatasS.php">
        <h3>relatórios de movimentos por data</h3>
    </a>


    <?php

    include '../inc/footer.php';

    ?>
</body>
<style>
    .card-group {
        margin-top: 100px;
        margin: auto;
        width: 50%;
        gap: 0.5rem;
        height: 370px;

    }

    .card {
        border-radius: 10px;



        font-size: 20px;
        color: white;
        background-color: #2e1d40;
    }

    h2 {

        margin-bottom: 100px;
        color: white;
        text-align: center;

    }

    .card-title {
        font-family: Arial, Helvetica, sans-serif
    }

    .cta {
        position: relative;
        margin: auto;
        padding: 12px 18px;
        transition: all 0.2s ease;
        border: none;
        background: none;
    }

    .cta:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        border-radius: 50px;
        background: #0B0524;
        width: 45px;
        height: 45px;
        transition: all 0.3s ease;
    }

    .cta span {

        position: relative;
        bottom: 5px;

        font-size: 18px;

        letter-spacing: 0.05em;
        color: #967fa5;
    }

    .cta svg {
        position: relative;
        top: 0;
        margin-left: 10px;
        fill: none;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke: #0B0524;
        stroke-width: 2;
        transform: translateX(-5px);
        transition: all 0.3s ease;
    }

    .cta:hover:before {
        width: 100%;
        background: #1b0c3e;
    }

    .cta:hover svg {
        transform: translateX(0);
    }

    .cta:active {
        transform: scale(0.95);
    }

    a {
        text-align: center;
    }
</style>