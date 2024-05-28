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
      // 
        


  ?>
  <div class="login-box">
    <h2 class="h2-clie-register">Cadastrar Clientes</h2>
    <form method="POST" action="../clientes/register.php ">
      <input type="hidden" name="acao" value="cadastrar">
      <div class="user-box">
        <input type="text" name="nome">
        <label class="label-regis-clie">Nome do cliente:</label>
      </div>
      <div class="user-box">
        <input type="text" name="cpf" id="cpf" autocomplete="off" maxlength="14" onkeyup="mascara_cpf()">
        <label class="label-regis-clie">Cpf do Cliente:</label>
      </div>
      <div class="user-box">
        <input type="email" name="email">
        <label class="label-regis-clie">Email do Cliente:</label>
      </div>
      <div class="user-box">
        <input type="text" name="telefone" id="telefone" maxlength="15">
        <label class="label-regis-clie">telefone do Cliente:</label>
      </div>

      <label class="label-regis-clie">Hora Entrada: </label>
      <input type="time" name="entrada" id="entrada" value="<?php $hora = date('H:i:s');

                                                            echo $hora; ?>">


      <label class="label-regis-clie">Saida: </label>

      <input type="time" name="saida" id="saida" value="<?php $hora = date('H:i:s');
                                                        echo $hora; ?>">





      <script>
        $("#telefone").mask("(99) 99999-9999")
      </script>



      <a href="#">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <input class="botao" type="submit" value="cadastrar" onclick="validarCpf()">
      </a>
      <br>
      <br>


      </a>
    </form>
  </div>



</body>

</html>

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
</style>



</body>

</html>