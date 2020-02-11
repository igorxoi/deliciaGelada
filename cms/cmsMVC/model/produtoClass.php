<?php

/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 03/12/2019
 * Data de modificação: 04/12/2019
 * Modificações realizadas: Adicionados os paramentro que estavam faltando
 */

    class Produto{
        
        private $codigo;
        private $nome;
        private $descricao;
        private $preco;
        private $precoPromocional;
        private $foto;
        private $estado;
        private $promocao;
        private $produtoDoMes;
        private $subcategoria;
        private $fkSubcategoria;
        

        // Get e Set do codigo
        public function getCodigo(){
            return $this->codigo;
        }

        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        //construtor da classe produtos
        public function __construct(){}

        //Get e set do nome
        public function getNome(){
            return $this->nome;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        //Get e set da descricao
        public function getDescricao(){
            return $this->descricao;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        //Get e set do preco
        public function getPreco(){
            return $this->preco;
        }

        public function setPreco($preco){
            $this->preco = $preco;
        }

        //Get e set preco promocional
        public function getPrecoPromocional(){
            return $this->precoPromocional;
        }

        public function setPrecoPromocional($precoPromocional){
            $this->precoPromocional = $precoPromocional;
        }

        //Get e set foto
        public function getFoto(){
            return $this->foto;
        }

        public function setFoto($foto){
            $this->foto = $foto;
        }

        //Get e set promocao
        public function getPromocao(){
            return $this->promocao;
        }

        public function setPromocao($promocao){
            $this->promocao = $promocao;
        }

        // //Get e set estado
        public function getEstado(){
            return $this->estado;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }

        //Get e set produto do mes
        public function getProdutoDoMes(){
            return $this->produtoDoMes;
        }

        public function setProdutoDoMes($produtoDoMes){
            $this->produtoDoMes = $produtoDoMes;
        }

        //Get e set subcategoria
        public function getSubcategoria(){
            return $this->subcategoria;
        }

        public function setSubcategoria($subcategoria){
            $this->subcategoria = $subcategoria;
        }

        //Get e set id subcategoria
        public function getFkSubcategoria(){
            return $this->fkSubcategoria;
        }

        public function setFKSubcategoria($fkSubcategoria){
            $this->fkSubcategoria = $fkSubcategoria;
        }

        
        
        
        
    }
    
?>