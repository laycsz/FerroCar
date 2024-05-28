<?php

include '../inc/header.php';
include '../conexao/conexao.php';
include '../crud/crud-veiculos.php';
$p = new Veiculos('estacionamento', 'localhost', 'postgres', '0511');
?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>

    <?php

    if (isset($_POST['placas'])) {
        $placas = addslashes($_POST['placas']);
        $cor = addslashes($_POST['cor']);
        $modelo = addslashes($_POST['modelo']);
        $categoria = addslashes($_POST['categoria']);
        $veic_clie_id = addslashes($_POST['veic_clie_id']);






        if (!empty($placas) && !empty($cor)  && !empty($modelo)  && !empty($categoria) && !empty($veic_clie_id)) {
            if ($p->msgErro == "") {


                if (!$p->cadastrarVeiculos($placas, $cor, $modelo, $categoria, $veic_clie_id)) {
                    echo '<div class="msg-err">Veiculo ja cadastrado</div>';
                } else {
                    echo '<div class="msg-sucess">Veiculo cadastrado com sucesso</div>';
                }
            } else {
                echo "Erro : . $p->msgErro";
            }
        }
    }

    ?>

    <div class="login-box">
        <form method="POST" action="">

            <h2 class="h2-register-veic">Cadastrar Veiculo</h2>
            <div class="user-box">
                <input type="text" name="placas" id="placas" id="placas">
                <label class="label-register-veic">Placa do veiculo:</label>
            </div>
            <div class="user-box">
                <input type="text" name="cor" id="cor">
                <label class="label-register-veic">Cor do veiculo:</label>
            </div>
            <div class="user-box">
                <input type="text" name="modelo" id="modelo">
                <label class="label-register-veic">Modelo do veiculo:</label>
            </div>
            <div class="select">
                <label class="label-register-veic" for="cars">Categoria de veiculo:</label>


                <select name="categoria" id="cars">
                    <option class="option" value="carro grande">Carro grande</option>
                    <option class="option" value="carro medio">Carro médio</option>
                    <option class="option" value="carro pequeno">Carro pequeno</option>
                    <option class="option" value="moto">Moto</option>
                </select>
            </div>
            <br>
            <div class="select">

                <label class="label-register-veic" for="option">Cliente:</label>
                <select name="veic_clie_id" id="veic_clie_id">
                    <?php
                    $query = $conn->query("SELECT nome from clientes order by nome desc ");

                    $registros = $query->fetchAll(pdo::FETCH_ASSOC);
                    foreach ($registros as $option) {


                    ?>
                        <option value="<?php echo $option['nome']  ?>"><?php echo $option['nome'] ?> </option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <br>

            <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <input class="botao" type="submit" value="Cadastrar" name="CadUsuario">
            </a>

        </form>

    </div>

    <script>
        $("#placas").mask("aaa-9999")
    </script>


</body>


<style>
    select {
        font-weight: 700;
        font-size: 20px;
        border-radius: 10px;

    }

    option {
        font-weight:700;
        font-size: 20px;
    }

    .msg-err {

        height: 30px;
        align-items: center;
        font-weight: 600;
        border-radius: 8px;
        margin: auto;
        color: red;
        text-align: center;
        width: 420px;
        margin: 10px auto;
        padding: 10px;
        background-color: rgba(250, 128, 114, .3);
        border-radius: 1px solid rgb(165, 42, 42);

    }

    .msg-sucess {
        text-align: center;
        color: whitesmoke;
        width: 420px;
        margin: 10px auto;
        background-color: rgba(50, 205, 50, .3);
        border-radius: 1px solid rgb(34, 139, 34);
    }

    .login-box {

        margin-top: 70px;

        display: flex !important;
        flex-wrap: wrap;

        justify-content: center;
        gap: 1rem;
    }
</style>

</html>