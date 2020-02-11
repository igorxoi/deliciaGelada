<!--
     /* Classe de Contato
      * Autor: Igor Xavier
      * Data de criação: 09/12/2019
      * Data de modificação:
      * Modificações realizadas: 
 */ -->

<nav id="div_nav_filtros">
    <?php            
        require_once('cms/cmsMVC/controller/categoriaController.php');

        $categoriaController = new CategoriaController();

        $categorias = $categoriaController->listarTodasCategorias();

        $contCategoria = 0;
        
        while($contCategoria < count($categorias)){
        
    ?>
    <div class="div_filtros">
        <h3><?=$categorias[$contCategoria]->getNome()?></h3>

            <?php          
              
            require_once('cms/cmsMVC/controller/subcategoriaController.php');

            $subcategoriaController = new SubcategoriaController();

            if($subcategorias = $subcategoriaController->listarFiltroTodasCategorias($categorias[$contCategoria]->getCodigo())){

            
                $cont = 0;
                while($cont < count($subcategorias)){        
            ?>
                    <a href="index.php?modo=filtro&codigo=<?=$subcategorias[$cont]->getCodigo()?>">
                        <h2><?=$subcategorias[$cont]->getNome()?></h2>
                    </a>
            <?php
                $cont++;

                }
            }
            ?>
    </div> 

    <?php
        $contCategoria++;
    }
    ?>
    
    
</nav>

  