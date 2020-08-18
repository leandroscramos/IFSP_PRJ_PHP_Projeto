<?php

include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelProcess.php';

class ProcessDAO
{
    public function readProcess(){

        try { $sql = ('SELECT * FROM tb_process');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);
            $statement->execute();

            $records = $statement->fetchAll();
            //Verifico se houve algum retorno, senão retorno null
            if(count($records)==0)
                return null;
            //Var que irá armazenar um array de obj do tipo funcionário
            $processs;
            //Util::debug($records);
            foreach ($records as $value) {
                $process = new ModelProcess();
                $process->setProcessFromDatabase($value);
                $processs[]=$process;
            }
            return $processs;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }    

    
    public function createProcess($process){			
        
		try { $sql = "INSERT INTO tb_process (name, number, id_macroprocess, status) VALUES (:name, :number, :id_macroprocess, :status)";
            
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();			
            $statement = $conn->prepare($sql);
            
            $statement->bindValue(":name", $process->getName());
            $statement->bindValue(":number", $process->getNumber());            
            $statement->bindValue(":id_macroprocess", $process->getIdMacroProc());
            $statement->bindValue(":status", $process->getStatus());

            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();            
        }		
    }

    public function updateProcess($process) {
        
        try { $sql = ('UPDATE tb_process SET name = :name, number = :number, status = :status, id_macroprocess = :id_macroprocess WHERE id = :id');

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindParam(':id', $process->getId());
            $statement->bindParam(':name', $process->getName()); 
            $statement->bindParam(':number', $process->getNumber()); 
            $statement->bindParam(':status', $process->getStatus());
            $statement->bindParam(':id_macroprocess', $process->getIdMacroProc());
            
            $statement->execute();
               
            return $statement->execute(); 
        } catch(PDOException $e) {
            echo "Erro ao atualizar registro da base de dados.".$e->getMessage();
        }
    }
    
    public function readProcessById($id){

        try { $sql = ('SELECT * FROM tb_process where id = :id');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindParam(':id', $id); 
            $statement->execute();

            $records = $statement->fetchAll();
            //Verifico se houve algum retorno, senão retorno null
            if(count($records)==0)
                return null;
            //Var que irá armazenar um array de obj do tipo funcionário
            $processs;
            //Util::debug($records);
            foreach ($records as $value) {
                $process = new ModelProcess();
                $process->setProcessFromDatabase($value);
                $processs[]=$process;
            }
            return $processs;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }
    
    public function deleteProcess($id) {        

        try { $sql = ('DELETE FROM tb_process WHERE id = :id');

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
}