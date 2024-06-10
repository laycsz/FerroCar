<?php
include_once '../conexao/conexao.php';
include '../inc/header.php';
include '../movimento/classe.php';

// Verificar se a placa está definida nos parâmetros da URL
$placas = isset($_GET['placas']) ? $_GET['placas'] : '';
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$veic_clie_id = isset($_GET['veic_clie_id']) ? $_GET['veic_clie_id'] : '';

// Inicializar a variável $infos
$infos = [];

if (!empty($placas)) {
    // Buscar informações do veículo e do cliente
    $busca = "SELECT * FROM veiculos LEFT JOIN clientes ON clientes.nome = veiculos.veic_clie_id WHERE placas = :placas";
    $stmt = $conn->prepare($busca);
    $stmt->bindParam(':placas', $placas);
    $stmt->execute();
    $infos = $stmt->fetch(PDO::FETCH_ASSOC);
}

$buscaMovi = "SELECT * FROM movimento WHERE categoria = :categoria AND status = 'true' OR placas = :placas AND status = 'true'";
$stmtMovi = $conn->prepare($buscaMovi);
$stmtMovi->bindParam(':categoria', $categoria);
$stmtMovi->bindParam(':placas', $placas);
$stmtMovi->execute();

if (isset($_POST['placas'])) {
    $placas = $_POST['placas'];
    $categoria = $_POST['categoria'];
    $vaga = isset($_POST['vaga']) ? $_POST['vaga'] : 'vaga';
}

?>

<script>
    $(document).ready(function(){
        $('#placas').mask('aaa-9999');
        $('#placasUpdate').mask('aaa-9999');
    });
</script>
<head>
    <title>Movimentação</title>
    <link rel="stylesheet" href="../assets/css/global.css">
    <link rel="stylesheet" href="../assets/css/movimento.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
