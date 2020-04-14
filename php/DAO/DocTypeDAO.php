<?php

include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelDocType.php';

class DocTypeDAO
{
    public function readDocType(){

        try { $sql = ('SELECT * FROM public.tb_doc_type ORDER BY name');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);
            $statement->execute();

            $records = $statement->fetchAll();
            //Verifico se houve algum retorno, senão retorno null
            if(count($records)==0)
                return null;
            //Var que irá armazenar um array de obj de tipos de documentos
            $doctypes;
            //Util::debug($linhas);
            foreach ($records as $value) {
                $doctype = new ModelDocType();
                $doctype->setDocTypeFromDatabase($value);
                $doctypes[]=$doctype;
            }
            return $doctypes;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }

    public function createDocType($doctype){			
        
		try { $sql = ('INSERT INTO public.tb_doc_type (name, level) VALUES (:name, :level)');
            
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();			
            $statement = $conn->prepare($sql);
            
            $statement->bindValue(":name", $doctype->getName());
            $statement->bindValue(":level", $doctype->getLevel());

            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();            
        }		
    }

    public function updateDocType($doctype) {
        
        try { $sql = ('UPDATE public.tb_doc_type SET name = :name, level = :level WHERE id = :id');

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindParam(':id', $doctype->getId()); 
            $statement->bindParam(':name', $doctype->getName()); 
            $statement->bindParam(':level', $doctype->getLevel()); 
            $statement->execute();
               
            return $statement->execute(); 
        } catch(PDOException $e) {
            echo "Erro ao atualizar registro da base de dados.".$e->getMessage();
        }
    }
    
    public function deleteDocType($id) {        

        try { $sql = ('DELETE FROM public.tb_doc_type WHERE id = :id');

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

    public function readDocTypeByName($name){

        try { $sql = ('SELECT * FROM public.tb_doc_type WHERE name = :name');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);
                        
            $statement->bindParam(':name', $name); 
            $statement->execute();

            $records = $statement->fetchAll();
            
            if(count($records)==0)
                return null;

            $doctypes;
            
            foreach ($records as $value) {
                $doctype = new ModelDocType();
                $doctype->setDocTypeFromDatabase($value);
                $doctypes[]=$doctype;
            }
            return $doctypes;

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }    
}