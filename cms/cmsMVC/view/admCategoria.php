<?php
/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 03/12/2019
 * Data de modificação:
 * Modificações realizadas:
 */

    $titulo_pagina_categoria = (string) "criação de categoria";
    $titulo_pagina_subcategoria = (string) "criação de subcategoria";
    session_start();

    $idSelectSubcategoria = 0;

    $action = (String) "../router.php?controller=categoria&modo=inserircategoria";
    $actionSubcategoria = (String) "../router.php?controller=subcategoria&modo=inserirsubcategoria";

    if(isset($_GET['modo'])){
        if(strtoupper($_GET['modo']) == 'BUSCARCATEGORIA'){
            @$codigoCategoria = (String) $_SESSION['codigoCategoriaEditar'];
            @$nomeCategoria = (String) $_SESSION['nomeCategoriaEditar'];
        
            $action = "../router.php?controller=categoria&modo=editarcategoria&id=".$codigoCategoria;
            $titulo_pagina_categoria = "editar categoria";   

        }elseif(strtoupper($_GET['modo']) == 'BUSCARSUBCATEGORIA'){
            @$codigoSubcategoria = (String) $_SESSION['codigoSubcategoriaEditar'];
            @$nomeSubcategoria = (String) $_SESSION['nomeSubcategoriaEditar'];
            @$idSelectSubcategoria = (String) $_SESSION['fkSubcategoriaEditar'];
            @$selectNomeSubcategoria = (String) $_SESSION['nomeCategoriasEditar'];
              
        
            $actionSubcategoria = "../router.php?controller=subcategoria&modo=editarsubcategoria&id=".$codigoSubcategoria;
            $titulo_pagina_subcategoria = "editar subcategoria";

        
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
                    <a href="admProdutos.php">
                        <img src="../../imagens/icons/edit.png" alt="">
                    </a> 
                    <h3>Gerenciamento de conteúdo</h3>
                </div>
                <div id="div_icon_fale_conosco" class="icons">
                    <a href="#">
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
                <h5><?=$titulo_pagina_categoria?></h5>   
            </div>
            <div id="div_form_conteudo_produtos">
                <div class="div_container_categoria_subcategoria">
                    <form action="<?=$action?>" method="post" name="frmCategorias">
                        <div id="div_nome_categoria">
                            <div id="div_titulo_categoria">
                                <h3>nome categoria:</h3>
                                
                            </div>
                            <div id="div_input_categoria" class="inputsCategorias">
                                <input type="text" name="txtNomeCategoria" value="<?= isset($nomeCategoria) ? $nomeCategoria : '';?>">
                            </div>
                        </div>
                        <div id="div_submit_categoria">
                            <input type="submit" name="btnSubmitCategoria" value="salvar">
                        </div>
                    </form>
                    <div id="div_tabela_produtos">  
                        <div id="div_titulo_tabela_produto_listagem">
                            <h2>Todas categorias</h2>                        
                        </div>
                        <div id="tabela_produtos">
                            <?php
                                require_once('categoria/categorias.php');
                            ?>
                        </div>
                    </div>                    
                </div>
                <div class="div_container_categoria_subcategoria">
                    <div id="div_titulo_tabela_produtos">
                        <h5><?=$titulo_pagina_subcategoria?></h5>   
                    </div>
                    <form action="<?=$actionSubcategoria?>" method="post" name="frmCategorias">
                        <div id="div_nome_subcategoria">
                            <div id="div_titulo_subcategoria">
                                <h3>nome subcategoria:</h3>                                
                            </div>
                            <div id="div_input_subcategoria" class="inputsCategorias">
                                <input type="text" name="txtNomeSubcategoria" value="<?= isset($nomeSubcategoria) ? $nomeSubcategoria : '';?>">
                            </div>
                        </div>
                        <div id="div_select_categoria">
                            <div id="div_titulo_select_categoria">
                                <h3>categoria referente:</h3>                                
                            </div>
                            <select name="sltCategoria" class="inputsCategorias" >
                                <?php
                                    require_once('categoria/selectCategoria.php');
                                ?>
                            </select>                            
                        </div>
                        <div id="div_submit_subcategoria">
                            <input type="submit" name="btnSubmitSubcategoria" value="salvar">
                        </div>
                    </form>
                    <div id="div_tabela_produtos">  
                        <div id="div_titulo_tabela_produto_listagem">
                            <h2>Todas subcategorias</h2>                        
                        </div>
                        <div id="tabela_produtos">
                            <?php
                                require_once('subcategoria/subcategoria.php');
                            ?>
                        </div>
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
                   