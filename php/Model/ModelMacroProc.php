<?php


class ModelMacroProc
{
    private $id;    
    private $name;
    private $number;
    private $id_proc_type;

    public function setMacroProcFromDatabase($macroProc){
        $this->setId($macroProc["id"])            
                ->setName($macroProc["name"])
                ->setnumber($macroProc["number"])
                ->setnumber($macroProc["id_proc_type"]);
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

    public function getIdProcType()
    {
        return $this->id_proc_type;
    }

    public function seIdProcType($id_proc_type)
    {
        $this->id_proc_type = $id_proc_type;
        return $this;
    }
}