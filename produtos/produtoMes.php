<!--
     /* Classe de Contato
      * Autor: Igor Xavier
      * Data de criação: 08/12/2019
      * Data de modificação:
      * Modificações realizadas: 
 */ -->


<div id="div_conteudo_pdt_mes">
    <?php
    require_once('cms/cmsMVC/controller/produtoController.php');

    $produto = new ProdutoController();

    $produtoMes = $produto->listarProdutoMes();
    ?>
    <div id="div_titulo_produto_mes">
        <h3>Produto do Mês!</h3>
    </div> 
    <div id="div_img_produto_mes">
        <img src="cms/cmsMVC/model/DAO/arquivos/<?=$produtoMes->getFoto();?>" alt="Produto do mês">
    </div> 
    <div id="div_nome_produto_mes">
        <h3><?=$produtoMes->getNome();?></h3>
    </div> 
    <div id="div_drescricao_produto_mes">
        <h3>
            <?=$produtoMes->getDescricao();?>
        </h3>
    </div>   
    <div id="div_preco_produto_mes">
        <h3>R$ <?=$produtoMes->getPreco();?></h3>
    </div>  
</div>