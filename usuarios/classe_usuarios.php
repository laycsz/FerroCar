<?php
include_once '../conexao/conexao.php';

echo$id_login = $_POST['id_login'];
echo '<br>';
echo$usua_nomeUpdate = $_POST['usua_nomeUpdate'];
echo '<br>';
echo '<br>';
echo$usua_cpfUpdate = $_POST['usua_cpfUpdate'];
echo '<br>';
echo$usua_emailUpdate = $_POST['usua_emailUpdate'];
echo '<br>';
echo$usua_acessoUpdate = $_POST['usua_acessoUpdate'];
echo '<br>';


$busca = "SELECT * FROM usuariologin WHERE id_login = '$id_login'";
$stmt2 = $conn->query($busca);

        if($id_login != '' && $usua_nomeUpdate != '' && $usua_cpfUpdate != '' &&  $usua_emailUpdate != '' &&  $usua_acessoUpdate != ''){
            if ($stmt2->rowCount() > 0) {
                $update = "UPDATE usuariologin SET nome = '$usua_nomeUpdate' ,cpf = '$usua_cpfUpdate', email = '$usua_emailUpdate',  acesso = '$usua_acessoUpdate'WHERE id_login = '$id_login'";
                $stmtUpdate = $conn->query($update);
                 header('location: ../usuarios/listar.php');
            }
    } 

    ?>