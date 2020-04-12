<?php

require_once $_SESSION["root"].'php/DAO/VisitantesDAO.php';

	class ControllerVisitantes
	{		
		function getVisitantes(){
			
            $vDAO = new VisitantesDAO();
            $visitantes=$vDAO->getVisitantes();			

			return $visitantes;
		}
	}