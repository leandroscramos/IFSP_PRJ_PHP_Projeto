<?php


class ModelProcType
{
    private $id;
    private $initials;
    private $name;

    public function setProcTypeFromDatabase($procType){
        $this->setId($procType["id"])
            ->setInitials($procType["initials"])
            ->setName($procType["name"]);
    }

    public function setProcTypeFromPOST(){
        $this->setId(null)
               ->setInitials($_POST["procTypeInitials"])
               ->setName($_POST["procTypeName"]);
    }

    public function updateProcTypeFromPOST(){
        $this->setId($_POST["procTypeIdModalUpdate"])
               ->setInitials($_POST["procTypeInitialsUpdate"])
               ->setName($_POST["procTypeNameUpdate"]);
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