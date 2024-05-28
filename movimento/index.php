<?php
include_once '../conexao/conexao.php';
include '../inc/header.php';
include '../movimento/classe.php';

if (isset($_POST['placas'])) {
    $placas = $_POST['placas'];
    $categoria = $_POST['categoria'];
    if (isset($_POST['vaga'])) {
        $vaga = $_POST['vaga'];
    } else {
        $vaga = 'vaga';
    }



    $busca = "SELECT * FROM veiculos LEFT JOIN clientes ON clientes.nome = veiculos.veic_clie_id WHERE placas = '$placas'";
    $stmt = $conn->query($busca);
    $infos = $stmt->fetch(PDO::FETCH_ASSOC);

    $buscaMovi = "SELECT * FROM movimento WHERE categoria = '$categoria' AND vaga = '$vaga'  AND status = 'true' OR  placas = '$placas' AND status = 'true'";
    $stmtMovi = $conn->query($buscaMovi);
}


?>


<body class="body-index-movi">
    <div class="container_movimento">
        <div class="entrada_saida">
            <div class="check_in">
                <h2 class="h2-entrada-mov">ENTRADA</h2>
                <?php
                //Receber os dados do formulário
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                date_default_timezone_set('America/Sao_Paulo');
                //Verificar se o usuário clicou no botão
                if (isset($dados['CadUsuario'])) {

                    $placas = $_POST['placas'];
                    $nome = $_POST['nome'];
                    $modelo = $_POST['modelo'];
                    $cor = $_POST['cor'];
                    $vaga = $_POST['vaga'];
                    $categoria = $_POST['categoria'];
                    $dt_entrada = $_POST['dt_entrada'];
                    $hr_entrada = $_POST['hr_entrada'];

                    if ($stmtMovi->rowCount() > 0) {
                        // header('location: //movimento/index.php?msg=Já existente!');
                    } else {
                        $res = $conn->prepare("INSERT INTO movimento(placas, nome,modelo,cor,vaga,categoria,dt_entrada,hr_entrada, status) VALUES (:p,:n,:md,:c,:v,:ct,:de,:he, :s)");
                        $res->bindValue(":p", $placas);
                        $res->bindValue(":n", $nome);
                        $res->bindValue(":md", $modelo);
                        $res->bindValue(":c", $cor);
                        $res->bindValue(":v", $vaga);
                        $res->bindValue(":ct", $categoria);
                        $res->bindValue(":de", $dt_entrada);
                        $res->bindValue(":he", $hr_entrada);
                        $res->bindValue(":s", true);
                        $res->execute();
                        header('location: ../movimento/index.php?msg=Cadastrado com sucesso!');
                        
                    }
                    header('location: ../movimento/index.php?msg=Ja cadastrado');
                }

                // if (isset($busca['buscar'])){
                //     "SELECT * FROM veiculos LEFT JOIN clientes ON clientes.clie_codigo = veiculos.veic_clie_codigo WHERE placa = '$placa'";
                // }else {

                // }
                ?>
                <?php if (isset($_GET['msg'])) {
                    echo $_GET['msg'];
                    // header('location: ../movimento/index.php?msg=Cadastrado com sucesso!');
                } ?>
                <form method="POST" action="../movimento/index.php">
                    <form>
                        <span id="msgAlerta1"></span>

                        <div class="line1_checkin">
                            <label class="label-index-movi">placa: </label>
                            <input class="input-index-mov" type="text" name="placas" id="placas" placeholder="placa completo" value="<?php if (isset($placas)) {
                                                                                                                                            echo $placas;
                                                                                                                                        } ?>" class="text_placa">

                            <button class="button-index-movi">Pesquisar</button>
                            <br>

                            <label class="label-index-movi">Nome: </label>
                            <input class="input-index-mov" type="text" name="nome" id="nome" value="<?php if (isset($infos['nome'])) {
                                                                                                        echo $infos['nome'];
                                                                                                    } ?>">
                        </div><!-- fechamento da div line1_chekin -->



                        <label class="label-index-movi">Modelo: </label>
                        <input class="input-index-mov" type="text" name="modelo" id="modelo" placeholder="Seu melhor modelo" value="<?php if (isset($infos['modelo'])) {
                                                                                                                                        echo $infos['modelo'];
                                                                                                                                    } ?>">
                        <br>


                        <label class="label-index-movi">Cor: </label>
                        <input class="input-index-mov" type="text" name="cor" id="cor" placeholder="Seu melhor cor" value="<?php if (isset($infos['cor'])) {
                                                                                                                                echo $infos['cor'];
                                                                                                                            } ?>">
            </div><!-- fechamento da div line2_chekin -->

            <div class="line3_chekin">

                <label class="label-index-movi">Categoria: </label>
                <select class="select-index-movi" name="categoria" id="categoria">
                    <option hidden value="">Selecione</option>
                    <option <?php if (isset($infos['categoria'])) {
                                if ($infos['categoria'] == 'carro grande') {
                                    echo 'Selected';
                                } else {
                                    echo 'hidden';
                                }
                            } ?> value="carro_grande">Carro Grande</option>
                    <option <?php if (isset($infos['categoria'])) {
                                if ($infos['categoria'] == 'carro medio') {
                                    echo 'Selected';
                                } else {
                                    echo 'hidden';
                                }
                            } ?> value="carro_medio">Carro Médio</option>
                    <option <?php if (isset($infos['categoria'])) {
                                if ($infos['categoria'] == 'carro pequeno') {
                                    echo 'Selected';
                                } else {
                                    echo 'hidden';
                                }
                            } ?> value="carro_pequeno">Carro pequeno</option>
                    <option <?php if (isset($infos['categoria'])) {
                                if ($infos['categoria'] == 'moto') {
                                    echo 'Selected';
                                } else {
                                    echo 'hidden';
                                }
                            } ?> value="moto">Moto</option>
                </select>
                <label class="label-index-movi">Vaga: </label>
                <select name="vaga" id="vaga">
                    
                <option hidden value="">Selecione</option>
                    <option <?php if (isset($infos['vaga'])) {
                                if ($infos['vaga'] == '1') {
                                    echo 'Selected';
                                } else {
                                    echo 'hidden';
                                }
                            } ?> value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    
                </select>


                <br>
                <label class="label-index-movi">Data Entrada: </label>
                <input class="input-index-mov" type="date" name="dt_entrada" id="dt_entrada" value="<?php $data = date('Y-m-d');
                                                                                                    echo $data; ?>">

                <label class="label-index-movi">Hora Entrada: </label>
                <input class="input-index-mov" type="time" name="hr_entrada" id="hr_entrada" value="<?php $hora = date('H:i:s');
                                                                                                    echo $hora; ?>">
            </div><!-- fechamento da div line3_chekin -->
            <br>

            <input class="button-index-movi" type="submit" value="Cadastrar" name="CadUsuario" >
            
            
            </form>
            </form>

            <!-- <script src="/teste/js/custom.js"></script> -->

        </div><!-- fechamento da div chekin -->





        <?php
        if (isset($_POST['placasUpdate'])) {
            $placasUpdate = $_POST['placasUpdate'];
            $dtUpdate = $_POST['dtUpdate'];
            $hrUpdate = $_POST['hrUpdate'];
            $nome = $_POST['nomeUpdate'];
            $vaga = $_POST['vagaUpdate'];

            $busca = "SELECT * FROM movimento WHERE placas = '$placasUpdate' AND status = 'true'";
            $stmt2 = $conn->query($busca);
            $infosUpdate = $stmt2->fetch(PDO::FETCH_ASSOC);
            if ($placasUpdate != '' && $dtUpdate != '' && $hrUpdate != '' && $nome != '' &&  $vaga != '') {
                $update = "SELECT hr_entrada FROM movimento WHERE status = 'true' AND placas = '$placasUpdate'";
                $stmtUpdate = $conn->query($update);
                $hr_entrada = $stmtUpdate->fetchColumn();

                $classeHora = new CalculoHora;
                $valorHora = $classeHora->getLocation($hr_entrada, $hrUpdate);

                if ($stmt2->rowCount() > 0) {
                    $update = "UPDATE movimento SET  hr_saida = '$hrUpdate', status = 'false', valor='$valorHora' WHERE placas = '$placasUpdate' AND valor IS NULL";;
                    $stmtUpdate = $conn->query($update);

                    // header('location: /movimento/index.php?msg=Baixa realizada com sucesso!');
                }
            }
        }
        ?>

        <br>
        <div class="check_out">
            <h2>SAÍDA</h2>
            <form method="POST" action="">
                <label class="label-index-movi" for="">placa</label>
                <input class="input-index-mov" id="placas" type="text" name="placasUpdate" value="<?php if (isset($_POST['placasUpdate'])) {
                                                                                                        echo $_POST['placasUpdate'];
                                                                                                    } ?>">
                <button class="button-index-movi">Pesquisar</button>
                <br>
                <label class="label-index-movi" for="">nome</label>
                <input class="input-index-mov" type="text" name="nomeUpdate" readonly value="<?php if (isset($infosUpdate['nome'])) {
                                                                                                    echo $infosUpdate['nome'];
                                                                                                } ?>">
                <br>
                <label class="label-index-movi" for="">Categoria</label>
                <input class="input-index-mov" type="text" name="categoria" readonly value="<?php if (isset($infosUpdate['categoria'])) {
                                                                                                echo $infosUpdate['categoria'];
                                                                                            } ?>">

                <label class="label-index-movi" for="">vaga</label>
                <input class="input-index-mov" type="text" name="vagaUpdate" readonly value="<?php if (isset($infosUpdate['vaga'])) {
                                                                                                    echo $infosUpdate['vaga'];
                                                                                                } ?>">
                <br>
                <input class="input-index-mov" type="date" name="dtUpdate" value="<?php $data = date('Y-m-d');
                                                                                    echo $data; ?>">
                <input class="input-index-mov" type="time" name="hrUpdate" value="<?php $hora = date('H:i:s');
                                                                                    echo $hora; ?>">
                <br>
                <button class="button-index-movi">Enviar</button>
            </form>



        </div><!-- fechamento da div chekout -->
    </div><!-- fechamento da div entrada_saida -->
    <a href="../movimento/relatorio.php" target="blank">
        <div class="h3-visualizar-mov">
            <h3>Visualizar relatórios</h3>
        </div>
    </a>

    <a href="../movimento/relatoriodatas.php" target="blank">
        <div class="h3-visualizar-mov">
            <h3>Visualizar relatórios por datas</h3>
        </div>
    </a>

    <a href="../editar/index.php" target="blank">
        <div class="h3-visualizar-mov">
            <h3>Editar movimentos</h3>
        </div>
    </a>


</body>
<script>
    $("#placas").mask("aaa-9999")
</script>
<style>
    select {
        font-weight: 700;
        font-size: 20px;
        border-radius: 10px;

    }

    option {
        font-family: 'Courier New', Courier, monospace;
        font-weight:700;
        font-size: 20px;
    }
</style>

</html>
<?php
include '../inc/footer.php'
?>
<script>
    //window.history.pushState('', '', '../movimento/index.php');
</script>