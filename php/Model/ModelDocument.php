<?php

include_once $_SESSION["root"].'php/DAO/DocTypeDAO.php';
include_once $_SESSION["root"].'php/DAO/AreaDAO.php';
include_once $_SESSION["root"].'php/DAO/ProcessDAO.php';

class ModelDocument
{
    private $id;
    private $title;
    private $code;
    private $doc_type;
    private $number;
    private $version;
    private $area;
    private $process;
    private $process_sei;
    private $document_sei;
    private $dispatch_sei;
    private $maker;
    private $reviewer;
    private $approver;
    private $validator;    
    private $approval_date;
    private $situation;
    private $status;       
    private $filename_doc;
    private $filename_doc_final;
    private $filename_pdf_final;
    private $user_submit;    
    private $submition_date;
    private $type_submit;
    

    public function setDocumentFromDatabase($document){        
        $doc_type = DocTypeDAO::readDocTypeById($document["doc_type"]);
        $area = AreaDAO::readAreaById($document["area"]);
        $process = ProcessDAO::readProcessById($document["process"]);
        $this->setId($document["id"])            
            ->setTitle($document["title"])
            ->setDocType($doc_type)
            ->setNumber($document["number"])
            ->setVersion($document["version"])
            ->setArea($area)
            ->setMaker($document["maker"])
            ->setReviewer($document["reviewer"])
            ->setValidator($document["validator"])
            ->setApprover($document["approver"])
            ->setStatus($document["status"])
            ->setSituation($document["situation"])
            ->setProcess($process)
            ->setCode($document["code"])
            ->setSubDate($document["created_at"])            
            ->setUserSubmit($document["submit_user"])
            ->setFilenameDoc($document["filename_doc_sub"])
            ->setFilenameDocFinal($document["filename_doc_final"])
            ->setFilenamePdfFinal($document["filename_pdf_final"])
            ->setTypeSubmit($document["submit_type"])
            ->setProcessSei($document["process_sei"])
            ->setDocSei($document["document_sei"])
            ->setDispatchSei($document["dispatch_sei"])
            ->setApprovalDate($document["approval_date"]);
    }

    public function setDocumentFromPOST(){
        $this->setId(null)
            ->setTitle($_POST["doc_title"])
            ->setCode($_POST["doc_code"])
            ->setDocType($_POST["doc_id_doctype"])
            ->setNumber($_POST["doc_number"])
            ->setVersion($_POST["doc_version"])
            ->setArea($_POST["doc_id_area"])
            ->setProcess($_POST["doc_id_process"])            
            ->setMaker($_POST["doc_maker"])
            ->setReviewer($_POST["doc_reviewer"])
            ->setValidator($_POST["doc_validator"])
            ->setApprover($_POST["doc_approver"])
            ->setApprovalDate($_POST["doc_approval_date"])
            ->setSituation($_POST["doc_situation"])
            ->setStatus($_POST["status"])            
            ->setFilenameDoc($_POST['doc_code'].".".substr(strrchr($_FILES['doc_file_sub']['name'],'.'),1))
            ->setUserSubmit($_SESSION["login"]["usuario"])
            ->setTypeSubmit($_POST["type_submit"])
            ->setProcessSei($_POST["process_sei"])
            ->setDocSei($_POST["document_sei"])
            ->setDispatchSei($_POST["dispatch_sei"]);
    }

    public function updateDocumentFromPOST(){
        $this->setId($_POST["id_document"])            
            ->setTitle($_POST["doc_title"]) 
            ->setTypeSubmit($_POST["type_submit"])
            ->setApprovalDate($_POST["doc_approval_date"])
            ->setDocType($_POST["doc_id_doctype"])
            ->setNumber($_POST["doc_number"])
            ->setVersion($_POST["doc_version"])
            ->setArea($_POST["doc_id_area"])
            ->setMaker($_POST["doc_maker"])
            ->setReviewer($_POST["doc_reviewer"])
            ->setValidator($_POST["doc_validator"])
            ->setApprover($_POST["doc_approver"])
            ->setProcess($_POST["doc_id_process"])  
            ->setProcessSei($_POST["process_sei"])
            ->setDocSei($_POST["document_sei"])
            ->setDispatchSei($_POST["dispatch_sei"])
            ->setSituation($_POST["doc_situation"])
            ->setStatus($_POST["status"]);
    }

