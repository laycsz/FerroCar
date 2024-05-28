<?php
include '../conexao/conexao.php';
include '../movimento/classe.php';


echo $mov_codigoUpdate = $_POST['mov_codigoUpdate'];
echo '<br>';
echo $mov_placasUpdate = $_POST['mov_placasUpdate'];
echo '<br>';
echo $mov_dataUpdate = $_POST['mov_dataUpdate'];
echo '<br>';
echo $mov_horaUpdate = $_POST['mov_horaUpdate'];
echo '<br>';
echo $valor = $_POST['valor'];
echo '<br>';
$busca3 = "SELECT * FROM movimento WHERE id = '$mov_codigoUpdate'";
$stmt3 = $conn->query($busca3);

if ($mov_codigoUpdate != '' && $mov_placasUpdate != '' && $mov_dataUpdate !=  '' &&  $mov_horaUpdate != '' &&  $valor != '') {
    if ($stmt3->rowCount() > 0) {
        $update = "UPDATE movimento SET placas = '$mov_placasUpdate', dt_saida = '$mov_dataUpdate', hr_saida = '$mov_horaUpdate',  valor = '$valor' WHERE id = '$mov_codigoUpdate'";
        $stmt3Update = $conn->query($update);
        header('location: ../movimento/relatorio.php');
    }
}
