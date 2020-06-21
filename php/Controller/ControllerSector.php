<?php
include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/SectorDAO.php';
include_once $_SESSION["root"].'php/Model/ModelSector.php';

class ControllerSector {

    function readSector() {
        $sectorDAO = new SectorDAO();
        $sectors = $sectorDAO->readSector();
        //Util::debug($doctypes);
        return $sectors;
    }

    function createSector() {
		$sectorDAO = new SectorDAO();
		$sector = new ModelSector();
		
		if (($sectorDAO->readSectorByInitials($_POST['sectorInitials'])) != null) {
			$_SESSION["flash"]["msg"] = "Sigla do Setor já cadastrada!";
			$_SESSION["flash"]["sucesso"] = false;
		} else 
		if (($sectorDAO->readSectorByName($_POST['sectorName'])) != null) {
			$_SESSION["flash"]["msg"]="Nome do Setor já cadastrado!";
			$_SESSION["flash"]["sucesso"] = false;
		} else {
			$sector->setSectorFromPOST();        
			$result = $sectorDAO->createSector($sector);
			
			if ($result){
				$_SESSION["flash"]["msg"]="Setor cadastrado com sucesso!";
				$_SESSION["flash"]["sucesso"] = true;			
			} else {
				$_SESSION["flash"]["msg"]="Falha ao cadastrar Setor!";
				$_SESSION["flash"]["sucesso"] = false;           	
			}
		}
    }

    public function updateSector() {
        $sectorDAO = new SectorDAO();
		$sector = new ModelSector();
		/*
		if (($sectorDAO->readSectorByInitials($_POST['sectorInitialsUpdate'])) != null) {
			$_SESSION["flash"]["msg"] = "Sigla do Setor já cadastrada!";
			$_SESSION["flash"]["sucesso"] = false;
		} else 
		*/
		if (($sectorDAO->readSectorByName($_POST['sectorNameUpdate'])) != null) {
			$_SESSION["flash"]["msg"]="Nome do Setor já cadastrado!";
			$_SESSION["flash"]["sucesso"] = false;
		} else {
			$sector->updateSectorFromPOST();		
			$result = $sectorDAO->updateSector($sector);        
			if ($result){
				$_SESSION["flash"]["msg"]="Setor atualizado com sucesso!";
				$_SESSION["flash"]["sucesso"] = true;			
			} else {
				$_SESSION["flash"]["msg"]="Falha ao atualizar setor!";
				$_SESSION["flash"]["sucesso"] = false;           	
			}
		}
    }
    
    public function deleteSector() {
        $sectorDAO = new SectorDAO();        
        $result = $sectorDAO->deleteSector($_POST['idModalDelete']);
        
		if ($result){
			$_SESSION["flash"]["msg"]="Setor excluído com sucesso";
			$_SESSION["flash"]["sucesso"] = true;			
		} else {
			$_SESSION["flash"]["msg"]="Falha ao excluir Setor";
			$_SESSION["flash"]["sucesso"] = false;           	
		}
    }
}   