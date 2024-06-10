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
      
    <h1>Faça seu login</h1>
    
      <form class="login-form" method="POST" action="index.php">
        <div class="input-group">
          <label class="label">Usuario</label>
          <input class="input-form" autocomplete="off" name="email" id="senha" class="input" type="email">
          <div></div>
        </div>
        <div class="input-group" >
          <label class="label">Senha</label>
          <input class="input-form" autocomplete="off" name="senha" id="senha" class="input" type="password">
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
          header("location: inc/home.php");
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
