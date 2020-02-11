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
        <!-- conteudo -->
        <div id="div_espaco"></div>
        <div id="div_conteudo_curiosidades" class="conteudo">
            <div id=div_titulo_curiosidades>
                <h3>curiosidades</h3>
            </div>
            <div id="conteudo_curiosidades">

                <?php
                    $sql = "SELECT * from tbl_curiosidades WHERE situacao_curiosidades = 'atv'";

                    $select = mysqli_query($conexao, $sql);

                    while($rs = mysqli_fetch_array($select)){
                ?>

                <div class="div_container_curiosidades">
                    <div class="div_imagem_curiosidades">
                        <img src="cms/bd/arquivos/<?= $rs["img_curiosidades"];?>" alt="">
                    </div>
                    <div class="div_conteudo_texto_curiosidades">
                        <div class="div_titulo_curiosidades">
                            <?= $rs["titulo_curiosidades"];?>
                        </div>
                        <div class="div_subtitulo_curiosidades">
                            <?= $rs["subtitulo_curiosidades"];?>    
                        </div>
                        <div class="div_texto_curiosidades">
                            <?= $rs["texto_curiosidades"];?>
                        </div>
                    </div>
                </div>
                <?php

                        }

                    ?>
                <!-- <div class="div_container_curiosidades">
                    <div class="div_imagem_curiosidades">
                        
                        <img src="imagens/curiosidades/pomar.png" alt="">
                    </div>
                    <div class="div_conteudo_texto_curiosidades">
                        <div class="div_titulo_curiosidades">
                            frutas
                        </div>
                        <div class="div_subtitulo_curiosidades">
                            Publicado dia 18/09 às 16:35h – categoria saúde.
                        </div>
                        <div class="div_texto_curiosidades">
                        Todas as nossas frutas são orgânicas, não usamos nenhum tipo de agrotóxico em nossas plantações, todas as nossas frutas são selecionadas, nós como uma empresa alimentícia presamos muito pela qualidade dos produtos que oferecemos para nossos clientes e amigos.
                        </div>
                    </div>
                </div>
                <div class="div_container_curiosidades">
                    <div class="div_imagem_curiosidades">
                        <img src="imagens/curiosidades/canudos.png" alt="">
                    </div>
                    <div class="div_conteudo_texto_curiosidades">
                        <div class="div_titulo_curiosidades">
                            canudos
                        </div>
                        <div class="div_subtitulo_curiosidades">
                            Publicado dia 15/09 às 10:00h – categoria sustentabilidade.
                        </div>
                        <div class="div_texto_curiosidades">
                            Todos os nossos canudos são de papel e 100% biodegradáveis, nos como uma empresa presamos pelo meio ambiente e tentamos ao máximo diminuir os danos que causamos com os nossos produtos e serviços.
                        </div>
                    </div>
                </div> -->
                
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
    </body>
</html>