
<?php

/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 01/12/2019
 * Data de modificação: 03/12/2019
 * Modificações realizadas: Criação da parte de produtos do router 
 * Data de modificação: 05/12/2019
 * Modificações realizadas: Criação do case de DELETAR
 * Data de modificação: 07/12/2019
 * Modificações realizadas: Criação dos cases de ESTPROMOCAO, ESTPRODUTOMES, ESTPRODUTO
 */

$controller = (string) null;
$modo = (string) null;

if(isset($_GET['controller']) && isset($_GET['modo'])){
    $controller = $_GET['controller'];
    $modo = $_GET['modo'];

    switch (strtoupper($controller)) {
        case 'USUARIO':
            require_once('controller/usuarioController.php');

            switch (strtoupper($modo)) {
                case 'AUTENTICAR':
                    //instancia do  usuarioController
                    $usuarioController = new UsuarioController();

                    //metodo de autenticar
                    $usuarioController->autenticar();

                break;
                                
            }

        break;
        
        case 'PRODUTO':
            require_once('controller/produtoController.php');

            switch (strtoupper($modo)) {
                case 'ADICIONAR':
                    //instancia do produtoController
                    $produtoController = new ProdutoController();

                    //metodo para adicionar produto
                    $produtoController->adicionarProduto();
                break;
                
                case 'DELETAR':
                    //pegando o codigo da url
                    $id = $_GET['codigo'];
                    //instancia do produtoController
                    $produtoController = new ProdutoController();

                    //metodo para adicionar produto
                    $produtoController->excluirProduto($id);
                break; 

                case 'ESTPROMOCAO':
                    //pegando o codigo e o estado da url
                    $id = $_GET['codigo'];
                    $estado = $_GET['situacao'];

                    //instancia do produtoController
                    $produtoController = new ProdutoController();

                    //metodo para adicionar produto
                    $produtoController->atvDesPromocoes($id, $estado);
                break; 

                case 'ESTPRODUTOMES':
                    //pegando o codigo e o estado da url
                    $id = $_GET['codigo'];
                    $estado = $_GET['situacao'];

                    //instancia do produtoController
                    $produtoController = new ProdutoController();

                    //metodo para adicionar produto
                    $produtoController->ativarDesativarPodutoMes($id, $estado);
                break; 

                case 'ESTPRODUTO':
                    //pegando o codigo e o estado da url
                    $id = $_GET['codigo'];
                    $estado = $_GET['situacao'];

                    //instancia do produtoController
                    $produtoController = new ProdutoController();

                    //metodo para adicionar produto
                    $produtoController->ativarDesativarPoduto($id, $estado);
                break; 
                
                case 'BUSCARPRODUTO':
                    
                    $id = $_GET['codigo'];

                    $produtoController = new ProdutoController();

                    $produtoController->selectByIdProduto($id);

                break;

                case 'EDITARPRODUTO':
                    $id = $_GET['id'];
                    $produtoController = new ProdutoController();

                    $produtoController->editarProduto($id);   

                break;
                
            }

        break;

        case 'CATEGORIA':
            require_once('controller/categoriaController.php');

            switch (strtoupper($modo)) {
                case 'INSERIRCATEGORIA':
                    $categoriaController = new CategoriaController();

                    $categoriaController->inserirCategoria();   

                break;
                
                case 'INSERIRSUBCATEGORIA':
                    $categoriaController = new CategoriaController();

                    $categoriaController->inserirSubcategoria();

                break;

                case 'ESTADO':
                    $id = $_GET['codigo'];
                    $estado = $_GET['situacao'];

                    $categoriaController = new CategoriaController();

                    $categoriaController->ativarDesativarCategoria($id, $estado);

                break; 

                case 'DELETAR':
                    $id = $_GET['codigo'];
                    $categoriaController = new CategoriaController();

                    $categoriaController->excluirCategoria($id);

                break;

                case 'BUSCARCATEGORIA':
                    $id = $_GET['id'];

                    $categoriaController = new CategoriaController();

                    $categoriaController->buscarCategoria($id);                
                
                break;

                case 'EDITARCATEGORIA':
                    $id = $_GET['id'];
                    $categoriaController = new CategoriaController();

                    $categoriaController->editarCategoria($id);   

                break;
                
            }

        break;

        case 'SUBCATEGORIA':
            require_once('controller/subcategoriaController.php');

            switch (strtoupper($modo)) {
                case 'INSERIRSUBCATEGORIA':
                    $subcategoriaController = new SubcategoriaController();

                    $subcategoriaController->inserirSubcategoria();

                break;

                case 'DELETAR':
                    $id = $_GET['codigo'];
                    $subcategoriaController = new SubcategoriaController();

                    $subcategoriaController->excluirSubcategoria($id);

                break;

                case 'ESTADO':
                    $id = $_GET['codigo'];
                    $estado = $_GET['situacao'];

                    $subcategoriaController = new SubcategoriaController();

                    $subcategoriaController->atvDesSubcategoria($id, $estado);

                break; 

                case 'BUSCARSUBCATEGORIA':
                    $id = $_GET['id'];

                    $subcategoriaController = new SubcategoriaController();

                    $subcategoriaController->buscarSubcategoria($id);                
                
                break;

                case 'EDITARSUBCATEGORIA':
                    $id = $_GET['id'];
                    $subcategoriaController = new SubcategoriaController();

                    $subcategoriaController->editarSubcategoria($id);   

                break;
            }
            
            

        break;
    }
}

?>