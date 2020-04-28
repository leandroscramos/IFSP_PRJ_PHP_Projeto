<?php

include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelProcType.php';

class ProcTypeDAO
{
    public function readProcType(){

        try { $sql = ('SELECT * FROM public.tb_process_type ORDER BY initials');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);
            $statement->execute();

            $records = $statement->fetchAll();
            //Verifico se houve algum retorno, senão retorno null
            if(count($records)==0)
                return null;
            //Var que irá armazenar um array de obj do tipo funcionário
            $procTypes;
            //Util::debug($linhas);
            foreach ($records as $value) {
                $procType = new ModelProcType();
                $procType->setProcTypeFromDatabase($value);
                $procTypes[]=$procType;
            }
            return $procTypes;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }    

    public function createProcType($procType){			
        
		try { $sql = "INSERT INTO public.tb_process_type (initials, name) VALUES (:initials, :name)";
            
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();			
            $statement = $conn->prepare($sql);
            
            $statement->bindValue(":initials", $procType->getInitials());
            $statement->bindValue(":name", $procType->getName());

            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();            
        }		
    }

    public function updateProcType($procType) {
        
        try { $sql = ('UPDATE public.tb_process_type SET initials = :initials, name = :name WHERE id = :id');

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindParam(':id', $procType->getId()); 
            $statement->bindParam(':initials', $procType->getInitials()); 
            $statement->bindParam(':name', $procType->getName()); 
            $statement->execute();
               
            return $statement->execute(); 
        } catch(PDOException $e) {
            echo "Erro ao atualizar registro da base de dados.".$e->getMessage();
        }
    }
    
    public function deleteProcType($id) {        

        try { $sql = ('DELETE FROM public.tb_process_type WHERE id = :id');

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

    public function readProcTypeByName($name){

        try { $sql = ('SELECT * FROM public.tb_process_type WHERE name = :name');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);
                        
            $statement->bindParam(':name', $name); 
            $statement->execute();

            $records = $statement->fetchAll();
            //Verifico se houve algum retorno, senão retorno null
            if(count($records)==0)
                return null;
            //Var que irá armazenar um array de obj do tipo funcionário
            $procTypes;
            //Util::debug($linhas);
            foreach ($records as $value) {
                $procType = new ModelProcType();
                $procType->setProcTypeFromDatabase($value);
                $procTypes[]=$procType;
            }
            return $procTypes;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }
    
    public function readProcTypeByInitials($initials){

        try { $sql = ('SELECT * FROM public.tb_process_type WHERE initials = :initials');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);
                        
            $statement->bindParam(':initials', $initials); 
            $statement->execute();

            $records = $statement->fetchAll();
            //Verifico se houve algum retorno, senão retorno null
            if(count($records)==0)
                return null;
            //Var que irá armazenar um array de obj do tipo funcionário
            $procTypes;
            //Util::debug($linhas);
            foreach ($records as $value) {
                $procType = new ModelProcType();
                $procType->setProcTypeFromDatabase($value);
                $procTypes[]=$procType;
            }
            return $procTypes;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }
}