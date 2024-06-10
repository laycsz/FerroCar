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

<head>
    <link rel="stylesheet" href="../assets/css/editarmovimento.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<div class="container-editar">
    <h2 class="h2-editar">Editar movimentos</h2>
    <form method="POST">
        <label class="label-editar" for="">ID movimento</label>
        <input class="input-editar-id" type="text" name="mov_codigoUpdate" value="<?php if (isset($_POST['mov_codigoUpdate'])) {
                                                                                    echo $_POST['mov_codigoUpdate'];
                                                                                } ?>">
        <button class="button-editar"><i class="fa-solid fa-magnifying-glass"></i></button>
        
    </form>
    <form action="../movimento/classe_editar.php" method="POST">
      
        <label class="label-editar" for="">Placa</label>
        <input class="input-editar" type="text" name="mov_placasUpdate" value="<?php if (isset($infosUpdate['placas'])) {
                                                                                    echo $infosUpdate['placas'];
                                                                                } ?>">
                                                                                <br>

        <input class="input-editar" type="text" hidden name="mov_codigoUpdate" value="<?php if (isset($_POST['mov_codigoUpdate'])) {
                                                                                            echo $_POST['mov_codigoUpdate'];
                                                                                        }
                                                                                        ?>">


        <label class="label-editar" for="">Data saida</label>
        <input class="input-editar" type="date" name="mov_dataUpdate" value="<?php if (isset($infosUpdate['dt_saida'])) {
                                                                                    echo $infosUpdate['dt_saida'];
                                                                                } ?>">
                                                                                <br>
        <label class="label-editar" for="">Hora Saida</label>
        <input class="input-editar" type="time" name="mov_horaUpdate" value="<?php if (isset($infosUpdate['hr_saida'])) {
                                                                                    echo $infosUpdate['hr_saida'];
                                                                                } ?>">
                                                                                <br>
        <label class="label-editar" for="">Valor</label>
        <input class="input-editar-valor" type="valor" name="valor" value="<?php if (isset($infosUpdate['valor'])) {
                                                                                    echo $infosUpdate['valor'];
                                                                                } ?>">

        <br>
        <input class="input-editar" type="submit">
                                                                            </div>

    </form>
</body>