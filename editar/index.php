<?php
include_once '../conexao/conexao.php';
include '../inc/header.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (isset($_POST['mov_codigoUpdate'])) {
    $mov_codigoUpdate = $_POST['mov_codigoUpdate'];

    $busca3 = "SELECT * FROM movimento WHERE id = '$mov_codigoUpdate'";
    $stmt3 = $conn->query($busca3);
    $infosUpdate = $stmt3->fetch(PDO::FETCH_ASSOC);
}
?>

<body class="body-editar">


    <h2 class="h2-editar">Editar movulos</h2>
    <form action="" method="POST">
        <label class="label-editar" for="">ID movimento</label>
        <input class="input-editar" type="text" name="mov_codigoUpdate" value="<?php if (isset($_POST['mov_codigoUpdate'])) {
                                                                                    echo $_POST['mov_codigoUpdate'];
                                                                                } ?>">
        <button class="button-editar">Pesquisar</button>
    </form>
    <form action="../editar/classe.php" method="POST">
        <br>
        <label class="label-editar" for="">Placa</label>
        <input class="input-editar" type="text" name="mov_placasUpdate" value="<?php if (isset($infosUpdate['placas'])) {
                                                                                    echo $infosUpdate['placas'];
                                                                                } ?>">

        <input class="input-editar" type="text" hidden name="mov_codigoUpdate" value="<?php if (isset($_POST['mov_codigoUpdate'])) {
                                                                                            echo $_POST['mov_codigoUpdate'];
                                                                                        }
                                                                                        ?>">


        <label class="label-editar" for="">Data saida</label>
        <input class="input-editar" type="date" name="mov_dataUpdate" value="<?php if (isset($infosUpdate['dt_saida'])) {
                                                                                    echo $infosUpdate['dt_saida'];
                                                                                } ?>">
        <label class="label-editar" for="">Hora Saida</label>
        <input class="input-editar" type="time" name="mov_horaUpdate" value="<?php if (isset($infosUpdate['hr_saida'])) {
                                                                                    echo $infosUpdate['hr_saida'];
                                                                                } ?>">
        <label class="label-editar" for="">Valor</label>
        <input class="input-editar" type="valor" name="valor" value="<?php if (isset($infosUpdate['valor'])) {
                                                                                    echo $infosUpdate['valor'];
                                                                                } ?>">

        <br>
        <input class="input-editar" type="submit">

    </form>
</body>