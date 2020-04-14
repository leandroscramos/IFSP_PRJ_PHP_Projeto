<?php
include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DocTypeDAO.php';
include_once $_SESSION["root"].'php/Model/ModelDocType.php';

class ControllerDocType {

    public function readDocType() {
        $doctypeDAO = new DocTypeDAO();
        $doctypes = $doctypeDAO->readDocType();
        //Util::debug($doctypes);
        return $doctypes;
    }

    public function createDocType() {
		$doctypeDAO = new DocTypeDAO();
		$doctype = new ModelDocType();
		
		if (($doctypeDAO->readDocTypeByName($_POST['docTypeTitle'])) == null) {
			$doctype->setDocTypeFromPOST();        
			$result = $doctypeDAO->createDocType($doctype);
			
			if ($result){
				$_SESSION["flash"]["msg"]="Tipo de documento cadastrado com sucesso!";
				$_SESSION["flash"]["sucesso"]=true;			
			} else {
				$_SESSION["flash"]["msg"]="Falha ao cadastrar tipo de documento!";
				$_SESSION["flash"]["sucesso"]=false;           	
			}; 
		} else {
			$_SESSION["flash"]["msg"]="Tipo de documento já cadastrado!";
			$_SESSION["flash"]["sucesso"]=false;
		}
    }

    public function updateDocType() {
        $doctypeDAO = new DocTypeDAO();
		$doctype = new ModelDocType();
		
		if (($doctypeDAO->readDocTypeByName($_POST['docTypeTitleUpdate'])) == null) {
			$doctype->updateDocTypeFromPOST();		
			$result = $doctypeDAO->updateDocType($doctype);        
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
    
    public function deleteDocType() {
        $doctypeDAO = new DocTypeDAO();        
        $result = $doctypeDAO->deleteDocType($_POST['idModalDelete']);
        
		if ($result){
			$_SESSION["flash"]["msg"]="Tipo de documento excluído com sucesso!";
			$_SESSION["flash"]["sucesso"]=true;			
		} else {
			$_SESSION["flash"]["msg"]="Falha ao excluir tipo de documento!";
			$_SESSION["flash"]["sucesso"]=false;			
		}
    }
    
}   