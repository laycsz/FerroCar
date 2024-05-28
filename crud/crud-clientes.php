<?php

class Clientes
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
        $cmd = $this->pdo->query("SELECT * FROM clientes
                 ORDER BY cliente_id DESC");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public function cadastrarClientes($nome, $cpf, $email,  $telefone, $entrada, $saida)
    {
        //antes de cadastrar verificar se ja tem o email cadastrado
        $cmd = $this->pdo->prepare("SELECT cpf from clientes WHERE cpf=:c");
        $cmd->bindValue(":c", $cpf);
        $cmd->execute();
        if ($cmd->rowCount() > 0) //placa ja existe no banco
        {
            return false;
        } else {
            $cmd = $this->pdo->prepare("INSERT INTO clientes(nome, cpf, email, telefone, entrada, saida) VALUES (:n, :c,:e, :t,:en, :s)");
            $cmd->bindValue(":n", $nome);
            $cmd->bindvalue(":c", $cpf);
            $cmd->bindvalue(":e", $email);
            $cmd->bindvalue(":t", $telefone);
            $cmd->bindvalue(":en", $entrada);
            $cmd->bindvalue(":s", $saida);







            $cmd->execute();
            return true;
        }
    }

    //buscar dados
    public function buscarDadosClientes($cpf)
    {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM  clientes WHERE c =:cpf");
        $cmd->bindValue(":c", $cpf);
        $cmd->execute();
        $res = $cmd->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    //Atualizar dados
    public function atualizarDados()
    {
    }
}

?>
<?php
