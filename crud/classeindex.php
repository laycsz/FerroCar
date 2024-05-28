<?php
class Usuario
{
    private $pdo;
    public $msgErro = "";
    public function conectar($dbname, $server, $user, $senha)
    {
        global $pdo;
        try {
            $pdo = new PDO("pgsql:dbname=" . $dbname . ";host=" . $server, $user, $senha);
        } catch (PDOException $e) {
            $msgErro = $e->getMessage();
        }
    }

    //caso nao, cadastrar

    public function logar($email, $senha)
    {
        global $pdo;
        //verificar se o email e senha estao cadastrado, se sim
        $sql = $pdo->prepare("SELECT * FROM usuariologin WHERE email = :e AND senha = :s AND acesso = 'Admin'");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", $senha);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            //entrar no sistema(sessao)
            $_SESSION['usuariologin'] = array();
            $dado = $sql->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['usuariologin'] = array($dado['acesso'], $dado['nome']);
            $_SESSION['acesso'] = $dado['acesso'];
            return true; //cadastrado com sucesso
        } else {
            return false; //nao foi possivel logar
        }
    }

    public function logarFuncionarios($email, $senha)
    {
        global $pdo;
        //verificar se o email e senha estao cadastrado, se sim
        $sql = $pdo->prepare("SELECT * FROM usuariologin
         WHERE email = :e AND senha = :s AND acesso = 'Funcionario'");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", $senha);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            //entrar no sistema(sessao)
            $_SESSION['usuariologin
            '] = array();
            $dado = $sql->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['usuariologin
            '] = array($dado['acesso'], $dado['nome']);
            $_SESSION['acesso'] = $dado['acesso'];
            return true; //cadastrado com sucesso
        } else {
            return false; //nao foi possivel logar
        }
    }
}
