<!-- 
/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: há muito tempo atras
 * Data de modificação:07/12/2019
 * Modificações realizadas: transferido a listagem dos produtos na home para (promocoes/produtoHome.php)
 */ 
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delícia Gelada</title>
        <link rel="shortcut icon" href="imagens/fav_icon.png"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery.js"></script>
        <script src="js/scroll.js"></script>
        <script src="js/jquery-3.1.0.min.js"></script>
	    <script src="js/main.js"></script>
    </head>
    <body>
        <!-- área do cabeçalho -->
        <header class="center">
            <div id="div_conteudo_nav" class="conteudo">
                <div id="div_img_nav">
                    <a href="index.php">
                        <img src="imagens/logo.png" alt="Logo Delícia Gelada">
                    </a>
                </div>
                <nav>
                    <ul id="ul_menu">
                        <li class="li_menu_item">
                            <a href="promocoes.php">
                                promoções
                            </a>
                        </li>
                        <li class="li_menu_item">
                            <a href="curiosidades.php">
                                curiosidades
                            </a>
                        </li>
                        <li class="li_menu_item">
                            <a href="produtoDoMes.php">
                                produto do mês
                            </a>
                        </li>
                        <li class="li_menu_item">
                            <a href="nossasLojas.php">
                                nossas lojas
                            </a>
                        </li>
                        <li class="li_menu_item">
                            <a href="sobre.php">
                                sobre
                            </a>
                        </li>
                        <li class="li_menu_item">
                            <a href="entreEmContato.php">
                                entre em contato
                            </a>
                        </li>
                    </ul>
                </nav>
                <div id="div_form">
                    <form method="post" name="frmIndexLogin" action="bd/autenticacaoCms.php">
                        <div id="div_txt_usuario">
                            <span class="usuario_senha">Usuário:</span><br><input type="email" name="txtUsuario" id="txt_usuario" value="">
                        </div>
                        <div id="div_txt_senha">
                            <span class="usuario_senha">Senha:</span><br><input type="password" name="txtSenha" id="txt_senha" value="">
                        </div>
                        <div id="btn_submit_ok">
                            <input type="submit" name="btnOk" id="btn_ok" value="Ok">
                        </div>                        
                    </form>
                </div>
            </div>
        </header>
        <!-- conteudo -->
        <div id="div_espaco"></div>
        <div id="seta">
            <img src="imagens/icons/facebook.png" alt="Nosso facebook">
            <img src="imagens/icons/insta.png" alt="Nosso instagram">
            <img src="imagens/icons/twitter.png" alt="Nosso twitter">            
        </div>
        <div id="div_container_slide">
            <div id="esquerda">
                <img src="imagens/icons/esquerda.png" alt="Botão voltar">
            </div>
            <div id="div_slider_li">
                <ul id="slider">
                    <li>
                        <img src="imagens/imgSlider/1.png" alt="">
                    </li>
                    <li>
                        <img src="imagens/imgSlider/2.png" alt="">
                    </li>
                    <li>
                        <img src="imagens/imgSlider/3.png" alt="">
                    </li>
                    <li>
                        <img src="imagens/imgSlider/4.png" alt="">
                    </li>
                </ul>
            </div> 
            <div id="direita">
                <img src="imagens/icons/direita.png" alt="Botão avançar">
            </div>
	   </div>
        <div id="div_conteudo" class="conteudo">
            <nav id="nav_filtros">
                <?php
                    require_once('produtos/produtoFiltro.php');
                ?>         
            </nav>            
            <div id="div_produtos">
                <div id="div_titulo_produtos">
                    <h3>Nossos Produtos</h3>
                </div>
                <?php
                    require_once('produtos/produtoHome.php');
                ?>
            </div>
        </div>
        <!-- rodape -->
        <footer id="div_rodape" class="conteudo">
            <div id="div_sistema_interno">
                <a href="cms/cmsMVC/view/login.php">
                    <button id="btn_sistema_interno">Sistema Interno</button>
                </a> 
            </div>
            <div id="div_endereco">
                Endereço: Av. Luis Carlos Berrini, nº 666 - São Paulo.
            </div>
            <div id="div_app">  
                <button id="btn_baixar_app">
                    <img src="imagens/icons/download.png" alt="Download" id="img_app">
                    Baixe o app
                </button>
            </div>
        </footer> 
        <script src="js/main.js"></script>
    </body>
</html>