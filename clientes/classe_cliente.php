<?php
include_once '../conexao/conexao.php';

echo$cliente_id = $_POST['cliente_id'];
echo '<br>';
echo$usua_nomeUpdate = $_POST['usua_nomeUpdate'];
echo '<br>';
echo '<br>';
echo$usua_cpfUpdate = $_POST['usua_cpfUpdate'];
echo '<br>';
echo$usua_emailUpdate = $_POST['usua_emailUpdate'];
echo '<br>';
echo$usua_telefoneUpdate = $_POST['usua_telefoneUpdate'];
echo '<br>';


$busca = "SELECT * FROM clientes WHERE cliente_id = '$cliente_id'";
$stmt2 = $conn->query($busca);

        if($cliente_id != '' && $usua_nomeUpdate != '' && $usua_cpfUpdate != '' &&  $usua_emailUpdate != '' &&  $usua_telefoneUpdate != ''){
            if ($stmt2->rowCount() > 0) {
                $update = "UPDATE clientes SET nome = '$usua_nomeUpdate' ,cpf = '$usua_cpfUpdate', email = '$usua_emailUpdate' , telefone = '$usua_telefoneUpdate' WHERE cliente_id = '$cliente_id'";
                $stmtUpdate = $conn->query($update);
                 header('location: ../clientes/listar.php');
            }
    }
