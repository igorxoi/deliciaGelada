<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delícia Gelada</title>
        <script src="js/jquery-3.1.0.min.js"></script>
        <script src="js/jquery.js"></script>
        <link rel="shortcut icon" href="../imagens/fav_icon.png"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <!-- MODAL -->
        <div id="container">
            <div id="modal">
                <div id="btn_fechar_modal_contatos">
                    <a href="#" id="fechar">
                        <img src="imagens/icons/fechar.png" alt="">
                    </a>
                </div>
                <div id="conteudoModal">
                </div>
                
            </div>
        </div>
        <!-- CABEÇALHO -->
        <div id="div_cabecalho" class="conteudo">
            <div id="div_cabecalho_titulo">
                <h1>CMS - Sistema de Gerenciamento do Site</h1>
            </div>
            <div id="div_cabecalho_logo">
                <img src="imagens/logo.png" alt="Logo Delícia Gelada">
            </div>        
        </div>
        <!-- MENU -->
        <div id="div_menu" class="conteudo">
            <nav>
            <div id="div_icon_adm_conteudo" class="icons"> 
                    <?php
                        if($_SESSION['adm_conteudo'] == 1){
                    ?>
                            <a href="admConteudo.php">
                    <?php 
                        }else{
                    ?>
                            <a href="">
                    <?php 
                        }
                    ?>
                        <img src="imagens/icons/edit.png" alt="">
                    </a> 
                    <h3>Adm. Conteúdo</h3>
                </div>
                <div id="div_icon_fale_conosco" class="icons">
                    <?php
                        if($_SESSION['adm_contato'] == 1){
                    ?>
                            <a href="faleConosco.php">
                    <?php 
                        }else{
                    ?>
                            <a href="">
                    <?php 
                        }
                    ?>
                        <img src="imagens/icons/chat.png" alt="">                    
                    </a>                    
                    <h3>Adm. Fale Conosco</h3>
                </div>
                <div id="div_icon_adm_usuarios" class="icons">
                    <?php
                        if($_SESSION['adm_usuario'] == 1){
                    ?>
                            <a href="admUsuario.php">
                    <?php 
                        }else{
                    ?>
                            <a href="">
                    <?php 
                        }
                    ?>
                        <img src="imagens/icons/user.png" alt="">
                    </a>                    
                    <h3>Adm. Usuários</h3>
                </div>
                <div id="div_usuario">
                    <div id="div_nome_usuario">
                        <h3>Bem vindo, <?=$_SESSION['nome_usuario'];?>.</h3>
                    </div>
                    <div id="div_logout">
                        <h3>Logout</h3>
                    </div>
                </div>                 
            </nav>
        </div>
        <!-- CONTEUDO  -->
        <div id="div_conteudo_adm_conteudo" class="conteudo">
            <div id="div_titulo_tabela">
                <h5>administração de conteudo</h5>   
            </div>
            <div id="div_icones_adm_conteudo">
                <div id="div_selecao_sobre">                
                    <a href="edicaoConteudoSobre.php">
                        <div id="div_icone_sobre">

                        </div>
                    </a>                   
                    <div id="div_titulo_sobre">
                        <h3>sobre</h3>
                    </div>
                </div>
                <div id="div_selecao_curiosidades">
                    <a href="edicaoCuriosidades.php">
                        <div id="div_icone_curiosidades">

                        </div>                
                    </a>                    
                    <div id="div_titulo_curiosidades">
                        <h3>curiosidades</h3>
                    </div>
                </div>
                <div id="div_selecao_nossas_lojas">
                    <a href="edicaoLojas.php">
                        <div id="div_icone_nossas_lojas">

                        </div>              
                    </a>                     
                    <div id="div_titulo_nossas_lojas">
                        <h3>Nossas lojas</h3>
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