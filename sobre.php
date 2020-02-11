<?php

    session_start();

    require_once('bd/conexao.php');
    $conexao = conexaoMysql();

    
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Delícia Gelada</title>
        <link rel="shortcut icon" href="imagens/fav_icon.png"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
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
        <div id="div_espaco"></div>
        <div id="div_conteudo_sobre" class="conteudo">
            <div id="div_titulo_sobre">
                <h3>sobre</h3>
            </div>
            <div id="div_texto_sobre">

                <?php
                    $sql = "SELECT * from tbl_sobre_conteudo WHERE situacao_sobre_conteudo = 'atv'";

                    $select = mysqli_query($conexao, $sql);

                    while($rs = mysqli_fetch_array($select)){
                ?>

                <div id="div_descricao_sobre">
                    <h3>
                        <?= $rs["texto_conteudo_sobre"];?>
                        <!-- A Delícia Gelada foi fundada pelo Sr. Buz Buzzard, um empresário brasileiro que começou seu negócio com uma pequena loja de suco no interior de São Paulo em 2009, e desde então vem proporcionando para seus amigos e clientes saúde e sabor com os seus sucos 100% naturais. 
                        Hoje, dez anos depois, temos três lojas, todas em São Paulo, duas na capital e uma no interior, e pensamos em expandir cada vez mais, para oferecer para o máximo de gente possível saúde, qualidade e sabor com os nossos sucos.    -->
                    </h3>
                </div>
                <div id="div_imagem_sobre">
                    <img src="cms/bd/arquivos/<?= $rs["img_conteudo_sobre"];?>" alt="Imagem introdução sobre">
                </div>

                <?php

                    }

                ?>

            </div>
            <div id="div_missao_visao_valores">

                <?php
                    $sql = "SELECT * from tbl_sobre_perspectiva WHERE situacao_sobre_perspectiva = 'atv'";

                    $select = mysqli_query($conexao, $sql);

                    while($rs = mysqli_fetch_array($select)){
                ?>

                <div id="div_conteudo_missao_sobre">
                    <div id="div_imagem_missao">
                        <img src="cms/bd/arquivos/<?= $rs["imagem1_perspectiva"];?>" alt="Imagem introdução sobre">
                    </div>
                    <div id="div_titulo_missao">
                        <?= $rs["titulo1_perspectiva"];?>
                    </div>  
                    <div id="div_descricao_missao">
                        <h3>
                            <?= $rs["texto1_perspectiva"];?>
                        </h3>
                    </div>
                </div>            
                <div id="div_conteudo_visao_sobre">
                    <div id="div_imagem_visao">
                        <img src="cms/bd/arquivos/<?= $rs["imagem2_perspectiva"];?>" alt="Imagem introdução sobre">
                    </div>
                    <div id="div_titulo_visao">
                        <?= $rs["titulo2_perspectiva"];?>
                    </div> 
                    <div id="div_descricao_visao">
                        <h3>
                            <?= $rs["texto2_perspectiva"];?>
                        </h3>
                    </div>                
                </div>            
                <div id="div_conteudo_valores_sobre">
                    <div id="div_imagem_valores">
                        <img src="cms/bd/arquivos/<?= $rs["imagem3_perspectiva"];?>" alt="Imagem introdução sobre">
                    </div>
                    <div id="div_titulo_valores">
                    <?= $rs["titulo3_perspectiva"];?>
                    </div> 
                    <div id="div_descricao_valores">
                        <h3>
                            <?= $rs["texto3_perspectiva"];?>
                        </h3>
                    </div>                 
                </div>

                <?php

                    }

                ?>
            </div>             
        </div>
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
    </body>
</html>