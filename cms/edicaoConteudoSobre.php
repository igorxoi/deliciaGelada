<?php

    $botao = (string) "Enviar";
    session_start();

    require_once('../bd/conexao.php');
    $conexao = conexaoMysql();

    if(isset($_GET['modo'])){
        if($_GET['modo'] == "editar"){
            $codigo = $_GET['codigo'];            
            
            $_SESSION['idConteudoEdicao'] = $codigo;
            
            $sql = "select * from tbl_sobre_conteudo where id_conteudo_sobre=".$codigo;

            echo($sql);
            
            $select = mysqli_query($conexao, $sql);

            if($rs = mysqli_fetch_array($select)){
                $nomeFoto = $rs['img_conteudo_sobre'];
                $textoConteudoSobre = $rs['texto_conteudo_sobre'];
                
                $_SESSION['fotoConteudoSobre'] = $nomeFoto;
                
                $botao = "Editar";
            }

            
        }elseif($_GET['modo'] == "situacao"){

            $sql = "select id_conteudo_sobre from tbl_sobre_conteudo where situacao_sobre_conteudo = 'atv'";
            
            $select = mysqli_query($conexao, $sql);

            echo($sql);

            if($rs = mysqli_fetch_array($select)){
                $fotoVisivel = $rs['id_conteudo_sobre'];
            }

            if($_GET['situacao'] == 'atv'){
                $codigo = $_GET['id'];

                $sql = "UPDATE tbl_sobre_conteudo SET situacao_sobre_conteudo = 'des' WHERE id_conteudo_sobre=".$codigo;
                mysqli_query($conexao, $sql);
                echo($sql);  

            }elseif($_GET['situacao'] == 'des'){
                $codigo = $_GET['id'];

                $sql = "UPDATE tbl_sobre_conteudo SET situacao_sobre_conteudo = 'atv' WHERE id_conteudo_sobre=".$codigo;
                echo($sql);
                mysqli_query($conexao, $sql);

                @$sqlDes = "UPDATE tbl_sobre_conteudo SET situacao_sobre_conteudo = 'des' WHERE id_conteudo_sobre=".$fotoVisivel;
                mysqli_query($conexao, $sqlDes);
            }
            
        }elseif($_GET['modo'] == "situacaoPers"){

            $sql = "select id_sobre_perspectiva from tbl_sobre_perspectiva where situacao_sobre_perspectiva = 'atv';";
            
            $select = mysqli_query($conexao, $sql);

            echo($sql);

            if($rs = mysqli_fetch_array($select)){
                $iconesVisivel = $rs['id_sobre_perspectiva'];
            }

            if($_GET['situacao'] == 'atv'){
                $codigo = $_GET['id'];

                $sql = "UPDATE tbl_sobre_perspectiva SET situacao_sobre_perspectiva = 'des' WHERE id_sobre_perspectiva=".$codigo;
                mysqli_query($conexao, $sql);
                echo($sql);  

            }elseif($_GET['situacao'] == 'des'){
                $codigo = $_GET['id'];

                $sql = "UPDATE tbl_sobre_perspectiva SET situacao_sobre_perspectiva =  'atv' WHERE id_sobre_perspectiva=".$codigo;
                echo($sql);
                mysqli_query($conexao, $sql);

                @$sqlDes = "UPDATE tbl_sobre_perspectiva SET situacao_sobre_perspectiva = 'des' WHERE id_sobre_perspectiva=".$iconesVisivel;
                mysqli_query($conexao, $sqlDes);
            }
            
        }
    }
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
        <div id="div_edicao_conteudo_sobre" class="conteudo">
            <div id="div_titulo_tabela">
                <h5>edição página sobre</h5>   
            </div>
            <form action="bd/inserirEdicaoConteudoSobre.php" method="post" enctype="multipart/form-data">
                <div id="div_edicao_pagina_sobre">
                    <div id="div_edicao_texto_sobre">
                        <div class="div_titulo_area_edicao_conteudo_sobre">
                            <h3>texto introdução</h3>
                        </div>
                        <div id="div_input_text_area_conteudo_sobre">
                            <textarea name="txtIntroducaoSobre" maxlength="520">
                                <?= isset($textoConteudoSobre) ? $textoConteudoSobre : '';?>
                            </textarea>
                        </div>
                    </div>
                    <div id="div_edicao_imagem_sobre">
                        <div class="div_titulo_area_edicao_conteudo_sobre">
                            <h3>imagem introdução</h3>
                        </div>
                        <div id="div_input_img_conteudo_sobre">
                            <input type="file" name="fleImagemIntroducaoSobre">
                        </div>
                    </div>                
                </div>  
                <div id="div_btn_submit_edicao_conteudo_sobre">
                    <input type="submit" name="btnEdicaoIntroducaoSobre" value="<?=$botao?>">
                </div>      
            </form>
            <table>
                <thead>
                    <tr id="td_cabecalho_edicao_introducao_sobre">
                        <th>imagem</th>
                        <th>texto da imagem</th>    
                        <th>Opções</th>                        
                    </tr>

                    <?php

                        $sql = "SELECT * from tbl_sobre_conteudo";

                        $select = mysqli_query($conexao, $sql);

                        while($rs = mysqli_fetch_array($select)){
                    ?>

                    <tr id="td_linha_edicao_introducao_sobre">
                        <th id="coluna_imagem_introducao_sobre">
                            <img src="bd/arquivos/<?= $rs["img_conteudo_sobre"];?>" alt="">
                        </th>
                        <th id="coluna_texto_introducao_sobre">
                            <?= $rs["texto_conteudo_sobre"];?></th>
                        <th>                                
                            <a href="edicaoConteudoSobre.php?modo=editar&codigo=<?=$rs['id_conteudo_sobre'];?>">
                                <img src="imagens/icons/editPreto.png" alt="">
                            </a>  
                            <a onclick="return confirm('Deseja realmente excluir o registro ?');" href="bd/deletarConteudoSobre.php?modo=excluir&codigo=<?=$rs['id_conteudo_sobre'];?>&nomeFoto=<?=$rs['img_conteudo_sobre'];?>">
                                <img src="imagens/icons/deletePreto.png" alt="">
                            </a> 
                            <a href="edicaoConteudoSobre.php?modo=situacao&id=<?=$rs['id_conteudo_sobre'];?>&situacao=<?=$rs['situacao_sobre_conteudo'];?>">
                                    <?php 
                                        if($rs['situacao_sobre_conteudo'] == "atv"){
                                    ?>
                                        <img src="imagens/icons/ativado_cheio.png" alt="">                 

                                    <?php 
                                        }elseif($rs['situacao_sobre_conteudo'] == "des"){
                                    ?>
                                        <img src="imagens/icons/desativado_cheio.png" alt="">

                                    <?php 
                                        }
                                    ?>
                                </a> 
                        </th>           
                    </tr>

                    <?php

                        }

                    ?>

                </thead>
            </table>   
            <div id="div_titulo_tabela_perspectiva">
                <h5>edição página sobre perspectiva</h5>   
            </div>
            <form action="bd/inserirEdicaoConteudoSobrePerspectiva.php" method="post" enctype="multipart/form-data">
                <div id="div_edicao_pagina_sobre_perspectiva">
                    <div class="div_edicao_icones_sobre_perspectiva">
                        <div class="div_input_img_conteudo_sobre_perspectiva">
                            <input type="file" name="fleImagemPerspectiva1">
                        </div>
                        <div class="div_icone_sobre_perspectiva">

                        </div>
                        <div class="div_titulo_icone_sobre_perspectiva">
                            <input type="text" name="txtperspectiva1" maxlength='25' placeholder="Digite o titulo">
                        </div>
                        <div class="div_texto_icone_sobre_perspectiva">
                            <textarea name="textArea_icone1" maxlength='250'>

                            </textarea>
                        </div>
                    </div>
                    <div class="div_edicao_icones_sobre_perspectiva">
                        <div class="div_input_img_conteudo_sobre_perspectiva">
                            <input type="file" name="fleImagemPerspectiva2">
                        </div>
                        <div class="div_icone_sobre_perspectiva">

                        </div>
                        <div class="div_titulo_icone_sobre_perspectiva">
                            <input type="text" name="txtperspectiva2" maxlength='25' placeholder="Digite o titulo">
                        </div>
                        <div class="div_texto_icone_sobre_perspectiva">
                            <textarea name="textArea_icone2" maxlength='250'>

                            </textarea>
                        </div>
                    </div>
                    <div class="div_edicao_icones_sobre_perspectiva">
                        <div class="div_input_img_conteudo_sobre_perspectiva">
                            <input type="file" name="fleImagemPerspectiva3">
                        </div>
                        <div class="div_icone_sobre_perspectiva">

                        </div>
                        <div class="div_titulo_icone_sobre_perspectiva">
                            <input type="text" name="txtperspectiva3" maxlength='25' placeholder="Digite o titulo">
                        </div>
                        <div class="div_texto_icone_sobre_perspectiva">
                            <textarea name="textArea_icone3" maxlength='250' >

                            </textarea>
                        </div>
                    </div>
                      
                               
                </div>  
                <div id="div_btn_submit_edicao_conteudo_sobre_perspectiva">
                    <input type="submit" name="btnEdicaoPerspectivaSobre" value="<?=$botao?>">
                </div> 
                <table>
                    <thead>
                        <tr id="td_cabecalho_edicao_perspectiva_sobre">
                            <th>imagem 01</th>
                            <th>titulo 01</th>    
                            <th>texto 01</th>
                            <th>imagem 02</th>
                            <th>titulo 02</th>    
                            <th>texto 02</th>    
                            <th>imagem 03</th>
                            <th>titulo 03</th>    
                            <th>texto 03</th> 
                            <th>opções</th>                              
                        </tr>

                        <?php

                            $sql = "SELECT * from tbl_sobre_perspectiva";

                            $select = mysqli_query($conexao, $sql);

                            while($rs = mysqli_fetch_array($select)){
                        ?>

                        <tr id="td_linha_edicao_perspectiva_sobre">
                            <th id="td_linha_edicao_imagem_01_perspectiva_sobre">
                                <img src="bd/arquivos/<?= $rs["imagem1_perspectiva"];?>" alt="">
                            </th>
                            <th>
                                <?= $rs["titulo1_perspectiva"];?>
                            </th>
                            <th>
                                <?= $rs["texto1_perspectiva"];?>
                            </th>
                            <th id="td_linha_edicao_imagem_02_perspectiva_sobre">
                                <img src="bd/arquivos/<?= $rs["imagem2_perspectiva"];?>" alt="">
                            </th>
                            <th>
                                <?= $rs["titulo2_perspectiva"];?>
                            </th>
                            <th>
                                <?= $rs["texto2_perspectiva"];?>
                            </th>
                            <th id="td_linha_edicao_imagem_03_perspectiva_sobre">
                                <img src="bd/arquivos/<?= $rs["imagem3_perspectiva"];?>" alt="">
                            </th>
                            <th>
                                <?= $rs["titulo3_perspectiva"];?>
                            </th>
                            <th>
                                <?= $rs["texto3_perspectiva"];?>
                            </th>
                            <th> 
                                <a href="edicaoConteudoSobre.php?modo=editar&codigo=<?=$rs['id_sobre_perspectiva'];?>">
                                    <img src="imagens/icons/editPreto.png" alt="">
                                </a>  
                                <a onclick="return confirm('Deseja realmente excluir o registro ?');" href="bd/deletarConteudoPerspectiva.php?modo=excluir&codigo=<?=$rs['id_sobre_perspectiva'];?>&nomeFoto1=<?=$rs['imagem1_perspectiva'];?>&nomeFoto2=<?=$rs['imagem2_perspectiva'];?>&nomeFoto3=<?=$rs['imagem3_perspectiva'];?>">
                                    <img src="imagens/icons/deletePreto.png" alt="">
                                </a> 
                                <a href="edicaoConteudoSobre.php?modo=situacaoPers&id=<?=$rs['id_sobre_perspectiva'];?>&situacao=<?=$rs['situacao_sobre_perspectiva'];?>">
                                    <?php 
                                        if($rs['situacao_sobre_perspectiva'] == "atv"){
                                    ?>
                                        <img src="imagens/icons/ativado_cheio.png" alt="">                 

                                    <?php 
                                        }elseif($rs['situacao_sobre_perspectiva'] == "des"){
                                    ?>
                                        <img src="imagens/icons/desativado_cheio.png" alt="">

                                    <?php 
                                        }
                                    ?>
                                </a> 
                            </th>           
                        </tr>

                    <?php

                        }

                    ?>

                    </thead>
                </table>      
            </form>

        </div>
        <!-- RODAPÉ -->
        <div id="div_rodape" class="conteudo">
            <h3>Desenvolvidado por: Igor Xavier</h3>
        </div>
    </body>
</html>