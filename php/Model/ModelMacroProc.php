<?php
include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/ProcTypeDAO.php';

class ModelMacroProc
{
    private $id;    
    private $name;
    private $number;
    private $id_proc_type;
    private $macroProcType;

    public function setMacroProcFromDatabase($macroProc){        
        $macroProcTypeDAO = new ProcTypeDAO();
        $macroProcType = $macroProcTypeDAO->readProcTypeById($macroProc["id_proc_type"]);        
        $this->setId($macroProc["id"])            
                ->setName($macroProc["name"])
                ->setnumber($macroProc["number"])
                ->setIdProcType($macroProc["id_proc_type"])
                ->setMacroProcType($macroProcType);                
    }

    public function setMacroProcFromPOST(){
        $this->setId(null)               
                ->setName($_POST["macroProcName"])
                ->setnumber($_POST["macroProcNumber"])
                ->setIdProcType($_POST["idProcType"]);
    }

    public function updateMacroProcFromPOST(){
        $this->setId($_POST["macroProcIdModalUpdate"])
                ->setName($_POST["macroProcNameModalUpdate"])       
                ->setnumber($_POST["macroProcNumberModalUpdate"])
                ->setIdProcType($_POST["macroProcIdProcTypeModalUpdate"]);
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

    public function getIdProcType()
    {
        return $this->id_proc_type;        
    }

    public function setIdProcType($id_proc_type)
    {
        $this->id_proc_type = $id_proc_type;
        return $this;
    }

    public function getMacroProcType()
    {
        return $this->macroProcType;
    }

    public function setMacroProcType($macroProcType)
    {
        $this->macroProcType = $macroProcType;
        return $this;
    }

    
}