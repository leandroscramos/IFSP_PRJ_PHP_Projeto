<?php
include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DocumentDAO.php';
include_once $_SESSION["root"].'php/Model/ModelDocument.php';

class ControllerDocument {

    public function readDocument() {
        $documentDAO = new DocumentDAO();
        $documents = $documentDAO->readDocument();
        //Util::debug($documents);
        return $documents;
    }

    public function createDocument() {
		$documentDAO = new DocumentDAO();
		$document = new ModelDocument();
		
		$document->setDocumentFromPOST();			
		$result = $documentDAO->createDocument($document);

		if (isset($_FILES['doc_file'])) {

			$extensao = strtolower(substr($_FILES['doc_file']['name'], -4)); //pega a extensão do arquivo
			$novo_nome = md5(time()) . $extensao; //define o nome do arquivo
			$diretorio = "upload/"; //define o diretorio para onde enviaremos o arquivo
	
			move_uploaded_file($_FILES['doc_file']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
			
		}
	
		
		if ($result){
			$_SESSION["flash"]["msg"]="Documento submetido com sucesso!";
			$_SESSION["flash"]["sucesso"]=true;
		} else {
			$_SESSION["flash"]["msg"]="Falha ao submeter documento!";
			$_SESSION["flash"]["sucesso"]=false;
		};
    }

	/*
    public function updateDocument() {
        $documentDAO = new DocumentDAO();
		$document = new ModelDocument();

		$document->updateDocumentFromPOST();
		$result = $documentDAO->updateDocument($document);

		if ($result){
			$_SESSION["flash"]["msg"]="Tipo de documento atualizado com sucesso!";
			$_SESSION["flash"]["sucesso"]=true;
		} else {
			$_SESSION["flash"]["msg"]="Falha ao atualizar tipo de documento!";
			$_SESSION["flash"]["sucesso"]=false;
		}

		// O trecho abaixo verifica os nomes dos documentos já cadastrados *** PRECISA DE AJUSTES ***
		
		if (($documentDAO->readDocumentByName($_POST['documentTitleUpdate'])) == null) {
			$document->updateDocumentFromPOST();
			$result = $documentDAO->updateDocument($document);

			if ($result){
				$_SESSION["flash"]["msg"]="Tipo de documento atualizado com sucesso!";
				$_SESSION["flash"]["sucesso"]=true;
			} else {
				$_SESSION["flash"]["msg"]="Falha ao atualizar tipo de documento!";
				$_SESSION["flash"]["sucesso"]=false;
			};
		} else {
			$_SESSION["flash"]["msg"]="Tipo de documento já cadastrado!";
			$_SESSION["flash"]["sucesso"]=false;
		}
		
    }
    
    public function deleteDocument() {
        $documentDAO = new DocumentDAO();
        $result = $documentDAO->deleteDocument($_POST['idModalDelete']);
        
		if ($result){
			$_SESSION["flash"]["msg"]="Tipo de documento excluído com sucesso!";
			$_SESSION["flash"]["sucesso"]=true;
		} else {
			$_SESSION["flash"]["msg"]="Falha ao excluir tipo de documento!";
			$_SESSION["flash"]["sucesso"]=false;
		}
	}
	*/
}   