<?php

include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelProcess.php';

class ProcessDAO
{
    public function readProcess(){

        try { $sql = ('SELECT * FROM public.tb_process');
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
        
		try { $sql = "INSERT INTO public.tb_process (name, number, id_macroprocess) VALUES (:name, :number, :id_macroprocess)";
            
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();			
            $statement = $conn->prepare($sql);
            
            $statement->bindValue(":name", $process->getName());
            $statement->bindValue(":number", $process->getNumber());
            $statement->bindValue(":id_macroprocess", $process->getIdMacroProc());

            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();            
        }		
    }
    
    public function readProcessById($id){

        try { $sql = ('SELECT * FROM public.tb_process where id = :id');
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
}