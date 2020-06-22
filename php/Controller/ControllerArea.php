<?php
include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/AreaDAO.php';
include_once $_SESSION["root"].'php/Model/ModelArea.php';

class ControllerArea {

    function readArea() {
        $areaDAO = new AreaDAO();
        $areas = $areaDAO->readArea();
        //Util::debug($doctypes);
        return $areas;
    }

    function createArea() {
		$areaDAO = new AreaDAO();
		$area = new ModelArea();
		
		if (($areaDAO->readAreaByInitials($_POST['areaInitials'])) != null) {
			$_SESSION["flash"]["msg"] = "Sigla da Área já cadastrada!";
			$_SESSION["flash"]["sucesso"] = false;
		} else 
		if (($areaDAO->readAreaByName($_POST['areaName'])) != null) {
			$_SESSION["flash"]["msg"]="Nome de Área já cadastrado!";
			$_SESSION["flash"]["sucesso"] = false;
		} else {
			$area->setAreaFromPOST();        
			$result = $areaDAO->createArea($area);
			
			if ($result){
				$_SESSION["flash"]["msg"]="Área cadastrada com sucesso!";
				$_SESSION["flash"]["sucesso"] = true;			
			} else {
				$_SESSION["flash"]["msg"]="Falha ao cadastrar Área!";
				$_SESSION["flash"]["sucesso"] = false;           	
			}
		}
    }

    public function updateArea() {
        $areaDAO = new AreaDAO();
		$area = new ModelArea();
		/*
		if (($areaDAO->readAreaByInitials($_POST['areaInitialsUpdate'])) != null) {
			$_SESSION["flash"]["msg"] = "Sigla do Setor já cadastrada!";
			$_SESSION["flash"]["sucesso"] = false;
		} else 
		*/
		if (($areaDAO->readAreaByName($_POST['areaNameUpdate'])) != null) {
			$_SESSION["flash"]["msg"]="Nome do Setor já cadastrado!";
			$_SESSION["flash"]["sucesso"] = false;
		} else {
			$area->updateAreaFromPOST();		
			$result = $areaDAO->updateArea($area);        
			if ($result){
				$_SESSION["flash"]["msg"]="Setor atualizado com sucesso!";
				$_SESSION["flash"]["sucesso"] = true;			
			} else {
				$_SESSION["flash"]["msg"]="Falha ao atualizar setor!";
				$_SESSION["flash"]["sucesso"] = false;           	
			}
		}
    }
    
    public function deleteArea() {
        $areaDAO = new AreaDAO();        
        $result = $areaDAO->deleteArea($_POST['idModalDelete']);
        
		if ($result){
			$_SESSION["flash"]["msg"]="Setor excluído com sucesso";
			$_SESSION["flash"]["sucesso"] = true;			
		} else {
			$_SESSION["flash"]["msg"]="Falha ao excluir Setor";
			$_SESSION["flash"]["sucesso"] = false;           	
		}
    }
}   