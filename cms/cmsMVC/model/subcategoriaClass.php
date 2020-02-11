<?php

/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 09/12/2019
 * Data de modificação: 
 * Modificações realizadas: 
 */

    class Subcategoria{
        private $codigo;
        private $nome;
        private $fkCategoria;
        private $categoria;
        private $estado;

        //GET e SET codigo
        public function getCodigo(){
            return $this->codigo;
        }

        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        //GET e SET nome
        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        //GET e SET fkCategoria
        public function getFkCategoria(){
            return $this->fkCategoria;
        }

        public function setFkCategoria($fkCategoria){
            $this->fkCategoria = $fkCategoria;
        }

        //GET e SET categoria
        public function getNomeCategoria(){
            return $this->categoria;
        }

        public function setNomeCategoria($categoria){
            $this->categoria = $categoria;
        }

        // //Get e set estado
        public function getEstado(){
            return $this->estado;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }
    }
?>