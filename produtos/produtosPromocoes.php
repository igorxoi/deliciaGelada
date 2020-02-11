<!--
     /* Classe de Contato
      * Autor: Igor Xavier
      * Data de criação: 07/12/2019
      * Data de modificação:
      * Modificações realizadas: 
 */ -->


<div class="div_produtos_promocoes">
    <?php
    require_once('cms/cmsMVC/controller/produtoController.php');

    $produtos = new ProdutoController();

    $produtosPromocao = $produtos->listarProdutosPromocoes();

    $cont = 0;
    while($cont < count($produtosPromocao)){
    ?>
        <div class="div_itens_produtos">
            <div class="img_itens_produtos">
                <img src="cms/cmsMVC/model/DAO/arquivos/<?=$produtosPromocao[$cont]->getFoto();?>" alt="<?=$produtosPromocao[$cont]->getNome();?>">
            </div>               
            <div class="nome_itens_produtos">
                <?=$produtosPromocao[$cont]->getNome();?>
            </div>
            <div class="preco_itens_produtos">
                <h6>R$ <?=$produtosPromocao[$cont]->getPreco();?></h6>
                por R$ <?=$produtosPromocao[$cont]->getPrecoPromocional();?>
            </div>
            <div class="btn_descricao_promocao">
                <h3>Ver Detalhes</h3>
                <div class="seta_combos">
                    <div></div>
                </div>
            </div>             
        </div> 
    <?php
        $cont++;
    }
    ?>
    
</div>  