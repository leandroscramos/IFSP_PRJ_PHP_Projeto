<?php
include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/MacroProcDAO.php';

class ModelProcess
{
    private $id;    
    private $name;
    private $number;
    private $id_macroprocess;
    private $macroProcess;

    public function setProcessFromDatabase($process){        
        $macroProcDAO = new MacroProcDAO();
        $macroProcess = $macroProcDAO->readMacroProcById($process["id_macroprocess"]);        
        $this->setId($process["id"])            
                ->setName($process["name"])
                ->setnumber($process["number"])
                ->seIdMacroProc($process["id_macroprocess"])
                ->setMacroProcess($macroProcess);                
    }

    public function setMacroProcFromPOST(){
        $this->setId(null)               
                ->setName($_POST["macroProcName"])
                ->setnumber($_POST["macroProcNumber"]);
    }

    public function updateMacroProcFromPOST(){
        $this->setId($_POST["macroProcIdModalUpdate"])
                ->setName($_POST["macroProcNameUpdate"])       
                ->setnumber($_POST["macroProcNumberUpdate"]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    public function getIdMacroProc()
    {
        return $this->id_macroprocess;        
    }

    public function seIdMacroProc($id_macroprocess)
    {
        $this->id_macroprocess = $id_macroprocess;
        return $this;
    }

    public function getMacroProcess()
    {
        return $this->macroProcess;
    }

    public function setMacroProcess($macroProcess)
    {
        $this->macroProcess = $macroProcess;
        return $this;
    }

    
}