</head>
<body class="body-index-movi">
    <div class="container_movimento">
        <div class="entrada_saida">
            <div class="check_in">
                <h2 class="h2-entrada-mov">ENTRADA</h2>
                <?php
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                date_default_timezone_set('America/Sao_Paulo');
                if (isset($dados['CadUsuario'])) {
                    $placas = $_POST['placas'];
                    $nome = $_POST['nome'];
                    $modelo = $_POST['modelo'];
                    $cor = $_POST['cor'];
                    $vaga = $_POST['vaga'];
                    $categoria = $_POST['categoria'];
                    $dt_entrada = $_POST['dt_entrada'];
                    $hr_entrada = $_POST['hr_entrada'];

                    if (empty($vaga)) {
                        echo '<div class="msg-err">Erro: A vaga deve ser preenchida!</div>';
                    } else {
                        // Verifica se a vaga está ocupada
                        $verificaVaga = $conn->prepare("SELECT * FROM movimento WHERE vaga = :vaga AND status = 'true'");
                        $verificaVaga->bindParam(':vaga', $vaga);
                        $verificaVaga->execute();

                        if ($verificaVaga->rowCount() > 0) {
                            echo '<div class="msg-err">Erro: A vaga já está ocupada!</div>';
                        } else {
                            $res = $conn->prepare("INSERT INTO movimento (placas, nome, modelo, cor, vaga, categoria, dt_entrada, hr_entrada, status) VALUES (:p, :n, :md, :c, :v, :ct, :de, :he, :s)");
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
                            echo '<div class="msg-sucess">Entrada cadastrada com sucesso!</div>';
                        }
                    }
                }

                if (isset($_GET['msg'])) {
                    echo $_GET['msg'];
                }
                ?>
                <form method="POST" action="">
                    <span id="msgAlerta1"></span>
                    <div class="line1_checkin">
                        <label class="label-index-movi">Placa: </label>
                        <input class="input-index-mov" type="text" name="placas" id="placas" placeholder="Placa completa" value="<?php echo $placas; ?>" class="text_placa">
                        <button class="button-index-movi" type="submit">Pesquisar</button>
                        <br>
                        <label class="label-index-movi">Nome: </label>
                        <input class="input-index-mov" type="text" name="nome" id="nome" value="<?php echo $infos['nome'] ?? ''; ?>">
                    </div>
                    <div class="line2_checkin">
                        <label class="label-index-movi">Modelo: </label>
                        <input class="input-index-mov" type="text" name="modelo" id="modelo" value="<?php echo $infos['modelo'] ?? ''; ?>">
                        <br>
                        <label class="label-index-movi">Cor: </label>
                        <input class="input-index-mov" type="text" name="cor" id="cor" value="<?php echo $infos['cor'] ?? ''; ?>">
                    </div>
                    <div class="line3_checkin">
                        <label class="label-index-movi">Categoria:</label>
                        <select class="select-index-movi" name="categoria" id="categoria">
                            <option hidden value="">Selecione</option>
                            <option <?php echo (isset($infos['categoria']) && $infos['categoria'] == 'carro grande') ? 'Selected' : ''; ?> value="carro_grande">Carro Grande</option>
                            <option <?php echo (isset($infos['categoria']) && $infos['categoria'] == 'carro medio') ? 'Selected' : ''; ?> value="carro_medio">Carro Médio</option>
                            <option <?php echo (isset($infos['categoria']) && $infos['categoria'] == 'carro pequeno') ? 'Selected' : ''; ?> value="carro_pequeno">Carro pequeno</option>
                            <option <?php echo (isset($infos['categoria']) && $infos['categoria'] == 'moto') ? 'Selected' : ''; ?> value="moto">Moto</option>
                        </select>
                        <br>
                        <label class="label-index-movi">Vaga: </label>
                        <select class="select-index-movi" name="vaga" id="vaga">
                            <option hidden value="">Selecione</option>
                            <option <?php echo (isset($infos['vaga']) && $infos['vaga'] == '1') ? 'Selected' : ''; ?> value="1">1</option>
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
                        <input class="input-index-mov" type="date" name="dt_entrada" id="dt_entrada" value="<?php echo date('Y-m-d'); ?>">
                        <br>
                        <label class="label-index-movi">Hora Entrada: </label>
                        <input class="input-index-mov" type="time" name="hr_entrada" id="hr_entrada" value="<?php echo date('H:i:s'); ?>">
                    </div>
                    <br>
                    <input class="button-index-movi" type="submit" value="Cadastrar" name="CadUsuario">
                </form>
            </div>

            <div class="check_out">
                <h2 class="h2-entrada-mov">SAÍDA</h2>
                <?php
                if (isset($_POST['placasUpdate'])) {
                    $placasUpdate = $_POST['placasUpdate'];
                    $dtUpdate = $_POST['dtUpdate'];
                    $hrUpdate = $_POST['hrUpdate'];
                    $nome = $_POST['nomeUpdate'];
                    $vaga = $_POST['vagaUpdate'];

                    $busca = "SELECT * FROM movimento WHERE placas = :placas AND status = 'true'";
                    $stmt2 = $conn->prepare($busca);
                    $stmt2->bindParam(':placas', $placasUpdate);
                    $stmt2->execute();
                    $infosUpdate = $stmt2->fetch(PDO::FETCH_ASSOC);
                    if ($placasUpdate != '' && $dtUpdate != '' && $hrUpdate != '' && $nome != '' &&  $vaga != '') {
                        $update = "SELECT hr_entrada FROM movimento WHERE status = 'true' AND placas = :placas";
                        $stmtUpdate = $conn->prepare($update);
                        $stmtUpdate->bindParam(':placas', $placasUpdate);
                        $stmtUpdate->execute();
                        $hr_entrada = $stmtUpdate->fetchColumn();

                        $classeHora = new CalculoHora;
                        $valorHora = $classeHora->getLocation($hr_entrada, $hrUpdate);

                        if ($stmt2->rowCount() > 0) {
                            $update = "UPDATE movimento SET hr_saida = :hr_saida, status = 'false', valor = :valor WHERE placas = :placas AND valor IS NULL";
                            $stmtUpdate = $conn->prepare($update);
                            $stmtUpdate->bindParam(':hr_saida', $hrUpdate);
                            $stmtUpdate->bindParam(':valor', $valorHora);
                            $stmtUpdate->bindParam(':placas', $placasUpdate);
                            $stmtUpdate->execute();
                            echo '<div class="msg-sucess">Saída registrada com sucesso!</div>';
                        }
                    }
                }
                ?>
                <form method="POST" action="">
                    <label class="label-index-movi">Placa: </label>
                    <input class="input-index-mov" id="placasUpdate" type="text" name="placasUpdate" value="<?php echo $_POST['placasUpdate'] ?? ''; ?>">
                    <button class="button-index-movi" type="submit">Pesquisar</button>
                    <br>
                    <label class="label-index-movi">Nome: </label>
                    <input class="input-index-mov" type="text" name="nomeUpdate" readonly value="<?php echo $infosUpdate['nome'] ?? ''; ?>">
                    <br>
                    <label class="label-index-movi">Categoria: </label>
                    <input class="input-index-mov" type="text" name="categoria" readonly value="<?php echo $infosUpdate['categoria'] ?? ''; ?>">
                    <br>
                    <label class="label-index-movi">Vaga: </label>
                    <input class="input-index-mov" type="text" name="vagaUpdate" readonly value="<?php echo $infosUpdate['vaga'] ?? ''; ?>">
                    <br>
                    <label class="label-index-movi">Data Saída: </label>
                    <input class="input-index-mov" type="date" name="dtUpdate" value="<?php echo date('Y-m-d'); ?>">
                    <br>
                    <label class="label-index-movi">Hora Saída: </label>
                    <input class="input-index-mov" type="time" name="hrUpdate" value="<?php echo date('H:i:s'); ?>">
                    <br>
                    <button class="button-index-movi" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>
<?php include '../inc/footer.php'; ?>
