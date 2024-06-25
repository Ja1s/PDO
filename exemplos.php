<?php


        
        function conectarAoBanco($tipoBanco) {
            $host = "localhost";
            $usuario = "root";
            $senha = "";
            $porta = 3306;
        
            try {
                switch ($tipoBanco) {
                    case 'usuarios':
                        $banco = "db_usuarios";
                        break;
                    case 'produtos':
                        $banco = "db_produtos";
                        break;
                    default:
                        throw new Exception("Tipo de banco de dados não reconhecido.");
                }
        
                $conexao = new PDO("mysql:host=$host;port=$porta;dbname=$banco", $usuario, $senha);
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                return $conexao;
            } catch (PDOException $e) {
                die("Erro na conexão com o Banco de dados: " . $e->getMessage());
            } catch (Exception $e) {
                die("Erro: " . $e->getMessage());
            }
        }
        
        // exemplo
        try {
            // conexao do user db
            $conexaoUsuarios = conectarAoBanco('usuarios');
            echo "Conexão com o banco de dados de usuários estabelecida.<br>";
        
            // conexao do db de produtos
            $conexaoProdutos = conectarAoBanco('produtos');
            echo "Conexão com o banco de dados de produtos estabelecida.<br>";
        
            // operaçoes db (SELECT, INSERT, etc)
            $stmt = $conexaoUsuarios->query('SELECT * FROM usuarios');
            while ($row = $stmt->fetch()) {
                print_r($row);
            }
        
            $stmt = $conexaoProdutos->query('SELECT * FROM produtos');
            while ($row = $stmt->fetch()) {
                print_r($row);
            }
        
            // fechar conexoes quando nao precisar mais
            $conexaoUsuarios = null;
            $conexaoProdutos = null;
        
        } catch (PDOException $e) {
            die("Erro na execução do script: " . $e->getMessage());
        }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        function estabelecerConexao() {
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "";
        $porta = 3306;
        try {
            $conexao = new PDO("mysql:host=$host;port=$porta;dbname=$banco", $usuario, $senha);
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (PDOException $e) {
            die("Erro na conexão com o Banco de dados: " . $e->getMessage());
        }
        return $conexao;
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	function estabelecerConexao() {
		$host = "localhost";
		$usuario = "root";
		$senha = "";
		$banco = "";
		$porta = 3306;
		try {
			$conexao = new PDO("mysql:host=$host;porta=$porta;dbname=$banco",$usuario,$senha);
		} catch(PDOException $e) {
			die("Erro na conexão com o banco de dados");
		}
		return $conexao;
	}


?>
