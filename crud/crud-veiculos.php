<?php

class Veiculos
{

    public $pdo;
    public $msgErro = "";
    public function __construct($dbname, $server, $user, $senha)
    {
        try {
            $this->pdo = new PDO("pgsql:dbname=" . $dbname . ";host=" . $server, $user, $senha);
        } catch (PDOException $e) {
            echo "Erro com banco de dados:" . $e->getMessage();
            exit();
        } catch (Exception $e) {
            echo "Erro genérico:" . $e->getMessage();
            exit();
        }
    }
    //FUNÇAO PARA BUSCAR DADOS E COLOCAR NO CANTO DIREITO
    public function buscarDados()
    {
        $res = array();
        $cmd = $this->pdo->query("SELECT * FROM veiculos
                ORDER BY placas DESC");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public function cadastrarVeiculos($placas, $cor, $modelo, $categoria, $veic_clie_id)
    {
        //antes de cadastrar verificar se ja tem o email cadastrado
        $cmd = $this->pdo->prepare("SELECT placas from veiculos WHERE placas=:p");
        $cmd->bindValue(":p", $placas);
        $cmd->execute();
        if ($cmd->rowCount() > 0) //placa ja existe no banco
        {
            return false;
        } else {
            $cmd = $this->pdo->prepare("INSERT INTO veiculos(placas, cor, modelo, categoria, veic_clie_id) VALUES (:p, :c, :m, :cc, :v)");
            $cmd->bindValue(":p", $placas);
            $cmd->bindvalue(":c", $cor);
            $cmd->bindValue(":m", $modelo);
            $cmd->bindValue(":cc", $categoria);
            $cmd->bindValue(":v", $veic_clie_id);


            $cmd->execute();
            return true;
        }
    }
    // public function delete($placa)
    // {

    //     $cmd = $this->pdo->prepare("DELETE FROM veiculo WHERE placa = :p");

    //     $cmd->bindValue(":p", $placa);
    //     $cmd->execute();
    // }
    //         //buscar dados
    //         public function buscarDadosVeiculo($placa)
    //         {
    //             $res = array();
    //             $cmd = $this->pdo->prepare("SELECT * FROM  veiculo WHERE p =:placa");
    //             $cmd ->bindValue(":p", $placa);
    //             $cmd->execute();
    //             $res = $cmd->fetch(PDO::FETCH_ASSOC);
    //             return $res;
    //         }
    //Atualizar dados
    public function atualizarDados()
    {
    }
}

?>
<?php
