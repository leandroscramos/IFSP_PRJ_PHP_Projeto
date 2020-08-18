<?php
include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/MacroProcDAO.php';
include_once $_SESSION["root"].'php/Model/ModelMacroProc.php';

class ControllerMacroProc {

    static function readMacroProc() {
        $macroProcDAO = new MacroProcDAO();
        $macroProcs = $macroProcDAO->readMacroProc();        
        return $macroProcs;
    }

    function createMacroProc() {
		$macroProcDAO = new MacroProcDAO();
		$macroProc = new ModelMacroProc();		
		
		$macroProc->setMacroProcFromPOST();
		$result = $macroProcDAO->createMacroProc($macroProc);
		
		if ($result){
			$_SESSION["flash"]["msg"]="Tipo de Macroprocesso cadastrado com sucesso!";
			$_SESSION["flash"]["sucesso"] = true;			
		} else {
			$_SESSION["flash"]["msg"]="Falha ao cadastrar Tipo de Macroprocesso!";
			$_SESSION["flash"]["sucesso"] = false;           	
		}		
    }

    public function updateMacroProc() {
        $macroProcDAO = new MacroProcDAO();
		$macroProc = new ModelMacroProc();
		
		if (($macroProcDAO->readMacroProcByInitials($_POST['procTypeInitialsUpdate'])) != null) {
			$_SESSION["flash"]["msg"] = "Sigla do Tipo de Macroprocesso já cadastrada!";
			$_SESSION["flash"]["sucesso"] = false;
		} else 
		if (($macroProcDAO->readMacroProcByName($_POST['procTypeNameUpdate'])) != null) {
			$_SESSION["flash"]["msg"]="Nome do Tipo de Macroprocesso já cadastrado!";
			$_SESSION["flash"]["sucesso"] = false;
		} else {
			$macroProc->updateMacroProcFromPOST();		
			$result = $macroProcDAO->updateMacroProc($macroProc);        
			if ($result){
				$_SESSION["flash"]["msg"]="Tipo de Macroprocesso atualizado com sucesso!";
				$_SESSION["flash"]["sucesso"] = true;			
			} else {
				$_SESSION["flash"]["msg"]="Falha ao atualizar Tipo de Macroprocesso!";
				$_SESSION["flash"]["sucesso"] = false;           	
			}
		}
    }
    
    public function deleteMacroProc() {
        $macroProcDAO = new MacroProcDAO();
        $result = $macroProcDAO->deleteMacroProc($_POST['idModalDelete']);
        
		if ($result){
			$_SESSION["flash"]["msg"]="Tipo de Macroprocesso excluído com sucesso";
			$_SESSION["flash"]["sucesso"] = true;			
		} else {
			$_SESSION["flash"]["msg"]="Falha ao excluir Tipo de Macroprocesso";
			$_SESSION["flash"]["sucesso"] = false;           	
		}
    }
}   