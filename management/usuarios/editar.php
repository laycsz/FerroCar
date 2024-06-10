<?php
include_once '../../conexao/conexao.php';

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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuários</title>
    <link rel="icon" href="../../assets/images/icon/parking (1).png">
    <link rel="stylesheet" href="../../assets/css/editarusuarios.css">
</head>
<body>
        <div class="container-editar">
            <h2 class="h2-edit-user">Editar Usuários</h2>
            <form action="../usuarios/classe_usuarios.php" method="POST" class="form-edit-user">
                <div class="form-group">
                    <label class="label-edit-user" for="id_login">ID Usuário</label>
                    <input class="input-edit-user" type="text" readonly name="id_login" value="<?php if (isset($_GET['id'])) {
                                                                                                        echo $_GET['id'];
                                                                                                    } ?>">
                </div>
                <div class="form-group">
                    <label class="label-edit-user" for="usua_nomeUpdate">Nome</label>
                    <input class="input-edit-user" type="text" name="usua_nomeUpdate" value="<?php if (isset($infosUpdate['nome'])) {
                                                                                                    echo $infosUpdate['nome'];
                                                                                                } ?>">
                </div>
                <div class="form-group">
                    <label class="label-edit-user" for="usua_cpfUpdate">CPF</label>
                    <input class="input-edit-user" type="text" name="usua_cpfUpdate" value="<?php if (isset($infosUpdate['cpf'])) {
                                                                                                echo $infosUpdate['cpf'];
                                                                                            } ?>">
                </div>
                <div class="form-group">
                    <label class="label-edit-user" for="usua_emailUpdate">Email</label>
                    <input class="input-edit-user" type="text" name="usua_emailUpdate" value="<?php if (isset($infosUpdate['email'])) {
                                                                                                echo $infosUpdate['email'];
                                                                                            } ?>">
                </div>
                <div class="form-actions">
                <input class="button-edit-user" type="submit" value="Salvar">
                <input class="button-edit-user" type="reset" value="Resetar">
                <a href="../usuarios/listar.php">
                     <input class="button-voltar"  value="Voltar">
                 </a>
              
            </div>
            </form>
            
        </div>
</body>
</html>
