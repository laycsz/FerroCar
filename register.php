<?php
require_once('./crud/crudUsuario.php');
$usuario = new Usuarios('estacionamento', 'localhost', 'postgres', '0511');
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar</title>
  <link rel="icon" href="../assets/images/icon/parking (1).png">
  <link rel="stylesheet" href="assets/css/style_login.css">

</head>

<body>

  <?php

  if (isset($_POST['nome'])) {

    $nome = addslashes($_POST['nome']);

    $cpf = addslashes($_POST['cpf']);

    $email = addslashes($_POST['email']);

    $senha = addslashes($_POST['senha']);
    $acesso = addslashes($_POST['acesso']);


    if (!empty($nome) && !empty($cpf)  && !empty($email) && !empty($senha) && !empty($acesso))
    {
      if($usuario->msgErro == "")
      {

     
      if (!$usuario->cadastrarusuariologin($nome, $cpf, $email, $senha,  $acesso,))

       {
            // echo "email ja cadastrado";
            echo '<div class="msg-err">Usuario ja cadastrado</div>';
    }
    else

{
  echo '<div class="msg-sucess">Usuario cadastrado com sucesso</div>';
}
  
  
 
  }
  else
  {
    echo "Erro : . $usuario->msgErro";
  }
  }
}else{
  // echo '<div class="msg-err">Preencha todos os campos</div>';
}
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
  <div class="login-page">
    <div class="form">
      <form class="login-form" method="POST">

        <div class="input-group">
          <label class="label">Nome completo</label>
          <input autocomplete="off" name="nome" id="nome" class="input" type="text">
          <div></div>
        </div>

        <div class="input-group">
          <label class="label">Usuario</label>
          <input autocomplete="off" name="email" id="email" class="input" type="email">
          <div></div>
        </div>
        <div class="input-group">
          <label class="label">CPF</label>
          <input autocomplete="off" name="cpf" id="cpf" class="input" type="text" autocomplete="off" maxlength="14" onkeyup="mascara_cpf()">
          <div></div>
        </div>
        <div class="input-group">
          <label class="label">Senha</label>
          <input autocomplete="off" name="senha" id="senha" class="input" type="password">
          <div></div>
        </div>

        <div class="input-group">
          <br>
          <label for="">Acesso</label>
          <select name="acesso" id="acesso">
            <option value="" hidden>Selecione</option>
            <option value="Admin">Admin</option>
            <option value="Funcionario">Funcionario</option>
          </select>
          <div></div>
        </div>
        <button class="btn"> Enviar
        </button>

      </form>
      <a href="../index.php">
        <button>
          <span>Voltar</span>
        </button>
      </a>
    </div>
  </div>



  ?>
  <style>
    .msg-err{
      height: 30px;
      align-items: center;
      font-weight: 600;
      border-radius:8px;
      margin: auto;
      color: red;
      text-align: center;
  width: 420px;
  margin: 10px auto;
  padding: 10px;
  background-color: rgba(250, 128, 114, .3);
  border-radius: 1px solid rgb(165, 42, 42);

}
   .msg-sucess{
    text-align: center;
    color: whitesmoke;
  width: 420px;
  margin: 10px auto;
  background-color: rgba(50, 205, 50, .3);
  border-radius: 1px solid rgb(34, 139, 34);
}
    .usuario{
      color: red;
    }
    .input {
      max-width: 190px;
      height: 44px;
      background-color: #35114c;
      border-radius: .5rem;
      padding: 0 1rem;
      border: 2px solid transparent;
      font-size: 1rem;
      transition: border-color .3s cubic-bezier(.25, .01, .25, 1) 0s, color .3s cubic-bezier(.25, .01, .25, 1) 0s, background .2s cubic-bezier(.25, .01, .25, 1) 0s;
    }

    .label {
      display: block;
      margin-bottom: .3rem;
      font-size: .9rem;
      font-weight: bold;
      color: #b5a2c1;
      transition: color .3s cubic-bezier(.25, .01, .25, 1) 0s;
    }

    .input:hover,
    .input:focus,
    .input-group:hover .input {
      outline: none;
      border-color: #b5a2c1;
    }

    .input-group:hover .label,
    .input:focus {
      color: #b5a2c1;
    }

    select {
      color: #b5a2c1;
      background-color: #35114c;
      width: 120px;
      height: 30px;
      border: 2px solid transparent;
      border-radius: .5rem;
      box-shadow: #b5a2c1;
    }

    option {
      border: 2px solid transparent;
      border-radius: .5rem;
      background-color: #35114c;
      box-shadow: #b5a2c1;
    }

    body {
      margin: auto;
    }
  </style>

</body>

</html>