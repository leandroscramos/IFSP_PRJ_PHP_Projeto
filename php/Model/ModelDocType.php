<?php


class ModelDocType
{
    private $id;
    private $name;
    private $initials;
    private $level;

    public function setDocTypeFromDatabase($value){
        $this->setId($value["id"])
            ->setName($value["name"])
            ->setInitials($value["initials"])
            ->setLevel($value["level"]);
    }

    public function setDocTypeFromPOST(){
        $this->setId(null)
               ->setName($_POST["docTypeTitle"])
               ->setInitials($_POST["docTypeInitials"])
               ->setLevel($_POST["docTypeLevel"]);
    }

    public function updateDocTypeFromPOST(){
        $this->setId($_POST["docTypeIdModalUpdate"])
               ->setName($_POST["docTypeTitleUpdate"])
               ->setInitials($_POST["docTypeInitialsUpdate"])
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

    public function getInitials()
    {
        return $this->initials;
    }

    public function setInitials($initials)
    {
        $this->initials = $initials;
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