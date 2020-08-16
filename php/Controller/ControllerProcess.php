<?php
include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/ProcessDAO.php';
include_once $_SESSION["root"].'php/Model/ModelProcess.php';

class ControllerProcess {

    function readProcess() {
        $processDAO = new ProcessDAO();
        $processs = $processDAO->readProcess();        
        return $processs;
    }

	
    function createProcess() {
		$processDAO = new ProcessDAO();
		$process = new ModelProcess();
		/*
		if (($macroProcDAO->readMacroProcByInitials($_POST['procTypeInitials'])) != null) {
			$_SESSION["flash"]["msg"] = "Sigla do Tipo de Macroprocesso já cadastrada!";
			$_SESSION["flash"]["sucesso"] = false;
		} else 
		if (($macroProcDAO->readMacroProcByName($_POST['procTypeName'])) != null) {
			$_SESSION["flash"]["msg"]="Nome do Tipo de Macroprocesso já cadastrado!";
			$_SESSION["flash"]["sucesso"] = false;
		} else {
		*/
			$process->setProcessFromPOST();        
			$result = $processDAO->createProcess($process);
			
			if ($result){
				$_SESSION["flash"]["msg"]="Processo cadastrado com sucesso!";
				$_SESSION["flash"]["sucesso"] = true;
				$_SESSION["flash"]["processo"] = $process->getName();
				$_SESSION["flash"]["numero"] = $process->getNumber();
				$_SESSION["flash"]["macroprocesso"] = $process->getIdMacroProc();			
			} else {
				$_SESSION["flash"]["msg"]="Falha ao cadastrar Processo!";
				$_SESSION["flash"]["sucesso"] = false;           	
				$_SESSION["flash"]["processo"] = $process->getName();
				$_SESSION["flash"]["numero"] = $process->getNumber();
				$_SESSION["flash"]["macroprocesso"] = $process->getIdMacroProc();
			}
		/*
		}
		*/
    }

	
    public function updateProcess() {
        $processDAO = new ProcessDAO();
		$process = new ModelProcess();
		
		/* if (($macroProcDAO->readMacroProcByInitials($_POST['procTypeInitialsUpdate'])) != null) {
			$_SESSION["flash"]["msg"] = "Sigla do Tipo de Macroprocesso já cadastrada!";
			$_SESSION["flash"]["sucesso"] = false;
		} else 
		if (($macroProcDAO->readMacroProcByName($_POST['procTypeNameUpdate'])) != null) {
			$_SESSION["flash"]["msg"]="Nome do Tipo de Macroprocesso já cadastrado!";
			$_SESSION["flash"]["sucesso"] = false;
		} else { */
			$process->updateProcessFromPOST();		
			$result = $processDAO->updateProcess($process);        
			if ($result){
				$_SESSION["flash"]["msg"]="Processo atualizado com sucesso!";
				$_SESSION["flash"]["sucesso"] = true;			
			} else {
				$_SESSION["flash"]["msg"]="Falha ao atualizar Processo!";
				$_SESSION["flash"]["sucesso"] = false;           	
			}
		//}
    }
    
    public function deleteProcess() {
        $processDAO = new ProcessDAO();
        $result = $processDAO->deleteProcess($_POST['idModalDelete']);
        
		if ($result){
			$_SESSION["flash"]["msg"]="Processo excluído com sucesso";
			$_SESSION["flash"]["sucesso"] = true;			
		} else {
			$_SESSION["flash"]["msg"]="Falha ao excluir Processo";
			$_SESSION["flash"]["sucesso"] = false;           	
		}
	}
	
}   