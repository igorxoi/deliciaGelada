<?php

/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 01/12/2019
 * Data de modificação:
 * Modificações realizadas:
 */

    class Usuario{
        
        private $usuario;
        private $senha;

        //Construtor da classe usuario
        public function __construct(){}

        //Get e set do usuário
        public function getUsuario(){
            return $this->usuario;
        }

        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }

        //Get e set da senha 
        public function getSenha(){
            return $this->senha;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }
    }

?>