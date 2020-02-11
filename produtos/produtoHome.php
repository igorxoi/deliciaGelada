<!--
     /* Classe de Contato
      * Autor: Igor Xavier
      * Data de criação: 07/12/2019
      * Data de modificação:
      * Modificações realizadas: 
 */ -->

<div id="div_produtos_home">
<?php
    if(isset($_GET['modo'])){
        if($_GET['modo'] == "filtro"){
            $id = $_GET['codigo'];
            
            require_once('cms/cmsMVC/controller/produtoController.php');

            $produtos = new ProdutoController();

            $produtosHomeFiltro = $produtos->listarProdutosComFiltro($id);

            $cont = 0;
            while($cont < count($produtosHomeFiltro)){?>
                <div class="div_itens_produtos">
                    <div class="img_itens_produtos">
                        <img src="cms/cmsMVC/model/DAO/arquivos/<?=$produtosHomeFiltro[$cont]->getFoto();?>" alt="Produto 01">
                    </div>               
                    <div class="nome_itens_produtos">
                        <?=$produtosHomeFiltro[$cont]->getNome();?> 
                        </div>
                        <div class="preco_itens_produtos">
                            R$ <?=$produtosHomeFiltro[$cont]->getPreco();?>
                        </div>
                    <div class="div_btn_detalhes">
                        <div class="descricao_itens_produtos">
                            Descrição: <?=$produtosHomeFiltro[$cont]->getDescricao();?>
                        </div>
                        <div class="div_btn_descricao">
                            <div class="btn_descricao">
                                <h3>Ver Detalhes</h3>
                                <div class="seta_combos">
                                    <div></div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                <?php
                $cont++;
            }
            ?>

    <?php
        }
    }else{?>
        
            <?php
            require_once('cms/cmsMVC/controller/produtoController.php');

            $produtos = new ProdutoController();

            $produtosHome = $produtos->selectProdutosHome();

            $cont = 0;
            while($cont < count($produtosHome)){?>
                <div class="div_itens_produtos">
                    <div class="img_itens_produtos">
                        <img src="cms/cmsMVC/model/DAO/arquivos/<?=$produtosHome[$cont]->getFoto();?>" alt="Produto 01">
                    </div>               
                    <div class="nome_itens_produtos">
                        <?=$produtosHome[$cont]->getNome();?> 
                        </div>
                        <div class="preco_itens_produtos">
                            R$ <?=$produtosHome[$cont]->getPreco();?>
                        </div>
                    <div class="div_btn_detalhes">
                        <div class="descricao_itens_produtos">
                            Descrição: <?=$produtosHome[$cont]->getDescricao();?>
                        </div>
                        <div class="div_btn_descricao">
                            <div class="btn_descricao">
                                <h3>Ver Detalhes</h3>
                                <div class="seta_combos">
                                    <div></div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            <?php
                $cont++;
            
            }
            ?>
        
    <?php
        
    }?>

</div>