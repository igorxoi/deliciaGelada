<?php
/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 03/12/2019
 * Data de modificação:
 * Modificações realizadas:
 */

    class CategoriaDAO{

        private $conexaoMysql;
        private $conexao;

        public function __construct(){
            require_once('conexaoMysql.php');
        
            $this->conexaoMysql = new conexaoMysql();
            $this->conexao = $this->conexaoMysql->connectDatabase();
        }

        public function inserirCategoria(Categoria $categoria){
            $sql = "INSERT INTO tbl_categoria(nome_categoria, estado) VALUES(?, 'des')";

            $statement = $this->conexao->prepare($sql);
            $statement_dados = array(
                $categoria->getNome()
            );

            echo($sql);

            if($statement->execute($statement_dados))
                return true;
            else
                return false;
        }

        public function selecionarTodasCategorias(){
            
            $sql = "SELECT * FROM tbl_categoria";
            
            $select = $this->conexao->query($sql);
            
            $cont = 0;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                
                $categorias[] = new Categoria();
                
                $categorias[$cont]->setCodigo($rs['id_categoria']);
                $categorias[$cont]->setNome($rs['nome_categoria']);
                $categorias[$cont]->setEstado($rs['estado']);
                
                $cont++;
            }
            
            return $categorias;
        }

        public function listarTodasCategorias(){
            
            $sql = "SELECT * FROM tbl_categoria WHERE estado = 'atv'";
            
            $select = $this->conexao->query($sql);
            
            $cont = 0;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                
                $categorias[] = new Categoria();
                
                $categorias[$cont]->setCodigo($rs['id_categoria']);
                $categorias[$cont]->setNome($rs['nome_categoria']);
                $categorias[$cont]->setEstado($rs['estado']);
                
                $cont++;
            }
            
            return $categorias;
        }

        public function innerJoinCategorias(){
            $sql= "select c.nome_categoria, s.nome_subcategoria from tbl_categoria c INNER JOIN tbl_subcategoria s ON id_categoria = fk_categoria;";

            $select = $this->conexao->query($sql);

            $cont = 0;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                
                $categorias[] = new Categoria();
                
                $categorias[$cont]->setCodigo($rs['id_categoria']);
                $categorias[$cont]->setNome($rs['nome_categoria']);
                $subcategoria[$cont]->setCodigo($rs['nome_subcategoria']);
                $subcategoria[$cont]->setNome($rs['nome_subcategoria']);
                
                $cont++;
            }
        }

        public function ativarDesativarCategoria($codigo, $estado){
            $id = $codigo;
            $situacao = $estado;
            
            if($situacao == "atv")
                $sql = "UPDATE tbl_categoria SET estado = 'des' WHERE id_categoria =".$id;
            elseif($situacao == "des")
                $sql = "UPDATE tbl_categoria SET estado = 'atv' WHERE id_categoria =".$id;
            
            $this->conexao->query($sql);
            
        }

        public function excluirCategoria($id){

            $sql = "DELETE FROM tbl_categoria WHERE id_categoria = ".$id;

            if($this->conexao->query($sql))
                return true;
            else
                return false;
        }        

        public function atualizarCategoria(Categoria $categoria){
            $sql = "UPDATE tbl_categoria SET nome_categoria = '".$categoria->getNome()."' WHERE id_categoria=".$categoria->getCodigo();

            if ($this->conexao->query($sql)) {
                return true;
            }else{
                return false;
            }
        }

        public function selectByIdCategoria($idCategoria){
            session_start();
            $sql = "SELECT * FROM tbl_categoria WHERE id_categoria=".$idCategoria;

            $select = $this->conexao->query($sql);

            if($rs = $select->fetch(PDO::FETCH_ASSOC)){

                $categoria = new Categoria();
                $categoria->setCodigo($rs['id_categoria']);
                $categoria->setNome($rs['nome_categoria']);
                
            }
            $_SESSION['codigoCategoriaEditar'] = $categoria->getCodigo();
            $_SESSION['nomeCategoriaEditar'] = $categoria->getNome();   
            
            return $categoria;
        }

        public function selectCategoriaEdicao($idCategoria){
            $sql = "SELECT * FROM tbl_categoria WHERE id_categoria <>".$idCategoria;

            $select = $this->conexao->query($sql);

            $cont = 0;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                
                $categorias[] = new Categoria();
                
                $categorias[$cont]->setCodigo($rs['id_categoria']);
                $categorias[$cont]->setNome($rs['nome_categoria']);
                
                $cont++;
            }

            return $categorias;
        }
    }
?>