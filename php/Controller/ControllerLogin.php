<?php
include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/LoginDAO.php';
include_once $_SESSION["root"].'php/Model/ModelUsuario.php';

class ControllerLogin {

	function verificaLogin(){
		//verifico se a requisição que chegou nessa pagina é POST
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			//recebo as variaveis por POST
			$user=$_POST["usuario"];
			$passwd=$_POST["senha"];	
			
			$loginDAO = new LoginDAO();
			$usuario = new ModelUsuario();	
			//Retorna um funcionario ou retorna NULL;
			$usuario=$loginDAO->verificaLogin($user);	

			//$_SESSION["flash"]["qualquerCoisa"] são variáveis de login que vivem apenas uma requisição, elas são usadas na view e depois destruidas.
			if ($usuario!=NULL && password_verify($passwd,$usuario->getSenha())) {
				$_SESSION["logado"] = true;
				$_SESSION["login"]["usuario"]=$usuario->getUsuario();
				$_SESSION["login"]["nome"]=$usuario->getNome();
				$_SESSION["login"]["senha"]=$usuario->getSenha();
				if ($usuario->getPermissao() == 1){
					$_SESSION["login"]["permissao"]="Administrador";
				} else {
					$_SESSION["login"]["permissao"]="Usuário";
				}
				$_SESSION["flash"]["msg"]="Logado com sucesso!";
				//Coloquei na sessão que o usuário está logado e o seu nome.
				//Mando a página para a rota "exibeFuncionario"
				header("Location:logado");
			}
			else{
				$_SESSION["logado"]=false;
				$_SESSION["login"]["usuario"]=$usuario->getUsuario();
				$_SESSION["login"]["senha"]=$usuario->getSenha();
				$_SESSION["flash"]["msg"]="Usuário ou senha não conferem";
				$_SESSION["flash"]["sucesso"]=false;
				//Coloquei na sessão "temporária" os avisos e feedbacks necessários, chamo a rota Login	
				header("Location:login");
			}
		}		
	}

	function logout(){
		if(isset($_SESSION["logado"])){
			session_unset();
			session_destroy();
		}
		header("Location:index"); 
	}	
	
}