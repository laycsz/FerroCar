<?php
include_once '../../conexao/conexao.php';


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if (isset($_GET['id'])) {
    if (isset($_GET['id'])) {
        $veiculo_id = $_GET['id'];
    }

    $busca = "SELECT * FROM veiculos WHERE veiculo_id = '$veiculo_id'";
    $stmt2 = $conn->query($busca);
    $infosUpdate = $stmt2->fetch(PDO::FETCH_ASSOC);
}
?>
<html>
<head>
    <title>Editar Veículos</title>
    <link rel="icon" href="../../assets/images/icon/parking (1).png">
    <link rel="stylesheet" href="../../assets/css/editarveiculos.css">
</head>

<body>
    <div class="container-editar">
        <h2 class="h2-editar">Editar Veículos</h2>
        <form action="../veiculos/classe_veiculos.php" method="POST" class="form-editar">
            <div class="form-group">
                <label class="label-editar" for="veiculo_id">ID Veículo</label>
                <input class="input-editar" type="text" readonly name="veiculo_id" value="<?php if (isset($_GET['id'])) {
                                                                                                    echo $_GET['id'];
                                                                                                } ?>">
            </div>
            <div class="form-group">
                <label class="label-editar" for="placas">Placa</label>
                <input class="input-editar" id="placas" type="text" name="usua_placasUpdate" value="<?php if (isset($infosUpdate['placas'])) {
                                                                                                echo $infosUpdate['placas'];
                                                                                            } ?>">
            </div>
            <div class="form-group">
                <label class="label-editar" for="cor">Cor</label>
                <input class="input-editar" type="text" name="usua_corUpdate" value="<?php if (isset($infosUpdate['cor'])) {
                                                                                                echo $infosUpdate['cor'];
                                                                                            } ?>">
            </div>
            <div class="form-group">
                <label class="label-editar" for="modelo">Modelo</label>
                <input class="input-editar" type="text" name="usua_modelolUpdate" value="<?php if (isset($infosUpdate['modelo'])) {
                                                                                                    echo $infosUpdate['modelo'];
                                                                                                } ?>">
            </div>
            <div class="form-group">
                <label class="label-editar" for="categoria">Categoria</label>
                <input class="input-editar" type="text" name="usua_categoriaUpdate" value="<?php if (isset($infosUpdate['categoria'])) {
                                                                                                    echo $infosUpdate['categoria'];
                                                                                                } ?>">
            </div>
            <div class="form-group">
                <label class="label-editar" for="veic_clie_id">Nome do cliente</label>
                <select class="input-editar" name="veic_clie_id" id="veic_clie_id">
                    <?php
                    $query = $conn->query("SELECT nome FROM clientes ORDER BY nome DESC");
                    $registros = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($registros as $option) {
                        echo "<option value='{$option['nome']}'>{$option['nome']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-actions">
                <input class="button-editar" type="submit" value="Salvar">
                <input class="button-editar" type="reset" value="Resetar">
                <a href="../veiculos/listar.php">
                     <input class="button-voltar"  value="Voltar">
                 </a>
              
            </div>
        </form>
        </div>
    </div>
    </body>
    </html>

    <script>
    $("#placas").mask("aaa-9999");
    </script>


