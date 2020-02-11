<?php
/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 09/12/2019
 * Data de modificação:
 * Modificações realizadas: 
 */

    class SubcategoriaController{

        public function __construct(){

        }

        public function inserirSubcategoria(){
            require_once("model/subcategoriaClass.php");
            require_once("model/DAO/subcategoriaDAO.php");

            $subcategoria = new Subcategoria();
            $subcategoria->setNome($_POST['txtNomeSubcategoria']);
            $subcategoria->setFkCategoria($_POST['sltCategoria']);

            $subcategoriaDAO = new SubcategoriaDAO();

            if($subcategoriaDAO->inserirSubcategoria($subcategoria)){
                echo("<script>
                        alert('Subcategoria adicionado com sucesso');
                        window.location.href = 'view/admCategoria.php';
                    </script>");
            }else{
                echo("<script>
                    alert('Erro ao inserir produto, verifique os campos!');
                </script>");
            }
        }

        public function listarTodasSubcategorias(){
            require_once("../model/subcategoriaClass.php");
            require_once("../model/DAO/subcategoriaDAO.php");

            $subcategoriaDAO = new SubcategoriaDAO();

            return $subcategoriaDAO->listarTodasSubcategorias();
        }

        public function listarFiltroTodasCategorias($codigo){
            require_once("cms/cmsMVC/model/subcategoriaClass.php");
            require_once("cms/cmsMVC/model/DAO/subcategoriaDAO.php");

            $subcategoriaDAO = new SubcategoriaDAO();

            return $subcategoriaDAO->listarFiltroTodasCategorias($codigo);
        }

        public function excluirSubcategoria($id){
            require_once("model/subcategoriaClass.php");
            require_once("model/DAO/subcategoriaDAO.php");

            $subcategoriaDAO = new SubcategoriaDAO();

            if($subcategoriaDAO->excluirSubcategoria($id)){
                echo("<script>
                        alert('Subcategoria excluida');
                        window.location.href = 'view/admCategoria.php';
                    </script>");
            }else{
                echo("<script>
                    alert('Erro ao excluir subcategoria, tente novamente');
                    window.location.href = 'view/admCategoria.php';
                </script>");
            }
            
        }

        public function atvDesSubcategoria($codigo, $estado){
            require_once("model/DAO/subcategoriaDAO.php");

            $subcategoriaDAO = new SubcategoriaDAO();

            $subcategoriaDAO->ativarDesativarSubcategoria($codigo, $estado);

            header("location: view/admCategoria.php");
        }

        public function buscarSubcategoria($id){
            require_once("model/subcategoriaClass.php");
            require_once("model/DAO/subcategoriaDAO.php");

            $subcategoriaDAO = new SubcategoriaDAO();
            // $va= (String) "?modo=buscar";

            if($subcategoriaDAO->selectByIdSubcategoria($id)){
                header("location: view/admCategoria.php?modo=buscarsubcategoria");
            }            
        }

        public function editarSubcategoria($idSubcategoria){
            require_once("model/subcategoriaClass.php");
            require_once("model/DAO/subcategoriaDAO.php");

            $subcategoria = new Subcategoria();

            $subcategoria->setCodigo($idSubcategoria);
            $subcategoria->setNome($_POST['txtNomeSubcategoria']);
            $subcategoria->setFkCategoria($_POST['sltCategoria']);

            $subcategoriaDAO = new SubcategoriaDAO();

            if($subcategoriaDAO->atualizarSubategoria($subcategoria)){
                header("location: view/admCategoria.php");
            }
        }

        public function selectSubcategoriaEdicao($idSubcategoria){
            require_once("../model/subcategoriaClass.php");
            require_once("../model/DAO/subcategoriaDAO.php");

            $subcategoriaDAO = new SubcategoriaDAO();

            return $subcategoriaDAO->selectSubcategoriaEdicao($idSubcategoria);
        }

    }

?>