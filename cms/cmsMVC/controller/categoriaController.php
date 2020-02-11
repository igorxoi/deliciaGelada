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
 
 

    class CategoriaController{

        
        public function __construct(){

        }

        public function inserirCategoria(){
            require_once("model/categoriaClass.php");
            require_once("model/DAO/categoriaDAO.php");

            $categoria = new Categoria();
            
            $categoria->setNome($_POST['txtNomeCategoria']);  

            $categoriaDAO = new CategoriaDAO();
            $categoriaDAO->inserirCategoria($categoria);
            header("location: view/admCategoria.php");
        }

        public function selecionarTodasCategorias(){
            require_once("../model/categoriaClass.php");
            require_once("../model/DAO/categoriaDAO.php");

            $categoriaDAO = new CategoriaDAO();

            return $categoriaDAO->selecionarTodasCategorias();
        }

        public function listarTodasCategorias(){
            require_once("cms/cmsMVC/model/categoriaClass.php");
            require_once("cms/cmsMVC/model/DAO/categoriaDAO.php");

            $categoriaDAO = new CategoriaDAO();

            return $categoriaDAO->listarTodasCategorias();
        }

        public function ativarDesativarCategoria($codigo, $estado){
            require_once("model/DAO/categoriaDAO.php");

            $categoriaDAO = new CategoriaDAO();

            $categoriaDAO->ativarDesativarCategoria($codigo, $estado);

            header("location: view/admCategoria.php");
        }

        public function excluirCategoria($id){
            require_once("model/categoriaClass.php");
            require_once("model/DAO/categoriaDAO.php");

            $categoriaDAO = new CategoriaDAO();

            if($categoriaDAO->excluirCategoria($id)){
                echo("<script>
                        alert('Categoria excluido');
                        window.location.href = 'view/admCategoria.php';
                    </script>");
            }else{
                echo("<script>
                    alert('Erro ao excluir categoria, verifique se existe uma subcategoria ligada a ela, se existir apague ela antes.');
                    window.location.href = 'view/admCategoria.php';
                </script>");
            }
            
        }

        public function buscarCategoria($id){
            require_once("model/categoriaClass.php");
            require_once("model/DAO/categoriaDAO.php");

            $categoriaDAO = new CategoriaDAO();
            // $va= (String) "?modo=buscar";

            if($categoriaDAO->selectByIdCategoria($id)){
                header("location: view/admCategoria.php?modo=buscarcategoria");
            }            
        }

        public function editarCategoria($idCategoria){
            require_once("model/categoriaClass.php");
            require_once("model/DAO/categoriaDAO.php");

            $categoria = new Categoria();

            $categoria->setCodigo($idCategoria);
            $categoria->setNome($_POST['txtNomeCategoria']);

            $categoriaDAO = new CategoriaDAO();

            if($categoriaDAO->atualizarCategoria($categoria)){
                header("location: view/admCategoria.php");
            }
        }

        public function selectCategoriaEdicao($idCategoria){
            require_once("../model/categoriaClass.php");
            require_once("../model/DAO/categoriaDAO.php");

            $categoriaDAO = new CategoriaDAO();

            return $categoriaDAO->selectCategoriaEdicao($idCategoria);
        }


    }

?>