<?php
include '../inc/headerr.php'

?>

<body>
  <div class="text-center">
    <h4>Confira o horário de funcionamento:</h4>
  </div>

  <br>
  <table class="table-horario table-borderless">
    <thead>
    <tr>
        <th class="th-horario" scope="col">Valor</th>


        <td class="td-horario" scope="col">R$5,00/hr</th>
      <tr>
        <th class="th-horario" scope="col">Domingo</th>


        <td class="td-horario" scope="col"> 24hr</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="th-horario" scope="row">Segunda</th>

        <td class="td-horario">24hr</td>
      </tr>
      <tr>
        <th class="th-horario" scope="row">Terça</th>

        <td class="td-horario">24hr</td>
      </tr>
      <tr>
        <th class="th-horario" scope="row">Quarta</th>

        <td class="td-horario">24hr</td>
      </tr>
      <tr>
        <th class="th-horario" scope="row">Quinta</th>

        <td class="td-horario">24hr</td>
      </tr>
      <tr>
        <th class="th-horario" scope="row">Sexta</th>

        <td class="td-horario">24hr</td>
      </tr>
      <tr>
        <th class="th-horario" scope="row">Sabado</th>

        <td class="td-horario">24hr</td>
      </tr>
    </tbody>
  </table>
  <br>
  <br>
  <a href="../home/home.php">
    <button class="button">
      <span>Voltar</span>
    </button>
  </a>
  </div>
  <?php
  include '../inc/footer.php'
  ?>
</body>

<style>
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
    font-weight: 300;
    font-size: 18px;
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