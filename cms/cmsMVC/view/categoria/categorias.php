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
                <th>Nome</th>                   
                <th>Opções</th>                   
            </tr>
            <?php
            
                require_once('../controller/categoriaController.php');

                $categoriaController = new CategoriaController();

                $categorias = $categoriaController->selecionarTodasCategorias();

                $cont = 0;
                while($cont < count($categorias)){
            
            ?>
                <tr id="td_linha_produtos">
                    <th><?=$categorias[$cont]->getNome();?></th>
                    <th>
                        <a href="../router.php?controller=categoria&modo=buscarcategoria&id=<?=$categorias[$cont]->getCodigo();?>">
                            <img src="../../imagens/icons/editPreto.png" alt="">
                        </a>
                        <a onclick="return confirm('Deseja realmente excluir essa categoria? ');" href="../router.php?controller=categoria&modo=deletar&codigo=<?=$categorias[$cont]->getCodigo();?>">
                            <img src="../../imagens/icons/deletePreto.png" alt="">
                        </a>
                        <a href="../router.php?controller=categoria&modo=estado&codigo=<?=$categorias[$cont]->getCodigo();?>&situacao=<?=$categorias[$cont]->getEstado();?>">
                            <?php
                                if($categorias[$cont]->getEstado() == "atv"){
                            ?>
                                <img src="../../imagens/icons/ativado.png" alt="">
                            <?php 
                                }elseif($categorias[$cont]->getEstado() == "des"){
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