<?php

class ModelUsuario {

    private $codigo;
    private $usuario;
    private $senha;
    private $permissao;

    public function setUsuarioFromDatabase($linha){
        $this->setCodigo($linha["codigo"])
               ->setUsuario($linha["usuario"])
               ->setSenhaFromDB($linha["senha"])
               ->setPermissao($linha['permissao']);
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
        return $this;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenhaFromDB($senha)
    {
        
        $this->senha = $senha;
        return $this;
    }   

    public function getPermissao() {
        return $this->permissao;
    }

    public function setPermissao($permissao)
    {
        $this->permissao = $permissao;
        return $this;
    }

}