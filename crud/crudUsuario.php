<?php

  class Usuarios{

    public $pdo;
    public $msgErro = "";
        public function __construct($dbname, $server, $user, $senha)
        {
            try
            {
                $this -> pdo = new PDO("pgsql:dbname=". $dbname.";host=".$server, $user, $senha);
            }catch(PDOException $e){
                    echo "Erro com banco de dados:" .$e->
                    getMessage();
                    exit();
            }
            catch(Exception $e){
                echo "Erro genérico:" .$e->
                getMessage();
                exit();
            }
        }
            //FUNÇAO PARA BUSCAR DADOS E COLOCAR NO CANTO DIREITO
            public function buscarDados()
            {
                $res=array();
                $cmd = $this->pdo->query("SELECT * FROM usuariologin
                 ORDER BY cpf");
                 $res = $cmd-> fetchAll(PDO::FETCH_ASSOC);
                 return $res;
            }
            public function cadastrarusuariologin($nome, $cpf, $email, $senha, $acesso,)
            {
                //antes de cadastrar verificar se ja tem o cpf cadastrado
                    $cmd = $this->pdo->prepare("SELECT cpf from usuariologin WHERE cpf=:c");
                    $cmd->bindValue(":c", $cpf);
                    $cmd->execute();
                    if($cmd->rowCount()>0)//email ja existe no banco
                    {
                        return false;

                    }else
                    {
                        $cmd = $this->pdo->prepare("INSERT INTO usuariologin(nome, cpf, email,senha, acesso) VALUES (:n, :c, :e,:s, :ac)");
                        $cmd->bindValue(":n", $nome);
                     
                        $cmd->bindValue(":c", $cpf);
                        $cmd->bindValue(":e", $email);
                        $cmd->bindValue(":s", $senha);
                        $cmd->bindValue(":ac", $acesso);
      
                        
                      
                        
                    
                        $cmd->execute();
                        return true;
                    }
            }
          
            //buscar dados
            public function buscarDadosusuariologin($cpf)
            {
                $res = array();
                $cmd = $this->pdo->prepare("SELECT * FROM  usuariologin WHERE c =:cpf");
                $cmd ->bindValue(":c", $cpf);
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