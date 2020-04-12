<?php


class ModelDocType
{
    private $id;
    private $name;
    private $level;

    public function setDocTypeFromDatabase($value){
        $this->setId($value["id"])
            ->setName($value["name"])
            ->setLevel($value["level"]);
    }

    public function setDocTypeFromPOST(){
        $this->setId(null)
               ->setName($_POST["docTypeTitle"])
               ->setLevel($_POST["docTypeLevel"]);
    }

    public function updateDocTypeFromPOST(){
        $this->setId($_POST["docTypeIdModalUpdate"])
               ->setName($_POST["docTypeTitleUpdate"])
               ->setLevel($_POST["docTypeLevelUpdate"]);
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

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }
}