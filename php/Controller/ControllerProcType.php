<?php
include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/ProcTypeDAO.php';
include_once $_SESSION["root"].'php/Model/ModelProcType.php';

class ControllerProcType {

    static function readProcType() {
        $procTypeDAO = new ProcTypeDAO();
        $procTypes = $procTypeDAO->readProcType();
        //Util::debug($doctypes);
        return $procTypes;
    }

    function createProcType() {
		$procTypeDAO = new ProcTypeDAO();
		$procType = new ModelProcType();
		
		// if (($procTypeDAO->readProcTypeByInitials($_POST['procTypeInitials'])) != null) {
		// 	$_SESSION["flash"]["msg"] = "Sigla do Tipo de Macroprocesso já cadastrada!";
		// 	$_SESSION["flash"]["sucesso"] = false;
		// } else 
		// if (($procTypeDAO->readProcTypeByName($_POST['procTypeName'])) != null) {
		// 	$_SESSION["flash"]["msg"]="Nome do Tipo de Macroprocesso já cadastrado!";
		// 	$_SESSION["flash"]["sucesso"] = false;
		// } else {
			$procType->setProcTypeFromPOST();        
			$result = $procTypeDAO->createProcType($procType);
			
			if ($result){
				$_SESSION["flash"]["msg"]="Tipo de Macroprocesso cadastrado com sucesso!";
				$_SESSION["flash"]["sucesso"] = true;			
			} else {
				$_SESSION["flash"]["msg"]="Falha ao cadastrar Tipo de Macroprocesso!";
				$_SESSION["flash"]["sucesso"] = false;           	
			}
		// }
    }

    public function updateProcType() {
        $procTypeDAO = new ProcTypeDAO();
		$procType = new ModelProcType();
		
		// if (($procTypeDAO->readProcTypeByInitials($_POST['procTypeInitialsUpdate'])) != null) {
		// 	$_SESSION["flash"]["msg"] = "Sigla do Tipo de Macroprocesso já cadastrada!";
		// 	$_SESSION["flash"]["sucesso"] = false;
		// } else 
		// if (($procTypeDAO->readProcTypeByName($_POST['procTypeNameUpdate'])) != null) {
		// 	$_SESSION["flash"]["msg"]="Nome do Tipo de Macroprocesso já cadastrado!";
		// 	$_SESSION["flash"]["sucesso"] = false;
		// } else {
			$procType->updateProcTypeFromPOST();		
			$result = $procTypeDAO->updateProcType($procType);        
			if ($result){
				$_SESSION["flash"]["msg"]="Tipo de Macroprocesso atualizado com sucesso!";
				$_SESSION["flash"]["sucesso"] = true;			
			} else {
				$_SESSION["flash"]["msg"]="Falha ao atualizar Tipo de Macroprocesso!";
				$_SESSION["flash"]["sucesso"] = false;           	
			}
		// }
    }
    
    public function deleteProcType() {
        $procTypeDAO = new ProcTypeDAO();        
        $result = $procTypeDAO->deleteProcType($_POST['idModalDelete']);
        
		if ($result){
			$_SESSION["flash"]["msg"]="Tipo de Macroprocesso excluído com sucesso";
			$_SESSION["flash"]["sucesso"] = true;			
		} else {
			$_SESSION["flash"]["msg"]="Falha ao excluir Tipo de Macroprocesso";
			$_SESSION["flash"]["sucesso"] = false;           	
		}
    }
}   