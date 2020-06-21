<?php

include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelSector.php';

class SectorDAO
{
    public function readSector(){

        try { $sql = ('SELECT * FROM public.tb_sector ORDER BY id');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);
            $statement->execute();

            $records = $statement->fetchAll();
            //Verifico se houve algum retorno, senão retorno null
            if(count($records)==0)
                return null;
            //Var que irá armazenar um array de obj do tipo funcionário
            $sectors;
            //Util::debug($linhas);
            foreach ($records as $value) {
                $sector = new ModelSector();
                $sector->setSectorFromDatabase($value);
                $sectors[]=$sector;
            }
            return $sectors;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }    

    public function createSector($sector){			
        
		try { $sql = "INSERT INTO public.tb_sector (initials, name) VALUES (:initials, :name)";
            
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();			
            $statement = $conn->prepare($sql);
            
            $statement->bindValue(":initials", $sector->getInitials());
            $statement->bindValue(":name", $sector->getName());

            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();            
        }		
    }

    public function updateSector($sector) {
        
        try { $sql = ('UPDATE public.tb_sector SET initials = :initials, name = :name WHERE id = :id');

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindParam(':id', $sector->getId()); 
            $statement->bindParam(':initials', $sector->getInitials()); 
            $statement->bindParam(':name', $sector->getName()); 
            $statement->execute();
               
            return $statement->execute(); 
        } catch(PDOException $e) {
            echo "Erro ao atualizar registro da base de dados.".$e->getMessage();
        }
    }
    
    public function deleteSector($id) {        

        try { $sql = ('DELETE FROM public.tb_sector WHERE id = :id');

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
    
    public function readSectorByName($name){

        try { $sql = ('SELECT * FROM public.tb_sector WHERE name = :name');
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
            $sectors;
            //Util::debug($linhas);
            foreach ($records as $value) {
                $sector = new ModelSector();
                $sector->setSectorFromDatabase($value);
                $sectors[]=$sector;
            }
            return $sectors;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }
    
    public function readSectorByInitials($initials){

        try { $sql = ('SELECT * FROM public.tb_sector WHERE initials = :initials');
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
            $sectors;
            //Util::debug($linhas);
            foreach ($records as $value) {
                $sector = new ModelSector();
                $sector->setSectorFromDatabase($value);
                $sectors[]=$sector;
            }
            return $sectors;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }
}