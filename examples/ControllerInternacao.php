<?php

require_once $_SESSION["root"].'php/DAO/InternacaoDAO.php';
require_once $_SESSION["root"].'php/PDF/SumariosAltaPDF.php';

	class ControllerInternacao
	{	        
        // Retorna, em formato de array, todos os sumário de alta no período informado.       
        public function getSumariosAlta($dataInicio,$dataFim) {			
			$sDAO = new InternacaoDAO();
            $sumarios = $sDAO->getSumariosAlta($dataInicio,$dataFim);
            return $sumarios;            
        }

        // Gera, via mpdf, um arquivo em pdf com o retorno do método getSumariosAlta.
        public function getSumariosAltaToPDF($dataInicio,$dataFim) {
            $sumarios = $this::getSumariosAlta($dataInicio,$dataFim);            
            $mpdf = new SumariosAltaPDF();
            $mpdf->BuildPDF($sumarios,$dataInicio,$dataFim);
        }

        // Retorna dados de paciente internado, dado um prontuário...
        public function getPacienteInternadoByProntuario($prontuario) {
            $pDAO = new InternacaoDAO();
            $paciente = $pDAO->getPacienteInternadoByProntuario($prontuario);
            return $paciente;
        }
        
	}