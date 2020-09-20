<?php

include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelDocument.php';

class DocumentDAO
{
    public function readDocument(){

        try { $sql = ('SELECT * FROM public.tb_documents ORDER BY created_at DESC');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);
            $statement->execute();

            $records = $statement->fetchAll();            
            if(count($records)==0)
                return null;
            
            $documents;            
            foreach ($records as $value) {
                $document = new ModelDocument();
                $document->setDocumentFromDatabase($value);
                $documents[]=$document;
            }
            return $documents;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }


    public function readDocumentPublished(){

        try { $sql = ('SELECT * FROM public.tb_documents WHERE status = :status AND situation = :situation ORDER BY created_at DESC');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $status = 3;
            $statement->bindParam(':status', $status); 
            $situation = "A";
            $statement->bindParam(':situation', $situation); 
            $statement->execute();

            $records = $statement->fetchAll();            
            if(count($records)==0)
                return null;
            
            $documents;            
            foreach ($records as $value) {
                $document = new ModelDocument();
                $document->setDocumentFromDatabase($value);
                $documents[]=$document;
            }
            return $documents;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }


    public function readDocumentByUser($user){

        try { $sql = ('SELECT * FROM public.tb_documents WHERE submit_user = :user ORDER BY created_at DESC');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindParam(':user', $user); 
            $statement->execute();

            $records = $statement->fetchAll();            
            if(count($records)==0)
                return null;
            
            $documents;            
            foreach ($records as $value) {
                $document = new ModelDocument();
                $document->setDocumentFromDatabase($value);
                $documents[]=$document;
            }
            return $documents;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }

    public function readDocumentById($id){

        try { $sql = ('SELECT * FROM public.tb_documents WHERE id = :id');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindParam(':id', $id);             
            $statement->execute();

            $records = $statement->fetchAll();
            if(count($records)==0)
                return null;
            
            //$documents;            
            foreach ($records as $value) {
                $document = new ModelDocument();
                $document->setDocumentFromDatabase($value);
                //$documents[]=$document;
            }
            return $document;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }

    public function createDocument($document){

        try {

            $sql = ('INSERT INTO public.tb_documents (title, doc_type, number, version, area, process, maker, reviewer, validator, approver, approval_date, created_at, status, code, filename_doc_sub, submit_user, situation, submit_type, process_sei, document_sei, dispatch_sei) 
                        VALUES (:title, :doc_type, :number, :version, :area, :process, :maker, :reviewer, :validator, :approver, :approval_date, now(), :status, :code, :filename_doc_sub, :submit_user, :situation, :submit_type, :process_sei, :document_sei, :dispatch_sei)
            ');

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindValue(":title", $document->getTitle());
            $statement->bindValue(":code", $document->getCode());
            $statement->bindValue(":doc_type", $document->getDocType());
            $statement->bindValue(":number", $document->getNumber());
            $statement->bindValue(":version", $document->getVersion());
            $statement->bindValue(":area", $document->getArea());
            $statement->bindValue(":process", $document->getProcess());
            $statement->bindValue(":maker", $document->getMaker());
            $statement->bindValue(":reviewer", $document->getReviewer());
            $statement->bindValue(":validator", $document->getValidator());
            $statement->bindValue(":approver", $document->getApprover());
            $statement->bindValue(":approval_date", $document->getApprovalDate());
            $statement->bindValue(":status", $document->getStatus());
            $statement->bindValue(":filename_doc_sub", $document->getFilenameDoc());
            $statement->bindValue(":submit_user", $document->getUserSubmit());
            $statement->bindValue(":situation", $document->getSituation());
            $statement->bindValue(":submit_type", $document->getTypeSubmit());
            $statement->bindValue(":process_sei", $document->getProcessSei());
            $statement->bindValue(":document_sei", $document->getDocSei());
            $statement->bindValue(":dispatch_sei", $document->getDispatchSei());



            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }
    }

    public function updateDocument($document) {

        try {

            $sql = ('UPDATE public.tb_documents SET title = :title, submit_type = :type_submit, approval_date = :doc_approval_date, doc_type = :doc_id_doctype,
                                                    number = :number, version = :version, area = :area, maker = :maker, reviewer = :reviewer, validator = :validator,
                                                    approver = :approver, process = :process, process_sei = :process_sei, document_sei = :document_sei,
                                                    dispatch_sei = :dispatch_sei, code = :code, situation = :situation, status = :status
                    WHERE id = :id');

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindValue(":id", $document->getId());
            $statement->bindValue(":title", $document->getTitle());
            $statement->bindValue(":type_submit", $document->getTypeSubmit());
            $statement->bindValue(":doc_approval_date", $document->getApprovalDate());
            $statement->bindValue(":doc_id_doctype", $document->getDocType());
            $statement->bindValue(":number", $document->getNumber());
            $statement->bindValue(":version", $document->getVersion());
            $statement->bindValue(":area", $document->getArea());
            $statement->bindValue(":maker", $document->getMaker());
            $statement->bindValue(":reviewer", $document->getReviewer());
            $statement->bindValue(":validator", $document->getValidator());
            $statement->bindValue(":approver", $document->getApprover());
            $statement->bindValue(":process", $document->getProcess());
            $statement->bindValue(":process_sei", $document->getProcessSei());
            $statement->bindValue(":document_sei", $document->getDocSei());
            $statement->bindValue(":dispatch_sei", $document->getDispatchSei());
            $statement->bindValue(":code", $document->getCode());
            $statement->bindValue(":situation", $document->getSituation());
            $statement->bindValue(":status", $document->getStatus());

            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }
    }

    public function uploadDocPdf($document) {

        try {

            $sql = ('UPDATE public.tb_documents SET filename_doc_final = :filename_doc_final, filename_pdf_final = :filename_pdf_final
                    WHERE id = :id');

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindValue(":id", $document->getId());
            $statement->bindValue(":filename_doc_final", $document->getFilenameDocFinal());
            $statement->bindValue(":filename_pdf_final", $document->getFilenamePdfFinal());

            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }
    }

    public function deleteDocument($id) {

        try { $sql = ('DELETE FROM public.tb_doc_ument WHERE id = :id');

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindParam(':id', $id); 
            $statement->execute();

            return $statement->execute(); 
        } catch(PDOException $e) {
            echo "Erro ao excluir registro da base de dados.".$e->getMessage();
        }
    }

    public function readDocumentByName($name){

        try { $sql = ('SELECT * FROM public.tb_doc_ument WHERE name = :name');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);
                        
            $statement->bindParam(':name', $name); 
            $statement->execute();

            $records = $statement->fetchAll();
            
            if(count($records)==0)
                return null;

            $documents;
            
            foreach ($records as $value) {
                $document = new ModelDocument();
                $document->setDocumentFromDatabase($value);
                $documents[]=$document;
            }
            return $documents;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }    
}