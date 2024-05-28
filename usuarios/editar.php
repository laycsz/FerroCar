<?php
include_once '../conexao/conexao.php';
include '../inc/header.php';


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (isset($_GET['id'])) {
    if (isset($_GET['id'])) {
        $id_login = $_GET['id'];
    }

    $busca = "SELECT * FROM usuariologin WHERE id_login = '$id_login'";
    $stmt2 = $conn->query($busca);
    $infosUpdate = $stmt2->fetch(PDO::FETCH_ASSOC);
}
?>


<body>



    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="editar_usuario">
                <br><br>
                <h2>Editar Clientes</h2>
                <br>
                <form action="" method="POST">
                    <label for="">ID Usuario</label>
                    <input type="text" readonly name="id_login" value="<?php if (isset($_GET['id'])) {
                                                                            echo $_GET['id'];
                                                                        } ?>">
                    <br><br>
                </form>
                <form action="../usuarios/classe_usuarios.php" method="POST">
                    <label for="">Nome</label>
                    <input type="text" name="usua_nomeUpdate" value="<?php if (isset($infosUpdate['nome'])) {
                                                                            echo $infosUpdate['nome'];
                                                                        } ?>">
                    <input type="text" hidden name="id_login" value="<?php if (isset($_GET['id'])) {
                                                                            echo $_GET['id'];
                                                                        } ?>">



                    <label for="">CPF</label>
                    <input type="text" name="usua_cpfUpdate" value="<?php if (isset($infosUpdate['cpf'])) {
                                                                        echo $infosUpdate['cpf'];
                                                                    } ?>">
                    <label for="">Email</label>
                    <input type="text" name="usua_emailUpdate" value="<?php if (isset($infosUpdate['email'])) {
                                                                            echo $infosUpdate['email'];
                                                                        } ?>">
                    <label for="">Acesso</label>
                    <input type="text" name="usua_acessoUpdate" value="<?php if (isset($infosUpdate['acesso'])) {
                                                                            echo $infosUpdate['acesso'];
                                                                        } ?>">
                    <br><br>
                    <input type="submit">
                    <input type="reset">

                </form>

            </div><!-- fechamento da div editar_usuario-->

            <br>
            <div class="voltar_usuarios">
                <a href="<?php BASEURL ?>/usuarios/listar.php" class="box_a">

                    <p class="box_text">VOLTAR</p>
                </a>
            </div>

</body>
<style>
    h2 {
        margin-top: 30px;
    }

    body {
        text-align: center;
        color: white;
    }

    input {

        width: 150px;
        border-radius: 10px;
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap');
        font-family: 'Quicksand', sans-serif;
        font-family: Arial, Helvetica, sans-serif;
        color: black;
        font-size: 15px;
        font-weight: 400;
    }

    label {
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap');
        font-family: 'Quicksand', sans-serif;
        font-size: 14px;
    }

    button {
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap');
        font-family: 'Quicksand', sans-serif;
        border-radius: 10px;
        color: black;
        font-weight: 600;
        width: 90px;
    }
</style>


</html>