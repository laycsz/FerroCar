<?php

include '../inc/header.php';
require_once '../crud/crud-clientes.php';
date_default_timezone_set("America/Sao_Paulo");

$p = new Clientes('estacionamento', 'localhost', 'postgres', '0511');
$sql = "SELECT * FROM clientes ORDER BY nome DESC";
?>


<script>
  function mascara_cpf() {
    var cpf = document.getElementById('cpf')
    if (cpf.value.length == 3 || cpf.value.length == 7) {
      cpf.value += "."
    } else if (cpf.value.length == 11) {
      cpf.value += "-"
    }
  }
 
</script>
<script>
  $(document).ready(function(){
  $('#telefone').mask('(99) 99999-9999');
});

</script>

<body>
  <?php
  if (isset($_POST['cpf'])) {
    $nome = addslashes($_POST['nome']);
    $cpf = addslashes($_POST['cpf']);
    $email = addslashes($_POST['email']);
    $telefone = addslashes($_POST['telefone']);
    $entrada = addslashes($_POST['entrada']);
    $saida = addslashes($_POST['saida']);

    if (!empty($nome) && !empty($cpf)  && !empty($email)  && !empty($telefone) && !empty($entrada)  && !empty($saida) && !empty($saida)){

      if($p->msgErro == "")
      {
        if (!$p->cadastrarClientes($nome, $cpf, $email, $telefone, $entrada, $saida)) 
        {
          echo '<div class="msg-err">Cliente ja cadastrado</div>';
        }
        else
        {
            echo '<div class="msg-sucess">Cliente cadastrado com sucesso</div>';
        }
      }
      else{
        echo "Erro : . $p->msgErro";
    }

  }

    }
        


  ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/registerclient.css">
</head>
<body>

    <main>
        <div class="container">
            <div class="login-box">
                <h2>Cadastrar Clientes</h2>
                <form  method="post" action="../clientes/register.php" onsubmit="return validarCpf()">
                    <div class="user-box">
                        <label for="nome">Nome do cliente:</label>
                        <input type="text" id="nome" name="nome"   required>
                    </div>
                    <div class="user-box">
                        <label for="cpf">Cpf do Cliente:</label>
                        <input type="text" id="cpf" name="cpf"  maxlength="14" onkeyup="mascara_cpf()">
                    </div>
                    <div class="user-box">
                        <label for="email">Email do Cliente:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="user-box">
                        <label>Telefone do Cliente:</label>
                        <input type="text" id="telefone" name="telefone">
                    </div>
                    <div class="user-box">
                        <label for="entrada" class="label-entrada-clie">Hora Entrada:</label>
                        <input class="horarioentrada" type="time" id="entrada" name="entrada" required>
                    </div>
                    <div class="user-box">
                        <label for="saida" class="label-saida-clie">Saída Prevista:</label>
                        <input class="horariosaida" type="time" id="saida" name="saida" required>
                    </div>
                    <button class="btn" type="submit" value="cadastrar">Cadastrar</button>
                </form>
            </div>
        </div>
    </main>
   
</body>
</html>

      <?php
include '../inc/footer.php';  
      ?>

  
