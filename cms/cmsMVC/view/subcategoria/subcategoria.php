<!--
     /* Classe de Contato
      * Autor: Igor Xavier
      * Data de criação: 09/12/2019
      * Data de modificação:
      * Modificações realizadas: 
 */ -->

 <div id="consulta">
    <table>
        <thead>
            <tr id="td_cabecalho_produtos">
                <th>Nome categoria</th>
                <th>Nome subcategoria</th>                    
                <th>Opções</th>                   
            </tr>
            <?php
            
                require_once('../controller/subcategoriaController.php');

                $subcategoriaController = new SubcategoriaController();

                $subcategorias = $subcategoriaController->listarTodasSubcategorias();

                $cont = 0;
                while($cont < count($subcategorias)){
            
            ?>
                <tr id="td_linha_produtos">
                    <th><?=$subcategorias[$cont]->getNome();?></th>
                    <th><?=$subcategorias[$cont]->getNomeCategoria();?></th>
                    <th>
                        <a href="../router.php?controller=subcategoria&modo=buscarsubcategoria&id=<?=$subcategorias[$cont]->getCodigo();?>">
                            <img src="../../imagens/icons/editPreto.png" alt="">
                        </a>
                        <a onclick="return confirm('Deseja realmente excluir essa subcategoria? Se excluir você perderá o registro de todos os produtos pertencentes a ela. ');" href="../router.php?controller=subcategoria&modo=deletar&codigo=<?=$subcategorias[$cont]->getCodigo();?>">
                            <img src="../../imagens/icons/deletePreto.png" alt="">
                        </a>
                        <a href="../router.php?controller=subcategoria&modo=estado&codigo=<?=$subcategorias[$cont]->getCodigo();?>&situacao=<?=$subcategorias[$cont]->getEstado();?>">
                            <?php
                                if($subcategorias[$cont]->getEstado() == "atv"){
                            ?>
                                <img src="../../imagens/icons/ativado.png" alt="">
                            <?php 
                                }elseif($subcategorias[$cont]->getEstado() == "des"){
                            ?>
                                <img src="../../imagens/icons/desativado.png" alt="">
                            <?php 
                                }
                            ?>
                        </a>                        
                    </th>            
                                                 
                </tr>  

            <?php 
                $cont++;
            } 
            ?>  

        </thead>
    </table>
</div>   