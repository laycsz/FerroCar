<?php
include_once '../conexao/conexao.php';
include '../inc/header.php';


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (isset($_GET['id'])) {
    if (isset($_GET['id'])) {
        $cliente_id = $_GET['id'];
    }

    $busca = "SELECT * FROM clientes WHERE cliente_id = '$cliente_id'";
    $stmt2 = $conn->query($busca);
    $infosUpdate = $stmt2->fetch(PDO::FETCH_ASSOC);
}
?>


<body class="body-edit-clie">



    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="editar_usuario">
                <br><br>
                <h2 class="h2-edit-clie">Editar Clientes</h2>
                <br>
                <form action="" method="POST">
                    <label class="label-edit-clie" for="">ID Cliente</label>
                    <input class="input-edit-clie" type="text" readonly name="cliente_id" value="<?php if (isset($_GET['id'])) {
                                                                                                        echo $_GET['id'];
                                                                                                    } ?>">
                    <br><br>
                </form>
                <form action="../clientes/classe_cliente.php" method="POST">
                    <label class="label-edit-clie" for="">Nome</label>
                    <input class="input-edit-clie" type="text" name="usua_nomeUpdate" value="<?php if (isset($infosUpdate['nome'])) {
                                                                                                    echo $infosUpdate['nome'];
                                                                                                } ?>">
                    <input class="input-edit-clie" type="text" hidden name="cliente_id" value="<?php if (isset($_GET['id'])) {
                                                                                                    echo $_GET['id'];
                                                                                                } ?>">



                    <label class="label-edit-clie" for="">CPF</label>
                    <input class="input-edit-clie" type="text" name="usua_cpfUpdate" value="<?php if (isset($infosUpdate['cpf'])) {
                                                                                                echo $infosUpdate['cpf'];
                                                                                            } ?>">
                    <label class="label-edit-clie" for="">Email</label>
                    <input class="input-edit-clie" type="text" name="usua_emailUpdate" value="<?php if (isset($infosUpdate['email'])) {
                                                                            echo $infosUpdate['email'];
                                                                        } ?>">
                    <label class="label-edit-clie" for="">Email</label>
                    <input  class="input-edit-clie" type="text" maxlength="15" id="telefone" name="usua_telefoneUpdate" value="<?php if (isset($infosUpdate['telefone'])) {
                                                                                                            echo $infosUpdate['telefone'];
                                                                                                        } ?>">
                    <script>
                        $("#telefone").mask("(99) 99999-9999")
                    </script>
                    <br><br>
                    <input class="input-edit-clie" type="submit">
                    <input class="input-edit-clie" type="reset">

                </form>

            </div><!-- fechamento da div editar_usuario-->

            <br>
            <div class="voltar_usuarios">
                <a href="<?php BASEURL ?>/clientes/listar.php" class="box_a">

                    <p class="box_text">VOLTAR</p>
                </a>
            </div>

</body>


</html>