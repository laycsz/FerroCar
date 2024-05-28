<?php
include_once '../conexao/conexao.php';
include '../inc/header.php';


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


<body class="body-editar">



    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="editar_usuario">
                <br><br>
                <h2>Editar Veiculos</h2>
                <br>
                <form action="" method="POST">
                    <label class="label-editar"  for="">ID Veiculo</label>
                    <input class="input-editar" type="text" readonly name="veiculo_id" value="<?php if (isset($_GET['id'])) {
                                                                                                    echo $_GET['id'];
                                                                                                } ?>">
                    <br><br>
                </form>
                <form action="../veiculos/classe_veiculos.php" method="POST">
                    <label  class="label-editar" for="">Placa</label>
                    <input class="input-editar"  id="placas" type="text" name="usua_placasUpdate" value="<?php if (isset($infosUpdate['placas'])) {
                                                                                                echo $infosUpdate['placas'];
                                                                                            } ?>">
                    <input class="input-editar" type="text" hidden name="veiculo_id" value="<?php if (isset($_GET['id'])) {
                                                                                                echo $_GET['id'];
                                                                                            } ?>">



                    <label  class="label-editar" for="">Cor</label>
                    <input class="input-editar" type="text" name="usua_corUpdate" value="<?php if (isset($infosUpdate['cor'])) {
                                                                                                echo $infosUpdate['cor'];
                                                                                            } ?>">
                    <label  class="label-editar" for="">Modelo</label>
                    <input class="input-editar" type="text" name="usua_modelolUpdate" value="<?php if (isset($infosUpdate['modelo'])) {
                                                                                                    echo $infosUpdate['modelo'];
                                                                                                } ?>">
                    <br><br>
                    <label  class="label-editar" for="">Categoria</label>
                    <input class="input-editar" type="text" name="usua_categoriaUpdate" value="<?php if (isset($infosUpdate['categoria'])) {
                                                                                                    echo $infosUpdate['categoria'];
                                                                                                } ?>">
                    <label class="label-editar" for="">Nome do cliente</label>
                    <select name="veic_clie_id" id="veic_clie_id">
                    <?php
                $query = $conn->query("SELECT nome from clientes order by nome desc " );

                $registros = $query->fetchAll(pdo::FETCH_ASSOC);
               foreach($registros as $option){

             
                ?>
                     <option  value="<?php echo $option['nome']  ?>"><?php echo $option['nome'] ?> </option>
                                        <?php
               }
               ?>                                                                
                                                                                                    
                    </select>
                  
                    <br><br>
                    <input class="input-editar" type="submit">
                    <input class="input-editar" type="reset">

                </form>

            </div><!-- fechamento da div editar_usuario-->

            <br>
            <div class="voltar_usuarios">
                <a href="<?php BASEURL ?>/veiculos/listar.php" class="box_a">

                    <p class="box_text">VOLTAR</p>
                </a>
            </div>

</body>

<script>
        $("#placas").mask("aaa-9999")
      </script>

</html>