<?php

include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelMacroProc.php';

class MacroProcDAO
{
    public function readMacroProc(){

        try { $sql = ('SELECT * FROM public.tb_macroprocess ORDER BY id_proc_type ASC, number ASC');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);
            $statement->execute();

            $records = $statement->fetchAll();
            //Verifico se houve algum retorno, senão retorno null
            if(count($records)==0)
                return null;
            //Var que irá armazenar um array de obj do tipo funcionário
            $macroProcs;
            //Util::debug($records);
            foreach ($records as $value) {
                $macroProc = new ModelMacroProc();
                $macroProc->setMacroProcFromDatabase($value);
                $macroProcs[]=$macroProc;
            }
            return $macroProcs;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }    

    public function createMacroProc($procType){			
        
		try { $sql = "INSERT INTO public.tb_macroprocess (initials, name) VALUES (:initials, :name)";
            
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();			
            $statement = $conn->prepare($sql);
            
            $statement->bindValue(":initials", $macroProc->getInitials());
            $statement->bindValue(":name", $macroProc->getName());

            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();            
        }		
    }

    public function updateMacroProc($macroProc) {
        
        try { $sql = ('UPDATE public.tb_macroprocess SET initials = :initials, name = :name WHERE id = :id');

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindParam(':id', $macroProc->getId()); 
            $statement->bindParam(':initials', $macroProc->getInitials()); 
            $statement->bindParam(':name', $macroProc->getName()); 
            $statement->execute();
               
            return $statement->execute(); 
        } catch(PDOException $e) {
            echo "Erro ao atualizar registro da base de dados.".$e->getMessage();
        }
    }
    
    public function deleteMacroProc($id) {        

        try { $sql = ('DELETE FROM public.tb_macroprocess WHERE id = :id');

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

    public function readMacroProcByName($name){

        try { $sql = ('SELECT * FROM public.tb_macroprocess WHERE name = :name');
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
            $macroProcs;
            //Util::debug($linhas);
            foreach ($records as $value) {
                $macroProc = new ModelMacroProc();
                $macroProc->setMacroProcFromDatabase($value);
                $macroProcs[]=$macroProc;
            }
            return $procTypes;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }
    
    public function readMacroProcByInitials($initials){

        try { $sql = ('SELECT * FROM public.tb_macroprocess WHERE initials = :initials');
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
                $procType = new ModelMacroProc();
                $procType->setProcTypeFromDatabase($value);
                $procTypes[]=$procType;
            }
            return $procTypes;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }

    public function readMacroProcById($id){

        try { $sql = ('SELECT * FROM public.tb_macroprocess WHERE id = :id');
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
            $macroProcs;
            //Util::debug($linhas);
            foreach ($records as $value) {
                $macroProc = new ModelMacroProc();
                $macroProc->setMacroProcFromDatabase($value);
                $macroProcs[]=$macroProc;
            }
            return $macroProcs;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }
}