<?php
/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 03/12/2019
 * Data de modificação:
 * Modificações realizadas:
 */

    $titulo_pagina = (string) "criação de produtos";
    session_start();

    $fkSubcategoriaProduto = 0;

    $action = (String) "../router.php?controller=produto&modo=adicionar";

    if(isset($_GET['modo'])){
        if(strtoupper($_GET['modo']) == 'BUSCARPRODUTO'){
            @$codigoProduto = (String) $_SESSION['codigoProdutoEditar'];
            @$nomeProduto = (String) $_SESSION['nomeProdutoEditar'];
            @$precoProduto = (String) $_SESSION['precoProdutoEditar'];
            @$descricaoProduto = (String) $_SESSION['descricaoProdutoEditar'];
            @$precoPromocionalProduto = (String) $_SESSION['precoPromocionalProdutoEditar'];
            @$fotoProduto = (String) $_SESSION['fotoProdutoEditar'];
            @$subcategoriaProduto = (String) $_SESSION['subcategoriaProdutoEditar'];
            @$fkSubcategoriaProduto = (String) $_SESSION['fkSubcategoriaProdutoEditar'];
        
            $action = "../router.php?controller=produto&modo=editarproduto&id=".$codigoProduto;
            $titulo_pagina = "editar produto";   

        }

        session_unset();
    } 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delícia Gelada</title>
        <link rel="shortcut icon" href="../../imagens/fav_icon.png"/>
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <!-- CABEÇALHO -->
        <div id="div_cabecalho" class="conteudo">
            <div id="div_cabecalho_titulo">
                <h1>Sistema de Gerenciamento de Produtos do site</h1>
            </div>
            <div id="div_cabecalho_logo">
                <img src="../../imagens/logo.png" alt="Logo Delícia Gelada">
            </div>        
        </div>
        <!-- MENU -->
        <div id="div_menu" class="conteudo">
            <nav>
                <div id="div_icon_adm_conteudo" class="icons">
                    <a href="#">
                        <img src="../../imagens/icons/edit.png" alt="">
                    </a> 
                    <h3>Gerenciamento de conteúdo</h3>
                </div>
                <div id="div_icon_fale_conosco" class="icons">
                    <a href="admCategoria.php">
                        <img src="../../imagens/icons/categoria.png" alt="">                    
                    </a>                    
                    <h3>Gerenciamento de categoria</h3>
                </div>
                <div id="div_icon_adm_usuarios" class="icons">
            
                </div>
                <div id="div_usuario">
                    <div id="div_nome_usuario">
                        <h3>Bem vindo.</h3>
                    </div>
                    <div id="div_logout">
                        <h3>Logout</h3>
                    </div>
                </div>                
            </nav>
        </div>
        <!-- CONTEUDO  -->
        <div id="div_edicao_conteudo_produtos" class="conteudo">
            <div id="div_titulo_tabela_produtos">
                <h5><?=$titulo_pagina?></h5>   
            </div>
            <div id="div_form_conteudo_produtos">
                <form action="<?=$action?>" enctype="multipart/form-data" method="post" name="frmProdrutos">
                    <div id="div_nome_produto" class="caixa_inputs_produtos">
                        <div id="div_titulo_nome_produto">
                            <h2>nome:</h2>
                            <input type="text" value="<?= isset($nomeProduto) ? $nomeProduto : '';?>" name="txtNomeProduto">
                        </div>                        
                    </div>
                    <div id="div_preco_produto" class="caixa_inputs_produtos">
                        <div id="div_titulo_preco_produto">
                            <h2>preco:</h2>
                            <input type="text" value="<?= isset($precoProduto) ? $precoProduto : '';?>" name="txtPrecoProduto">
                        </div>
                    </div>
                    <div id="div_preco_promocional_produto" class="caixa_inputs_produtos">
                        <div id="div_titulo_preco_promocional_produto">
                            <h2>preco promocional:</h2>
                            <input type="text" value="<?= isset($precoPromocionalProduto) ? $precoPromocionalProduto : '';?>" name="txtPrecoPromocionalProduto">
                        </div>                     
                    </div>
                    <div id="div_descricao_imagem_produto">
                        <div id="div_descricao_produto" class="caixa_inputs_produtos">
                            <div id="div_titulo_descricao_produto">
                                <h2>descrição do produto:</h2>
                                <textarea name="txtDescProduto" maxlength="250">
                                    <?= isset($descricaoProduto) ? $descricaoProduto : '';?>"
                                </textarea>
                            </div>                     
                        </div>
                        <div id="div_imagem_produto" class="caixa_inputs_produtos">
                            <div id="div_titulo_imagem_produto">
                                <h2>imagem do produto:</h2>
                                <input type="file" name="fleImgProduto">
                            </div>                     
                        </div>
                    </div>
                    <div id="div_btn_submit_produto">
                        <select name="sltCategoriaProduto" id="">
                            <?php
                                require_once('subcategoria/selectSubcategoria.php');
                            ?>
                        </select>
                        <input type="submit" name="btnSubmitPromocao">
                    </div>
                </form>
                <div id="div_tabela_produtos">
                    <div id="div_titulo_tabela_produto_listagem">
                        <h2>Todos os produtos</h2>                        
                    </div>
                    <div id="tabela_produtos">
                        <?php
                            require_once('produtos/produtos.php');
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- RODAPÉ -->
        <div id="div_rodape" class="conteudo">
            <h3>Desenvolvidado por: Igor Xavier</h3>
        </div>
    </body>
</html>
                        