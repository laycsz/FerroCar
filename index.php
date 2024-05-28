<?php
require_once './crud/classeindex.php';
$u = new Usuario;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
   <link rel="icon" href="../assets/images/icon/parking (1).png">
  <link rel="stylesheet" href="assets/css/style_login.css">
</head>

<body>
  <div class="login-page">
    <div class="form">
 
      <form class="login-form" method="POST" action="index.php">
        <div class="input-group">
          <label class="label">Usuario</label>
          <input autocomplete="off" name="email" id="senha" class="input" type="email">
          <div></div>
        </div>
        <div class="input-group">
          <label class="label">Senha</label>
          <input autocomplete="off" name="senha" id="senha" class="input" type="password">
          <div></div>
        </div>
        <button class="btn"> Enviar
        </button>
        <p class="message">Não tem conta? <a href="register.php">Crie agora</a></p>
      </form>
    </div>
  </div>
  <?php
  if (isset($_POST['email'])); {

    @$email = addslashes($_POST['email']);
    @$senha = addslashes($_POST['senha']);

    //verificar se esta preenchido
    if (!empty($email) && !empty($senha)) {
      $u->conectar('estacionamento', 'localhost', 'postgres', '0511');
      if ($u->msgErro == "") {

        if ($u->logar($email, $senha)) {
          header("location: home/index.php");
        }
          elseif($u->logarFuncionarios($email, $senha))
          {
                 header("location: home/home.php");
          }
        } else  {
          
  ?>
   <div class="msg-erro">
        erro
        </div>
          <div class="msg-erro">
          <?php echo "Erro: " . $u->msgErro; ?>
          </div>
        <?php
        }
      }
    }


  ?>
</body>

</html>

<style>
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
</style>