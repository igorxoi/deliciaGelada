<?php
    session_start();

    
?>

<!-- 
    /* Classe de Contato
     * Autor: Igor Xavier
     * Data de criação: 01/12/2019
     * Data de modificação:
     * Modificações realizadas:
     */ -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delícia Gelada</title>
        <link rel="shortcut icon" href="../../imagens/fav_icon.png"/>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
    <body>
        <!-- CABEÇALHO -->
        <div id="div_cabecalho" class="conteudo">
            <div id="div_cabecalho_titulo">
                <h1>Sistema de Gerenciamento de Produtos do site</h1>
            </div>
            <div id="div_cabecalho_logo">
                <img src="../imagens/logo.png" alt="Logo Delícia Gelada">
            </div>        
        </div>
        <!-- MENU -->
        <div id="div_menu" class="conteudo">
            <nav>
                <div id="div_icon_adm_conteudo" class="icons">
                    <a href="view/admProdutos.php">
                        <img src="../imagens/icons/edit.png" alt="">
                    </a> 
                    <h3>Gerenciamento de conteúdo</h3>
                </div>
                <div id="div_icon_fale_conosco" class="icons">
                    <a href="view/admCategoria.php">
                        <img src="../imagens/icons/categoria.png" alt="">                    
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
        <div id="div_conteudo" class="conteudo">
            <h5>Bem-vindo ao CMS</h5>
        </div>
        <!-- RODAPÉ -->
        <div id="div_rodape" class="conteudo">
            <h3>Desenvolvidado por: Igor Xavier</h3>
        </div>
    </body>
</html>
