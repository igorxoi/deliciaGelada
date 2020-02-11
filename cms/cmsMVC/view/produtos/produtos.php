<!--
     /* Classe de Contato
      * Autor: Igor Xavier
      * Data de criação: 05/12/2019
      * Data de modificação:07/12/2019
      * Modificações realizadas: Criado todos os href de ativar e desativar
 */ -->

<div id="consulta">
    <table>
        <thead>
            <tr id="td_cabecalho_produtos">
                <th>foto</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>preço prom.</th> 
                <th>Descrição</th>    
                <th>Subcategoria</th>                
                <th>promoção</th>                        
                <th>pro. mês</th>                        
                <th>Opções</th>                       
            </tr>
            <?php
            
                require_once('../controller/produtoController.php');

                $produtoController = new ProdutoController();

                $produtos = $produtoController->listarProdutos();

                $cont = 0;
                while($cont < count($produtos)){
            
            ?>
                <tr id="td_linha_produtos">
                    <th>
                        <img src="../model/DAO/arquivos/<?=$produtos[$cont]->getFoto();?>" alt="">
                    </th>
                    <th><?=$produtos[$cont]->getNome();?></th>
                    <th><?=$produtos[$cont]->getPreco();?></th>
                    <th><?=$produtos[$cont]->getPrecoPromocional();?></th>
                    
                    <th><?=$produtos[$cont]->getDescricao();?></th>
                    <th><?=$produtos[$cont]->getSubcategoria();?></th>
                    <th>
                        <a href="../router.php?controller=produto&modo=estpromocao&codigo=<?=$produtos[$cont]->getCodigo();?>&situacao=<?=$produtos[$cont]->getPromocao();?>">
                            <?php
                                if($produtos[$cont]->getPromocao() == "sim"){
                            ?>
                                <img src="../../imagens/icons/ativado.png" alt="">
                            <?php 
                                }elseif($produtos[$cont]->getPromocao() == "nao"){
                            ?>
                                <img src="../../imagens/icons/desativado.png" alt="">
                            <?php 
                                }
                            ?>
                        </a> 
                        
                    </th>
                    <th>
                        <a href="../router.php?controller=produto&modo=estprodutomes&codigo=<?=$produtos[$cont]->getCodigo();?>&situacao=<?=$produtos[$cont]->getProdutoDoMes();?>">
                            <?php
                                if($produtos[$cont]->getProdutoDoMes() == "atv"){
                            ?>
                                <img src="../../imagens/icons/ativado.png" alt="">
                            <?php 
                                }elseif($produtos[$cont]->getProdutoDoMes() == "des"){
                            ?>
                                <img src="../../imagens/icons/desativado.png" alt="">
                            <?php 
                                }
                            ?>
                        </a> 
                    </th>               
                    <th>                                
                        <a href="../router.php?controller=produto&modo=buscarproduto&codigo=<?=$produtos[$cont]->getCodigo();?>">
                            <img src="../../imagens/icons/editPreto.png" alt="">
                        </a>  
                        <a href="../router.php?controller=produto&modo=deletar&codigo=<?=$produtos[$cont]->getCodigo();?>">
                            <img src="../../imagens/icons/deletePreto.png" alt="">
                        </a> 
                        <a href="../router.php?controller=produto&modo=estproduto&codigo=<?=$produtos[$cont]->getCodigo();?>&situacao=<?=$produtos[$cont]->getEstado();?>">
                            <?php
                                if($produtos[$cont]->getEstado() == "atv"){
                            ?>
                                <img src="../../imagens/icons/ativado.png" alt="">
                            <?php 
                                }elseif($produtos[$cont]->getEstado() == "des"){
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
            } ?>  

        </thead>
    </table>
</div>    