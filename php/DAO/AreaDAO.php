<?php

include_once $_SESSION["root"].'php/Util/Util.php';
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/Model/ModelArea.php';

class AreaDAO
{
    public function readArea(){

        try { $sql = ('SELECT * FROM public.tb_area ORDER BY id');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);
            $statement->execute();

            $records = $statement->fetchAll();
            //Verifico se houve algum retorno, senão retorno null
            if(count($records)==0)
                return null;
            //Var que irá armazenar um array de obj do tipo funcionário
            $areas;
            //Util::debug($linhas);
            foreach ($records as $value) {
                $area = new ModelArea();
                $area->setAreaFromDatabase($value);
                $areas[]=$area;
            }
            return $areas;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }

    public function readAreaById($id){

        try { $sql = ('SELECT * FROM public.tb_area where id = :id');
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindValue(":id", $id);
            $statement->execute();

            $records = $statement->fetchAll();
            //Verifico se houve algum retorno, senão retorno null
            if(count($records)==0)
                return null;
            //Var que irá armazenar um array de obj do tipo funcionário
            $areas;
            //Util::debug($linhas);
            foreach ($records as $value) {
                $area = new ModelArea();
                $area->setAreaFromDatabase($value);
                $areas[]=$area;
            }
            return $areas;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    } 

    public function createArea($area){			
        
		try { $sql = "INSERT INTO public.tb_area (initials, name) VALUES (:initials, :name)";
            
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();			
            $statement = $conn->prepare($sql);
            
            $statement->bindValue(":initials", $area->getInitials());
            $statement->bindValue(":name", $area->getName());

            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();            
        }		
    }

    public function updateArea($area) {
        
        try { $sql = ('UPDATE public.tb_area SET initials = :initials, name = :name WHERE id = :id');

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            $statement = $conn->prepare($sql);

            $statement->bindParam(':id', $area->getId()); 
            $statement->bindParam(':initials', $area->getInitials()); 
            $statement->bindParam(':name', $area->getName()); 
            $statement->execute();
               
            return $statement->execute(); 
        } catch(PDOException $e) {
            echo "Erro ao atualizar registro da base de dados.".$e->getMessage();
        }
    }
    
    public function deleteArea($id) {        

        try { $sql = ('DELETE FROM public.tb_area WHERE id = :id');

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
    
    public function readAreaByName($name){

        try { $sql = ('SELECT * FROM public.tb_area WHERE name = :name');
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
            $areas;
            //Util::debug($linhas);
            foreach ($records as $value) {
                $area = new ModelArea();
                $area->setAreaFromDatabase($value);
                $areas[]=$area;
            }
            return $areas;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }
    
    public function readAreaByInitials($initials){

        try { $sql = ('SELECT * FROM public.tb_area WHERE initials = :initials');
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
            $areas;
            //Util::debug($linhas);
            foreach ($records as $value) {
                $area = new ModelArea();
                $area->setAreaFromDatabase($value);
                $areas[]=$area;
            }
            return $areas;

        } catch (PDOException $e) {
            echo "Erro ao ler registros na base de dados.".$e->getMessage();
        }
    }
}