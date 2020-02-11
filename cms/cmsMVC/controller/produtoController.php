<?php

/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 01/12/2019
 * Data de modificação:03/12/2019
 * Modificações realizadas: Criação do adicionarProduto
 * Data de modificação:05/12/2019
 * Modificações realizadas: Criação do listarProdutos e excluirProduto
 * Data de modificação:07/12/2019
 * Modificações realizadas: Criação do atvDesPromocoes, ativarDesativarPodutoMes, ativarDesativarPoduto, listarProdutosPromocoes e selectProdutosHome
 */

    class ProdutoController{
        public function __construct(){  
            
        }

        public function adicionarProduto(){

            require_once('model/produtoClass.php');
            require_once('model/DAO/produtoDAO.php');
            require_once('model/DAO/funcoes/funcoes.php');

            $produto = new Produto();
            $funcoes = new Funcao();            

            // $fotoInsercao = ;
            // $fotoInsercao = insercaoImagem();

            $produto->setNome($_POST['txtNomeProduto']);   
            $produto->setDescricao($_POST['txtDescProduto']);         
            $produto->setPreco($_POST['txtPrecoProduto']);            
            $produto->setFoto($funcoes->insercaoImagem($_FILES['fleImgProduto']));
            $produto->setPrecoPromocional($_POST['txtPrecoPromocionalProduto']);            
            $produto->setSubcategoria($_POST['sltCategoriaProduto']);            

            $produtoDAO = new ProdutoDAO(); 
            if($produtoDAO->inserirProduto($produto)){
                echo("<script>
                        alert('Produto adicionado com sucesso');
                        window.location.href = 'view/admProdutos.php';
                    </script>");
            }else{
                echo("<script>
                    alert('Erro ao inserir produto, verifique os campos!');
                    window.location.href = 'view/admProdutos.php';
                </script>");
            }

        }
        
        //lista todos os produtos
        public function listarProdutos(){
            require_once('../model/produtoClass.php');
            require_once('../model/DAO/produtoDAO.php');
            
            $produtoDAO = new ProdutoDAO();
            
            return $produtoDAO->selectAllProdutos();
        }

        public function listarProdutosComFiltro($idCategoria){
            require_once('cms/cmsMVC/model/produtoClass.php');
            require_once('cms/cmsMVC/model/DAO/produtoDAO.php');
            
            $produtoDAO = new ProdutoDAO();
            
            if($produto = $produtoDAO->selectProdutosHomeFiltro($idCategoria)){
                return $produto;
            }else{
                echo("<script>
                        alert('Nenhum produto cadastrado nessa categoria');                        
                    </script>");
                   return null; 
            }
        }

        public function listarProdutosPromocoes(){            
            require_once('cms/cmsMVC/model/produtoClass.php');
            require_once('cms/cmsMVC/model/DAO/produtoDAO.php');
            
            $produtoDAO = new ProdutoDAO();
            
            return $produtoDAO->selectAllPromotion();
        }

        public function listarProdutoMes(){
            require_once('cms/cmsMVC/model/produtoClass.php');
            require_once('cms/cmsMVC/model/DAO/produtoDAO.php');
            
            $produtoDAO = new ProdutoDAO();

            return $produtoDAO->selectProductMonth();
        }

        public function selectProdutosHome(){
            require_once('cms/cmsMVC/model/produtoClass.php');
            require_once('cms/cmsMVC/model/DAO/produtoDAO.php');
            
            $produtoDAO = new ProdutoDAO();
            
            return $produtoDAO->selectProdutosHome();
            
        }

        public function excluirProduto($id){
            require_once('model/produtoClass.php');
            require_once('model/DAO/produtoDAO.php');

            $produtoDAO = new ProdutoDAO();

            if($produtoDAO->deletarProduto($id)){
                echo("<script>
                        alert('Produto excluido');
                        window.location.href = 'view/admProdutos.php';
                    </script>");
            }else{
                echo("<script>
                    alert('Erro ao excluir produto, tente novamente');
                    window.location.href = 'view/admProdutos.php';
                </script>");
            }
            
        }

        public function atvDesPromocoes($codigo, $estado){
            require_once('model/DAO/produtoDAO.php');

            $produtoDAO = new ProdutoDAO();

            $produtoDAO->ativarDesativarPromocao($codigo, $estado);

            header("location: view/admProdutos.php");
        }

        public function ativarDesativarPodutoMes($codigo, $estado){
            require_once('model/produtoClass.php');
            require_once('model/DAO/produtoDAO.php');

            $produtoDAO = new ProdutoDAO();

            $produtoDAO->ativarDesativarPodutoMes($codigo, $estado);

            header("location: view/admProdutos.php");
        }

        public function ativarDesativarPoduto($codigo, $estado){
            require_once('model/DAO/produtoDAO.php');

            $produtoDAO = new ProdutoDAO();

            $produtoDAO->ativarDesativarPoduto($codigo, $estado);

            header("location: view/admProdutos.php");
        }

        public function selectByIdProduto($id){
            require_once('model/produtoClass.php');
            require_once("model/DAO/produtoDAO.php");

            $produtoDAO = new ProdutoDAO();

            if($produtoDAO->selectByIdProduto($id)){
                header("location: view/admProdutos.php?modo=buscarproduto");
            }            
        }

        public function editarProduto($idProduto){
            require_once('model/produtoClass.php');
            require_once("model/DAO/produtoDAO.php");
            require_once('model/DAO/funcoes/funcoes.php');

            $produto = new Produto();
            $funcoes = new Funcao();            

            $produto->setCodigo($idProduto);
            $produto->setNome($_POST['txtNomeProduto']);   
            $produto->setDescricao($_POST['txtDescProduto']);         
            $produto->setPreco($_POST['txtPrecoProduto']);            
            $produto->setFoto($funcoes->insercaoImagem($_FILES['fleImgProduto']));
            $produto->setPrecoPromocional($_POST['txtPrecoPromocionalProduto']);            
            $produto->setSubcategoria($_POST['sltCategoriaProduto']); 

            $produtoDAO = new ProdutoDAO();

            if($produtoDAO->atualizarProduto($produto)){
                header("location: view/admProdutos.php");
            }else{
                echo("<script>
                    alert('Erro ao editar produto, por favor verifique todos os campos');
                    
                </script>");
            }
        }

        

    }

?>