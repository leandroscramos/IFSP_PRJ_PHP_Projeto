<?php

    ini_set('memory_limit', '-1');
    ini_set('max_execution_time', '-1');
    require_once $_SESSION["root"].'includes/mpdf60/mpdf.php';
    include_once $_SESSION["root"].'php/Util/Util.php';

    class SumariosAltaPDF extends mpdf 
    {
        private $pdf = null;

        public function __construct(){}

        protected function getHeader($dataInicio,$dataFim){
            $retorno =  "<div align=\"center\">
                            <img src=\"../../intranet/includes/img/logo-hu-ebserh-pb.png\" height='58px'>                            
                        </div>                        
                        ";  
            return $retorno; 
        }

        protected function getFooter(){
            $retorno =  "<div class='footer'>
                            <div class='footerLeft'>&nbsp;</div>
                            <div class='footerCenter'>
                            Hospital Universitário da UFSCar - Prof Dr Horácio Carlos Panepucci - CNPJ: 15.126.437/0022-78<br>          
                            Rua  Luiz Vaz de Camões, nº 111, Bairro Vila Celina, São Carlos-SP<br>
                            CEP: 13566-488 - Tel: (16) 3509-2400<br><br>
                            </div>
                            <div class='footerRight'>
                            {PAGENO} de {nb}
                            </div>
                        </div>";  
            return $retorno;
        }

        private function getTabela($sumarios,$dataInicio,$dataFim){
            $retorno = "
                <style>                                       
                    
                    table {
                        table-layout: fixed;
                        width: 100%;
                        border-top: 0.3px solid black;
                        border-bottom: 0.3px solid black; 
                        page-break-inside: avoid;
                    }

                    table, th, td {                                
                        line-height: 10pt;
                        vertical-align: top;
                        font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;
                        font-size: 8pt;
                    }
                    
                    .titulo {
                        font-size: 10pt;
                        margin-top: 0.2em;
                        margin-bottom: 0.8em;
                        text-align: center;
                    }
                            
                    .footer {             
                    font-size: 8pt;              
                    }

                    .footerLeft {
                    float: left;
                    width: 10%;
                    }

                    .footerCenter {
                    float: left;
                    width: 80%;
                    text-align: center;
                    }

                    .footerRight {             
                    width: 10%;
                    text-valign: center;              
                    }
                
                </style>                        
            ";
            
            // Variáveis auxiliares utilizadas no foreach...
            $aux_unid_resid_anterior = '';
            $aux_paciente_anterior = NULL;
            $aux_data_internacao = NULL;
            $aux_primeira_passagem = true;

            foreach ($sumarios as $key => $valor){
                
                if ($aux_unid_resid_anterior != $valor[nm_unid_residencia]) {

                    if ($aux_primeira_passagem == false) {
                        $retorno .= "
                            <p style='page-break-after:always' ></p>                            
                        ";                        
                    }
                    $aux_primeira_passagem = false;

                    $retorno .= "
                        <p class='titulo'>RELATÓRIO DE ALTAS RESPONSÁVEIS - PERÍODO ".Util::parseDate($dataInicio)." À ".Util::parseDate($dataFim)."</p>
                    ";
                    
                    if ($valor[nm_unid_residencia] != NULL){
                        $retorno .= "
                            <h7 align='left'>Unidade de Residência: <strong>$valor[nm_unid_residencia]</strong></h7>
                        ";
                    } else { 
                        $retorno .= "
                            <h7 align='left'>Unidade de Residência: <strong>NÃO INFORMADA</strong></h7>
                        ";
                    }                    
                }
                
                // Normalizando o campo Complemento do endereço...
                if ($valor[tx_complemento] != NULL) {
                    $end_complemento = ", " + $valor[tx_complemento];
                } else {
                    $end_complemento = "";
                }                

                
                $bloco_paciente = false;
                if ($aux_paciente_anterior != $valor[nm_paciente]) {
                    $bloco_paciente = true;
                } else {
                    if ($aux_data_internacao != $valor[ts_internacao]) {                        
                        $bloco_paciente = true;
                    }
                }

                if ($bloco_paciente) {
                    $retorno .= "                                            
                        <table>
                            <tr>
                                <td colspan='2' width='67%'></td>
                                <td colspan='1' width='18%'></td>
                                <td colspan='1' width='15%'></td>
                            </tr>
                            <tr>
                            <tr>
                                <td colspan='2'>Nome: <strong>$valor[nm_paciente]</strong></td>
                                <td colspan='1'><strong>Internação:</strong> ".Util::parseDate($valor[ts_internacao])."</td>
                                <td colspan='1' align='right'><strong>Alta:</strong> ".Util::parseDate($valor[ts_alta_medica])."</td>
                            </tr>
                            <tr>
                                <td colspan='2'><strong>Endereço:</strong> ".mb_strtoupper($valor[tx_tipo_logr],'UTF-8').' '.$valor[tx_endereco].', '.$valor[nr_residencia].''. $end_complemento.', '.$valor[nm_bairro]."</td>
                                <td colspan='2'><strong>Telefone(s):</strong> ".$valor[nr_fone_1].' '.$valor[nr_fone_2]."</td>                            
                            </tr>
                            <tr>
                                <td colspan='4'><strong>Plano Alta:</strong> ".mb_strtoupper($valor[tx_plano_alta],'UTF-8')."</td>
                            </tr>
                        </table>                  
                    ";
                }

                $aux_unid_resid_anterior = $valor[nm_unid_residencia];
                $aux_paciente_anterior = $valor[nm_paciente];
                $aux_data_internacao = $valor[ts_internacao];
            }            

            $retorno = mb_convert_encoding($retorno, 'UTF-8', 'UTF-8');
            return $retorno;
        }

        public function BuildPDF($sumarios,$dataInicio,$dataFim){
            $this->pdf = new mPDF('',    // mode - default ''
                           'A4-P',    // format - A4, for example, default ''
                           0,     // font size - default 0
                           '',    // default font family
                           10,    // margin_left
                           10,    // margin right
                           25,     // margin top
                           20,    // margin bottom
                           6,     // margin header
                           0);    // margin footer
     
            $this->pdf->SetHTMLHeader($this->getHeader($dataInicio,$dataFim));      
            $this->pdf->SetHTMLFooter($this->getFooter()); 
            $this->pdf->WriteHTML($this->getTabela($sumarios,$dataInicio,$dataFim)); 
            $this->pdf->Output('Sumarios_de_Alta.pdf','D');
        }
        
    }
    