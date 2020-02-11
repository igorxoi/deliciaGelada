<?php
/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 09/12/2019
 * Data de modificação:
 * Modificações realizadas:
 */

    class SubcategoriaDAO{

        private $conexaoMysql;
        private $conexao;

        public function __construct(){
            require_once('conexaoMysql.php');
        
            $this->conexaoMysql = new conexaoMysql();
            $this->conexao = $this->conexaoMysql->connectDatabase();
        }


        public function inserirSubcategoria(Subcategoria $subcategoria){
            $sql = "INSERT INTO tbl_subcategoria(nome_subcategoria, fk_categoria, estado) VALUES(?,?,'des')";

            $statement = $this->conexao->prepare($sql);
            $statement_dados = array(
                $subcategoria->getNome(),
                $subcategoria->getFkCategoria()
            );            

            if($statement->execute($statement_dados))
                return true;
            else
                return false;
        }


        public function listarTodasSubcategorias(){
            $sql = "select s.id_subcategoria, s.nome_subcategoria, s.estado, c.nome_categoria from tbl_subcategoria s INNER JOIN tbl_categoria c ON fk_categoria = id_categoria ORDER BY nome_subcategoria ASC";

            $select = $this->conexao->query($sql);
            
            $cont = 0;
            
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                
                $subcategorias[] = new Subcategoria();                            
                $subcategorias[$cont]->setCodigo($rs['id_subcategoria']);
                $subcategorias[$cont]->setNome($rs['nome_subcategoria']);
                $subcategorias[$cont]->setNomeCategoria($rs['nome_categoria']);
                $subcategorias[$cont]->setEstado($rs['estado']);
                
                $cont++;
            }

            return $subcategorias;
        }

        public function listarFiltroTodasCategorias($id){
            $sql = "SELECT c.id_categoria, c.nome_categoria, s.nome_subcategoria, s.id_subcategoria 
            FROM tbl_categoria c INNER JOIN tbl_subcategoria s 
            ON id_categoria = fk_categoria WHERE s.estado = 'atv' AND c.id_categoria =".$id;

            $select = $this->conexao->query($sql);

            if($select->rowCount() >= 1){
                $cont = 0;

                while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                
                    $subcategorias[] = new Subcategoria();                            
                    $subcategorias[$cont]->setCodigo($rs['id_subcategoria']);
                    $subcategorias[$cont]->setNome($rs['nome_subcategoria']);
                    
                $cont++;
            }

                return $subcategorias;

            }else{
                return null;
            }
            
        }

        public function excluirSubcategoria($id){

            $sql = "DELETE FROM tbl_subcategoria WHERE id_subcategoria = ".$id;

            if($this->conexao->query($sql))
                return true;
            else
                return false;
        }

        public function ativarDesativarSubcategoria($codigo, $estado){
            $id = $codigo;
            $situacao = $estado;
            
            if($situacao == "atv")
                $sql = "UPDATE tbl_subcategoria SET estado = 'des' WHERE id_subcategoria =".$id;
            elseif($situacao == "des")
                $sql = "UPDATE tbl_subcategoria SET estado = 'atv' WHERE id_subcategoria =".$id;
            
            $this->conexao->query($sql);
            
        }

        public function selectByIdSubcategoria($idSubategoria){
            session_start();
            $sql = "SELECT c.id_categoria, c.nome_categoria, s.nome_subcategoria, s.id_subcategoria FROM tbl_categoria c INNER JOIN tbl_subcategoria s ON id_categoria = fk_categoria WHERE s.id_subcategoria =".$idSubategoria;

            $select = $this->conexao->query($sql);

            if($rs = $select->fetch(PDO::FETCH_ASSOC)){

                $subcategoria = new Subcategoria();
                $subcategoria->setCodigo($rs['id_subcategoria']);
                $subcategoria->setNome($rs['nome_subcategoria']);
                $subcategoria->setFkCategoria($rs['id_categoria']);
                $subcategoria->setNomeCategoria($rs['nome_categoria']);
                
            }

            $_SESSION['codigoSubcategoriaEditar'] = $subcategoria->getCodigo();
            $_SESSION['nomeSubcategoriaEditar'] = $subcategoria->getNome();   
            $_SESSION['fkSubcategoriaEditar'] = $subcategoria->getFkCategoria();   
            $_SESSION['nomeCategoriasEditar'] = $subcategoria->getNomeCategoria();   
            
            return $subcategoria;
        }

        public function atualizarSubategoria(Subcategoria $subcategoria){
            $sql = "UPDATE tbl_subcategoria SET nome_subcategoria = '".$subcategoria->getNome()."', fk_categoria = '".$subcategoria->getFkCategoria()."' WHERE id_subcategoria=".$subcategoria->getCodigo();

            if ($this->conexao->query($sql)) {
                return true;
            }else{
                return false;
            }
        }

        public function selectSubcategoriaEdicao($idSubcategoria){
            $sql = "SELECT * FROM tbl_subcategoria WHERE id_subcategoria <>".$idSubcategoria;

            $select = $this->conexao->query($sql);

            $cont = 0;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                
                $subcategorias[] = new Subcategoria();
                
                $subcategorias[$cont]->setCodigo($rs['id_subcategoria']);
                $subcategorias[$cont]->setNome($rs['nome_subcategoria']);
                
                $cont++;
            }

            return $subcategorias;
        }

        
    }
?>