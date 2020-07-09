<?php

include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelDocument.php';

class DocumentDAO
{
    public function readDocument(){

        try { $sql = ('SELECT * FROM public.tb_documents ORDER BY id');
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

    public function readDocumentByUser($user){

        try { $sql = ('SELECT * FROM public.tb_documents WHERE submit_user = :user ORDER BY id');
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

    public function createDocument($document){			
        
        //try { $sql = ('INSERT INTO public.tb_documents (title, doc_type, number, version, area, process, maker, reviewer, validator, approver, approval_date, changes) 
        //                VALUES (:title, :doc_type, :number, :version, :area, :process, :maker, :reviewer, :validator, :approver, :approval_date, :changes)
        //             ');

        try { $sql = ('INSERT INTO public.tb_documents (title, doc_type, number, version, area, process, maker, reviewer, validator, approver, approval_date, created_at, status, code, filename_doc, submit_user) 
                        VALUES (:title, :doc_type, :number, :version, :area, :process, :maker, :reviewer, :validator, :approver, :approval_date, now(), :status, :code, :filename_doc, :submit_user)
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
            $statement->bindValue(":filename_doc", $document->getFilenameDoc());
            $statement->bindValue(":submit_user", $document->getSubmitUser());

            //$statement->bindValue(":changes", $document->getChanges());            
            
            return $statement->execute();            

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();            
        }		
    }

    public function updateDocument($document) {
        
        try { $sql = ('UPDATE public.tb_doc_ument SET level = :level, max_rev_period = :max_rev_period WHERE id = :id');

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindParam(':id', $document->getId()); 
            //$statement->bindParam(':name', $document->getName()); 
            //$statement->bindParam(':initials', $document->getInitials()); 
            $statement->bindParam(':level', $document->getLevel()); 
            $statement->bindParam(':max_rev_period', $document->getRev()); 
            $statement->execute();
               
            return $statement->execute(); 
        } catch(PDOException $e) {
            echo "Erro ao atualizar registro da base de dados.".$e->getMessage();
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