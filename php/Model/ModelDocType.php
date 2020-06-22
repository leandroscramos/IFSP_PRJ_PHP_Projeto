<?php


class ModelDocType
{
    private $id;
    private $name;
    private $initials;
    private $level;
    private $rev;

    public function setDocTypeFromDatabase($value){
        $this->setId($value["id"])
            ->setName($value["name"])
            ->setInitials($value["initials"])
            ->setLevel($value["level"])
            ->setRev($value["max_rev_period"]);
    }

    public function setDocTypeFromPOST(){
        $this->setId(null)
               ->setName($_POST["docTypeTitle"])
               ->setInitials($_POST["docTypeInitials"])
               ->setLevel($_POST["docTypeLevel"])
               ->setRev($_POST["docTypeRev"]);
    }

    public function updateDocTypeFromPOST(){
        $this->setId($_POST["docTypeIdModalUpdate"])
               ->setName($_POST["docTypeTitleUpdate"])
               ->setInitials($_POST["docTypeInitialsUpdate"])
               ->setLevel($_POST["docTypeLevelUpdate"])
               ->setRev($_POST["docTypeRevUpdate"]);
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

    public function getRev()
    {
        return $this->rev;
    }

    public function setRev($rev)
    {
        $this->rev = $rev;
        return $this;
    }
}