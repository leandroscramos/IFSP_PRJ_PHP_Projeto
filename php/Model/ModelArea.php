<?php


class ModelArea
{
    private $id;
    private $initials;
    private $name;

    public function setAreaFromDatabase($area){
        $this->setId($area["id"])
            ->setInitials($area["initials"])
            ->setName($area["name"]);
    }

    public function setAreaFromPOST(){
        $this->setId(null)
               ->setInitials($_POST["areaInitials"])
               ->setName($_POST["areaName"]);
    }

    public function updateAreaFromPOST(){
        $this->setId($_POST["areaIdModalUpdate"])
               ->setInitials($_POST["areaInitialsUpdate"])
               ->setName($_POST["areaNameUpdate"]);
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