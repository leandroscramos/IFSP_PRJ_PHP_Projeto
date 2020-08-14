<?php
include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DocumentDAO.php';
include_once $_SESSION["root"].'php/Model/ModelDocument.php';

class ControllerDocument {

    public function readDocument() {
        $documentDAO = new DocumentDAO();
        $documents = $documentDAO->readDocument();        
        return $documents;
	}
	
    public function readDocumentPublished() {
        $documentDAO = new DocumentDAO();
        $documents = $documentDAO->readDocumentPublished();        
        return $documents;
	}	
	
	public function readDocumentByUser($user) {
        $documentDAO = new DocumentDAO();
        $documents = $documentDAO->readDocumentByUser($user);        
        return $documents;
	}
	
	public function readDocumentById($id) {		
        $documentDAO = new DocumentDAO();
		$document = $documentDAO->readDocumentById($id);		        
        return $document;
    }

    public function createDocument() {
		$documentDAO = new DocumentDAO();
		$document = new ModelDocument();
		
		$document->setDocumentFromPOST();		
		$result = $documentDAO->createDocument($document);

		if (isset($_FILES['doc_file_sub'])) {			
			$novo_nome = $_POST['doc_code'].".".substr(strrchr($_FILES['doc_file_sub']['name'],'.'),1); //define o nome do arquivo
			$diretorio = "upload/submissions/"; //define o diretorio para onde enviaremos o arquivo	
			move_uploaded_file($_FILES['doc_file_sub']['tmp_name'], $diretorio.$novo_nome); //efetua o upload			
		}
		
		if (isset($_FILES['doc_file_final'])) {			
			$novo_nome = $_POST['doc_code'].".".substr(strrchr($_FILES['doc_file_final']['name'],'.'),1); //define o nome do arquivo
			$diretorio = "upload/published/"; //define o diretorio para onde enviaremos o arquivo	
			move_uploaded_file($_FILES['doc_file_final']['tmp_name'], $diretorio.$novo_nome); //efetua o upload			
		}

		if (isset($_FILES['pdf_file_final'])) {			
			$novo_nome = $_POST['doc_code'].".".substr(strrchr($_FILES['pdf_file_final']['name'],'.'),1); //define o nome do arquivo
			$diretorio = "upload/published/"; //define o diretorio para onde enviaremos o arquivo	
			move_uploaded_file($_FILES['pdf_file_final']['tmp_name'], $diretorio.$novo_nome); //efetua o upload			
		}
		
		if ($result){
			$_SESSION["flash"]["msg"]="Documento submetido com sucesso!";
			$_SESSION["flash"]["sucesso"]=true;
		} else {
			$_SESSION["flash"]["msg"]="Falha ao submeter documento!";
			$_SESSION["flash"]["sucesso"]=false;
		};
    }

	
    public function updateDocument() {
        $documentDAO = new DocumentDAO();
		$document = new ModelDocument();

		$document->updateDocumentFromPOST();		
		$result = $documentDAO->updateDocument($document);

		if (isset($_FILES['doc_file_final'])) {			
			$novo_nome = $_POST['doc_code'].".".substr(strrchr($_FILES['doc_file_final']['name'],'.'),1); //define o nome do arquivo
			$diretorio = "upload/published/"; //define o diretorio para onde enviaremos o arquivo	
			move_uploaded_file($_FILES['doc_file_final']['tmp_name'], $diretorio.$novo_nome); //efetua o upload			
		}
		if (isset($_FILES['pdf_file_final'])) {			
			$novo_nome = $_POST['doc_code'].".".substr(strrchr($_FILES['pdf_file_final']['name'],'.'),1); //define o nome do arquivo
			$diretorio = "upload/published/"; //define o diretorio para onde enviaremos o arquivo	
			move_uploaded_file($_FILES['pdf_file_final']['tmp_name'], $diretorio.$novo_nome); //efetua o upload			
		}

		if ($result){
			$_SESSION["flash"]["msg"]="Documento atualizado com sucesso!";
			$_SESSION["flash"]["sucesso"]=true;
		} else {
			$_SESSION["flash"]["msg"]="Falha ao atualizar documento!";
			$_SESSION["flash"]["sucesso"]=false;
		}

		// O trecho abaixo verifica os nomes dos documentos já cadastrados *** PRECISA DE AJUSTES ***
		/*
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
		*/
	}
	
	/*
    
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