    public function uploadDocPdfFromPost() {
        $this->setId($_POST["id_document"])
            ->setFilenameDocFinal($_POST['doc_code'].".".substr(strrchr($_FILES['doc_file_final']['name'],'.'),1))
            ->setFilenamePdfFinal($_POST['doc_code'].".".substr(strrchr($_FILES['pdf_file_final']['name'],'.'),1));
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

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    
    }
    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getDocType()
    {
        return $this->doc_type;
    }

    public function setDocType($doc_type)
    {
        $this->doc_type = $doc_type;
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

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    public function getArea()
    {
        return $this->area;
    }

    public function setArea($area)
    {
        $this->area = $area;
        return $this;
    }

    public function getProcess()
    {
        return $this->process;
    }

    public function setProcess($process)
    {
        $this->process = $process;
        return $this;
    }

    public function getProcessSei()
    {
        return $this->process_sei;
    }

    public function setProcessSei($process_sei)
    {
        $this->process_sei = $process_sei;
        return $this;
    }

    public function getDocSei()
    {
        return $this->document_sei;
    }

    public function setDocSei($document_sei)
    {
        $this->document_sei = $document_sei;
        return $this;
    }

    public function getDispatchSei()
    {
        return $this->dispatch_sei;
    }

    public function setDispatchSei($dispatch_sei)
    {
        $this->dispatch_sei = $dispatch_sei;
        return $this;
    }
    
    public function getMaker()
    {
        return $this->maker;
    }

    public function setMaker($maker)
    {
        $this->maker = $maker;
        return $this;
    }
    
    public function getReviewer()
    {
        return $this->reviewer;
    }

    public function setReviewer($reviewer)
    {
        $this->reviewer = $reviewer;
        return $this;
    }
    
    public function getValidator()
    {
        return $this->validator;
    }

    public function setValidator($validator)
    {
        $this->validator = $validator;
        return $this;
    }

    public function getApprover()
    {
        return $this->approver;
    }

    public function setApprover($approver)
    {
        $this->approver = $approver;
        return $this;
    }

    public function getApprovalDate()
    {
        return $this->approval_date;
    }

    public function setApprovalDate($approval_date)
    {
        $this->approval_date = $approval_date;
        return $this;
    }

    public function getSituation()
    {
        return $this->situation;
    }

    public function setSituation($situation)
    {
        $this->situation = $situation;
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

    public function getSubDate()
    {
        return $this->submition_date;
    }

    public function setSubDate($submition_date)
    {
        $this->submition_date = $submition_date;
        return $this;
    }

    public function getFilenameDoc()
    {
        return $this->filename_doc;
    }

    public function setFilenameDoc($filename_doc)
    {
        $this->filename_doc = $filename_doc;
        return $this;
    }

    public function getFilenameDocFinal()
    {
        return $this->filename_doc_final;
    }

    public function setFilenameDocFinal($filename_doc_final)
    {
        $this->filename_doc_final = $filename_doc_final;
        return $this;
    }

    public function getFilenamePdfFinal()
    {
        return $this->filename_pdf_final;
    }

    public function setFilenamePdfFinal($filename_pdf_final)
    {
        $this->filename_pdf_final = $filename_pdf_final;
        return $this;
    }

    public function getUserSubmit()
    {
        return $this->user_submit;
    }

    public function setUserSubmit($user_submit)
    {
        $this->user_submit = $user_submit;
        return $this;
    }

    public function getTypeSubmit()
    {
        return $this->type_submit;
    }

    public function setTypeSubmit($type_submit)
    {
        $this->type_submit = $type_submit;
        return $this;
    }
}