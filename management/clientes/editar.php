<?php
include_once '../../conexao/conexao.php';

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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Clientes</title>
    <link rel="icon" href="../../assets/images/icon/parking (1).png">
    <link rel="stylesheet" href="../../assets/css/editarclientes.css">
    <link rel="stylesheet" href="../../assets/css/global.css">
</head>
<body>
        <div class="container-editar">
            <h2 class="h2-edit-clie">Editar Clientes</h2>
            <form action="../../clientes/classe_cliente.php" method="POST" class="form-edit-clie">
                <div class="form-group">
                    <label class="label-edit-clie" for="cliente_id">ID Cliente</label>
                    <input class="input-edit-clie" type="text" readonly name="cliente_id" value="<?php if (isset($_GET['id'])) {
                                                                                                        echo $_GET['id'];
                                                                                                    } ?>">
                </div>
                <div class="form-group">
                    <label class="label-edit-clie" for="usua_nomeUpdate">Nome</label>
                    <input class="input-edit-clie" type="text" name="usua_nomeUpdate" value="<?php if (isset($infosUpdate['nome'])) {
                                                                                                    echo $infosUpdate['nome'];
                                                                                                } ?>">
                </div>
                <div class="form-group">
                    <label class="label-edit-clie" for="usua_cpfUpdate">CPF</label>
                    <input class="input-edit-clie" type="text" name="usua_cpfUpdate" value="<?php if (isset($infosUpdate['cpf'])) {
                                                                                                echo $infosUpdate['cpf'];
                                                                                            } ?>">
                </div>
                <div class="form-group">
                    <label class="label-edit-clie" for="usua_emailUpdate">Email</label>
                    <input class="input-edit-clie" type="text" name="usua_emailUpdate" value="<?php if (isset($infosUpdate['email'])) {
                                                                                                echo $infosUpdate['email'];
                                                                                            } ?>">
                </div>
                <div class="form-group">
                    <label class="label-edit-clie" for="usua_telefoneUpdate">Telefone</label>
                    <input class="input-edit-clie" type="text" maxlength="15" id="telefone" name="usua_telefoneUpdate" value="<?php if (isset($infosUpdate['telefone'])) {
                                                                                                            echo $infosUpdate['telefone'];
                                                                                                        } ?>">
                    <script>
                        $("#telefone").mask("(99) 99999-9999")
                    </script>
                </div>
                <div class="form-actions">
                <input class="button-editar" type="submit" value="Salvar">
                <input class="button-editar" type="reset" value="Resetar">
                <a href="../clientes/listar.php">
                     <input class="button-voltar"  value="Voltar">
                 </a>
              
            </div>
        </div>

</body>
</html>
