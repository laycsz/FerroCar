<?php
include_once '../../conexao/conexao.php';

echo$veiculo_id = $_POST['veiculo_id'];
echo '<br>';
echo$usua_placasUpdate = $_POST['usua_placasUpdate'];

echo '<br>';
echo$usua_corUpdate = $_POST['usua_corUpdate'];
echo '<br>';
echo$usua_modelolUpdate = $_POST['usua_modelolUpdate'];
echo '<br>';
echo$usua_categoriaUpdate = $_POST['usua_categoriaUpdate'];
echo '<br>';
echo$veic_clie_id = $_POST['veic_clie_id'];
echo '<br>';


$busca = "SELECT * FROM veiculos WHERE veiculo_id = '$veiculo_id'";
$stmt2 = $conn->query($busca);

        if($veiculo_id != '' && $usua_placasUpdate != '' && $usua_corUpdate != '' &&  $usua_modelolUpdate != '' &&  $usua_categoriaUpdate != ''  &&  $usua_categoriaUpdate != '' ){
            if ($stmt2->rowCount() > 0) {
                $update = "UPDATE veiculos SET placas = '$usua_placasUpdate' ,cor = '$usua_corUpdate', modelo = '$usua_modelolUpdate', categoria = '$usua_categoriaUpdate', veic_clie_id = '$veic_clie_id' WHERE veiculo_id = '$veiculo_id'";
                $stmtUpdate = $conn->query($update);
                 header('location: ../veiculos/listar.php');
            }
    } 

    ?>