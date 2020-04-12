<?php


class ModelSector
{
    private $id;
    private $initials;
    private $name;

    public function setSectorFromDatabase($sector){
        $this->setId($sector["id"])
            ->setInitials($sector["initials"])
            ->setName($sector["name"]);
    }

    public function setSectorFromPOST(){
        $this->setId(null)
               ->setInitials($_POST["sectorInitials"])
               ->setName($_POST["sectorName"]);
    }

    public function updateSectorFromPOST(){
        $this->setId($_POST["sectorIdModalUpdate"])
               ->setInitials($_POST["sectorInitialsUpdate"])
               ->setName($_POST["sectorNameUpdate"]);
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
}