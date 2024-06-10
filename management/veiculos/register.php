<?php
include '../../inc/header.php';
include '../../conexao/conexao.php';
include '../../crud/crud-veiculos.php';
$p = new Veiculos('estacionamento', 'localhost', 'postgres', '0511');

if (isset($_POST['placas'])) {
    $placas = addslashes($_POST['placas']);
    $cor = addslashes($_POST['cor']);
    $modelo = addslashes($_POST['modelo']);
    $categoria = addslashes($_POST['categoria']);
    $veic_clie_id = addslashes($_POST['veic_clie_id']);

    if (!empty($placas) && !empty($cor) && !empty($modelo) && !empty($categoria) && !empty($veic_clie_id)) {
        if ($p->msgErro == "") {
            // Modifique a função cadastrarVeiculos para retornar true/false e inserir o veículo diretamente aqui
            $query = $conn->prepare("INSERT INTO veiculos (placas, cor, modelo, categoria, veic_clie_id) VALUES (:placas, :cor, :modelo, :categoria, :veic_clie_id)");
            $query->bindValue(":placas", $placas);
            $query->bindValue(":cor", $cor);
            $query->bindValue(":modelo", $modelo);
            $query->bindValue(":categoria", $categoria);
            $query->bindValue(":veic_clie_id", $veic_clie_id);
            if ($query->execute()) {
                $veiculo_id = $conn->lastInsertId();
                echo '<div class="msg-sucess">Veiculo cadastrado com sucesso</div>';
                // Redireciona para a página de movimento com os dados do veículo
                echo "<script>window.location.href = '../../movimento/index.php?placas=$placas&categoria=$categoria&veic_clie_id=$veic_clie_id';</script>";
                exit();
            } else {
                echo '<div class="msg-err">Veiculo já cadastrado</div>';
            }
        } else {
            echo "Erro: " . $p->msgErro;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/global.css">
    <link rel="stylesheet" href="../../assets/css/registercar.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#placas').mask('aaa-9999');
        });
    </script>
</head>
<body>
<main>
    <div class="container vehicle-form">
        <div class="login-box">
            <form method="POST">
                <h2>Cadastrar Veiculo</h2>
                <div class="user-box">
                    <label for="nome">Placa do veiculo:</label>
                    <input type="text" name="placas" id="placas" required>
                </div>
                <div class="user-box">
                    <label for="cor">Cor do veiculo:</label>
                    <input type="text" name="cor" id="cor">
                </div>
                <div class="user-box">
                    <label for="modelo">Modelo do veiculo:</label>
                    <input type="text" name="modelo" id="modelo" required>
                </div>
                <div class="select-group">
                    <label class="label-register-veic" for="cars">Categoria de veículo:</label>
                    <select name="categoria" id="cars">
                        <option class="option" value="carro grande">Carro grande</option>
                        <option class="option" value="carro medio">Carro médio</option>
                        <option class="option" value="carro pequeno">Carro pequeno</option>
                        <option class="option" value="moto">Moto</option>
                    </select>
                </div>
                <br>
                <div class="select-group">
                    <label class="label-register-veic" for="veic_clie_id">Cliente:</label>
                    <select name="veic_clie_id" id="veic_clie_id">
                        <?php
                        $query = $conn->query("SELECT nome FROM clientes ORDER BY nome DESC");
                        $registros = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($registros as $option) {
                        ?>
                            <option value="<?php echo $option['nome'] ?>"><?php echo $option['nome'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <br>
                <button class="btn" value="cadastrar" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</main>
<?php include '../../inc/footer.php'; ?>
</body>
</html>
