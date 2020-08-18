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
    private $status;

    public function setProcessFromDatabase($process){        
        $macroProcDAO = new MacroProcDAO();
        $macroProcess = $macroProcDAO->readMacroProcById($process["id_macroprocess"]);        
        $this->setId($process["id"])            
                ->setName($process["name"])
                ->setnumber($process["number"])
                ->seIdMacroProc($process["id_macroprocess"])
                ->setMacroProcess($macroProcess)
                ->setStatus($process["status"]);                
    }

    public function setProcessFromPOST(){
        $this->setId(null)               
                ->setName($_POST["processName"])
                ->setnumber($_POST["processNumber"])
                ->seIdMacroProc($_POST["id_macroprocess"])
                ->setStatus($_POST["processStatus"]);
    }

    public function updateProcessFromPOST(){
        $this->setId($_POST["processIdModalUpdate"])
                ->setName($_POST["processNameModalUpdate"])       
                ->setNumber($_POST["processNumberModalUpdate"])
                ->seIdMacroProc($_POST["processIdMacroProcModalUpdate"])
                ->setStatus($_POST["processStatusModalUpdate"]);    
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

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    
}