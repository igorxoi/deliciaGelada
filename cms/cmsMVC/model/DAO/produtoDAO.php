<?php

/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 03/12/2019
 * Data de modificação:04/12/2019
 * Modificações realizadas:Finalização da incersão do produto no banco
 * Data de modificação:05/12/2019
 * Modificações realizadas: Criação dos metodos selectAllProdutos e deletarProduto
 * Data de modificação:07/12/2019
 * Modificações realizadas: Criação dos metodos ativarDesativarPromocao, ativarDesativarPodutoMes, ativarDesativarPoduto, selectAllPromotion e selectProdutosHome
 * Data de modificação:07/12/2019
 * Modificações realizadas: Finalização do metodo ativarDesativarPodutoMes, onde faz com que só um produto esteja ativo
 */

    class ProdutoDAO{

        private $conexaoMysql;
        private $conexao;

        public function __construct(){

            require_once('conexaoMysql.php');
            

            $this->conexaoMysql = new conexaoMysql();

            $this->conexao = $this->conexaoMysql->connectDatabase();
        }

        public function inserirProduto(Produto $produto){

            $sql = "INSERT INTO tbl_produtos (nome_produto, descricao_produto, foto_produto, promocao, estado, preco_produto, preco_promocional_produto, produto_mes, fk_subcategoria) 
                                       VALUES(?, ?, ?,'nao', 'des', ?, ?, 'des', ?)";            
       
            $statement = $this->conexao->prepare($sql);
            $statement_dados = array(
                $produto->getNome(),
                $produto->getDescricao(),                
                $produto->getFoto(),
                $produto->getPreco(),
                $produto->getPrecoPromocional(),
                $produto->getSubcategoria()
            );

            echo($sql);
            if($statement->execute($statement_dados))
                return true;
            else
                return false;
        }
        
        public function selectAllProdutos(){
            
            $sql = "SELECT p.*, s.nome_subcategoria FROM tbl_produtos p INNER JOIN
                     tbl_subcategoria s ON id_subcategoria = fk_subcategoria;";
            
            $select = $this->conexao->query($sql);
            
            $cont = 0;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){
                
                $produtos[] = new Produto();
                
                $produtos[$cont]->setCodigo($rs['id_produto']);
                $produtos[$cont]->setNome($rs['nome_produto']);
                $produtos[$cont]->setDescricao($rs['descricao_produto']);
                $produtos[$cont]->setFoto($rs['foto_produto']);
                $produtos[$cont]->setPreco($rs['preco_produto']);
                $produtos[$cont]->setPrecoPromocional($rs['preco_promocional_produto']);
                $produtos[$cont]->setPromocao($rs['promocao']);
                $produtos[$cont]->setEstado($rs['estado']);
                $produtos[$cont]->setProdutoDoMes($rs['produto_mes']);
                $produtos[$cont]->setSubcategoria($rs['nome_subcategoria']);
                
                $cont++;
            }
            
            return $produtos;
        }
        
        public function selectAllPromotion(){
            $sql = "SELECT * FROM tbl_produtos WHERE promocao = 'sim' AND estado = 'atv'";

            $select = $this->conexao->query($sql);

            $cont = 0;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){

                $produtos[] = new Produto();

                $produtos[$cont]->setNome($rs['nome_produto']);
                $produtos[$cont]->setPreco($rs['preco_produto']);
                $produtos[$cont]->setPrecoPromocional($rs['preco_promocional_produto']);
                $produtos[$cont]->setFoto($rs['foto_produto']);

                $cont++;
            }

            return $produtos;
        }

        public function selectProductMonth(){
            $sql = "SELECT * FROM tbl_produtos WHERE produto_mes = 'atv' AND estado = 'atv'";
            $select = $this->conexao->query($sql);

            $rs = $select->fetch(PDO::FETCH_ASSOC);

            $produto = new Produto();

            $produto->setNome($rs['nome_produto']);
            $produto->setPreco($rs['preco_produto']);
            $produto->setDescricao($rs['descricao_produto']);
            $produto->setFoto($rs['foto_produto']);

            return $produto;
        }


        public function selectProdutosHome(){
            $sql = "SELECT * FROM tbl_produtos WHERE estado = 'atv' ORDER BY rand() limit 6";

            $select = $this->conexao->query($sql);

            $cont = 0;
            while($rs = $select->fetch(PDO::FETCH_ASSOC)){

                $produtos[] = new Produto();

                $produtos[$cont]->setNome($rs['nome_produto']);
                $produtos[$cont]->setPreco($rs['preco_produto']);
                $produtos[$cont]->setPrecoPromocional($rs['preco_promocional_produto']);
                $produtos[$cont]->setFoto($rs['foto_produto']);
                $produtos[$cont]->setDescricao($rs['descricao_produto']);

                $cont++;
            }

            return $produtos;
        }

        public function selectProdutosHomeFiltro($idCategoria){
            $sql = "SELECT * FROM tbl_produtos WHERE fk_subcategoria=".$idCategoria;

            $select = $this->conexao->query($sql);

            if($select->rowCount() >= 1){
                // echo($sql);
                $cont = 0;
                while($rs = $select->fetch(PDO::FETCH_ASSOC)){

                $produtos[] = new Produto();

                $produtos[$cont]->setNome($rs['nome_produto']);
                $produtos[$cont]->setPreco($rs['preco_produto']);
                $produtos[$cont]->setPrecoPromocional($rs['preco_promocional_produto']);
                $produtos[$cont]->setFoto($rs['foto_produto']);
                $produtos[$cont]->setDescricao($rs['descricao_produto']);

                $cont++;
                
                }

                return $produtos;
                
            }else{
                return null;
            }
            
        }


        public function deletarProduto($id){

            $sql = "DELETE FROM tbl_produtos WHERE id_produto = ".$id;

            if($this->conexao->query($sql))
                return true;
            else
                return false;
        }

        public function ativarDesativarPromocao($codigo, $estado){
            $id = $codigo;
            $situacao = $estado;
            
            if($situacao == "sim")
                $sql = "UPDATE tbl_produtos SET promocao = 'nao' WHERE id_produto =".$id;
            elseif($situacao == "nao")
                $sql = "UPDATE tbl_produtos SET promocao = 'sim' WHERE id_produto =".$id;
            
            $this->conexao->query($sql);
            
        }

        

        public function ativarDesativarPodutoMes($codigo, $estado){
            $id = $codigo;
            $situacao = $estado;
            
            if($situacao == "atv"){
                $sql = "UPDATE tbl_produtos SET produto_mes = 'des' WHERE id_produto =".$id;

                $this->conexao->query($sql);
            }elseif($situacao == "des"){

                $sqlPrdAtv = "SELECT * FROM tbl_produtos WHERE produto_mes = 'atv'";
                $select = $this->conexao->query($sqlPrdAtv);

                $rs = $select->fetch(PDO::FETCH_ASSOC);
                
                $produto = new Produto();
                $produto->setCodigo($rs['id_produto']);

                $sql = "UPDATE tbl_produtos SET produto_mes = 'atv' WHERE id_produto =".$id;            
            
                if($this->conexao->query($sql)){
                    $sql = "UPDATE tbl_produtos SET produto_mes = 'des' WHERE id_produto =".$produto->getCodigo();

                    $this->conexao->query($sql);
                }
            }

        }

        public function ativarDesativarPoduto($codigo, $estado){
            $id = $codigo;
            $situacao = $estado;
            
            if($situacao == "atv")
                $sql = "UPDATE tbl_produtos SET estado = 'des' WHERE id_produto =".$id;
            elseif($situacao == "des")
                $sql = "UPDATE tbl_produtos SET estado = 'atv' WHERE id_produto =".$id;
            
            $this->conexao->query($sql);
            
        }

        public function selectByIdProduto($idProduto){
            session_start();
            $sql = "select p.*, s.nome_subcategoria from tbl_produtos p INNER JOIN tbl_subcategoria s ON fk_subcategoria = id_subcategoria WHERE id_produto =".$idProduto;

            $select = $this->conexao->query($sql);

            if($rs = $select->fetch(PDO::FETCH_ASSOC)){

                $produto = new Produto();

                $produto->setCodigo($rs['id_produto']);
                $produto->setNome($rs['nome_produto']);
                $produto->setDescricao($rs['descricao_produto']);              
                $produto->setFoto($rs['foto_produto']);
                $produto->setPreco($rs['preco_produto']);
                $produto->setPrecoPromocional($rs['preco_promocional_produto']);
                $produto->setSubcategoria($rs['nome_subcategoria']);
                $produto->setFKSubcategoria($rs['fk_subcategoria']);
                
            }

            $_SESSION['codigoProdutoEditar'] = $produto->getCodigo();
            $_SESSION['nomeProdutoEditar'] = $produto->getNome();   
            $_SESSION['descricaoProdutoEditar'] = $produto->getDescricao();   
            $_SESSION['fotoProdutoEditar'] = $produto->getFoto();   
            $_SESSION['precoProdutoEditar'] = $produto->getPreco();   
            $_SESSION['precoPromocionalProdutoEditar'] = $produto->getPrecoPromocional();   
            $_SESSION['subcategoriaProdutoEditar'] = $produto->getSubcategoria();  
            $_SESSION['fkSubcategoriaProdutoEditar'] = $produto->getFKSubcategoria();  
            
            return $produto;
        }

        public function atualizarProduto(Produto $produto){
            if($produto->getFoto() == ""){
                $sql = "UPDATE tbl_produtos SET nome_produto = '".$produto->getNome()."', descricao_produto = '".$produto->getDescricao()."', preco_produto = ".$produto->getPreco().", preco_promocional_produto = ".$produto->getPrecoPromocional().", fk_subcategoria = ".$produto->getSubcategoria()." WHERE id_produto = ".$produto->getCodigo();
                echo($sql);
                

                if($this->conexao->query($sql))
                    return true;
                else
                    return false;

            }else{
                $sql = "UPDATE tbl_produtos SET nome_produto = '".$produto->getNome()."', descricao_produto = ?, foto_produto = ?, preco_produto = ?, preco_promocional_produto = ?, fk_subcategoria = ? WHERE id_produto =".$produto->getCodigo();

                echo($produto->getFoto());
                $statement = $this->conexao->prepare($sql);
                $statement_dados = array(
                ,
                $produto->getDescricao(),
                $produto->getFoto(),
                $produto->getPreco(),
                $produto->getPrecoPromocional(),
                $produto->getSubcategoria()
            );

                if($statement->execute($statement_dados))
                    return true;
                else
                    return false;
            }
            
        }


        

        
    }
?>