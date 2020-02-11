<?php

    $botao = (string) "Enviar";
    $nomeFoto = (string)  "";
    session_start();

    require_once('../bd/conexao.php');
    $conexao = conexaoMysql();

    if(isset($_GET['modo'])){
        if($_GET['modo'] == "editar"){
            $codigo = $_GET['codigo'];            
            
            $_SESSION['id'] = $codigo;
            
            $sql = "select * from tbl_curiosidades where id_curiosidades=".$codigo;

            echo($sql);
            
            $select = mysqli_query($conexao, $sql);

            if($rs = mysqli_fetch_array($select)){
                $nomeFoto = $rs['img_curiosidades'];
                $tituloCuriosidades = $rs['titulo_curiosidades'];
                $subtituloCuriosidades = $rs['subtitulo_curiosidades'];
                $textoCuriosidades = $rs['texto_curiosidades'];
                
                $_SESSION['foto'] = $nomeFoto;
                
                $botao = "Editar";
            }

        }elseif($_GET['modo'] == "situacao"){
            if($_GET['situacao'] == 'atv'){
                $codigo = $_GET['id'];

                $sql = "UPDATE tbl_curiosidades SET situacao_curiosidades = 'des' WHERE id_curiosidades=".$codigo;

                echo($sql);  
                mysqli_query($conexao, $sql);

            }elseif($_GET['situacao'] == 'des'){
                $codigo = $_GET['id'];

                $sql = "UPDATE tbl_curiosidades SET situacao_curiosidades = 'atv' WHERE id_curiosidades=".$codigo;

                echo($sql);
                mysqli_query($conexao, $sql);
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
        <script src="js/jquery.form.js"></script>
        <link rel="shortcut icon" href="../imagens/fav_icon.png"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <script>
            $('#idFleImagemCuriosidades').live('change', function(){
                $('#idFrmImagemEdicaoCuriosidades').ajaxForm({
                    target: '#div_container_imagem_curiosidades'
                }).submit();
            });
            
        </script>

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
        <div id="div_edicao_conteudo_curiosidades" class="conteudo">
            <div id="div_titulo_tabela">
                <h5>edição página curiosidades</h5>   
            </div>
            <div id="div_edicao_pagina_curiosidades">
                <form action="bd/uploadAjax.php" method="post" enctype="multipart/form-data" id="idFrmImagemEdicaoCuriosidades" name="frmImagemEdicaoCuriosidades">
                    <div id="div_titulo_edicao_imagem">
                        <h1>escolha uma imagem:</h1>
                    </div>
                    <div id="div_input_imagem_curiosidades">
                        <input type="file" name="fleImagemCuriosidades" id="idFleImagemCuriosidades">
                    </div>
                </form>

                <div id="div_container_imagem_curiosidades">
                    <img class="imgFoto" id="fotoEdicaoConteudo" src="bd/arquivos/<?=$nomeFoto;?>">
                </div>
                
            </div>
            <form method="post" action="bd/inserirEdicaoCuriosidades.php" name="frmDadosEdicaoCuriosidades">
                <div id="div_edicao_titulo_subtitulo_curiosidades">
                    <div id="div_edicao_curiosidades_titulo">
                        <div id="div_titulo_edicao_titulo">
                            <h1>digite um titulo:</h1>
                        </div>
                        <div id="div_iput_edicao_titulo">
                            <input type="text" value="<?= isset($tituloCuriosidades) ? $tituloCuriosidades : '';?>" class="inputsEdicao" maxlength="55" name="txtEdicaoTitulo">
                        </div>
                    </div>
                    <div id="div_edicao_curiosidades_subtitulo">
                        <div id="div_titulo_edicao_subtitulo">
                            <h1>digite um subtitulo:</h1>
                        </div>
                        <div id="div_iput_edicao_subtitulo">
                            <input type="text" value="<?= isset($subtituloCuriosidades) ? $subtituloCuriosidades : '';?>" class="inputsEdicao" maxlength="85" name="txtEdicaoSubtitulo">
                        </div>
                    </div>
                    <div id="div_edicao_curiosidades_texto">
                        <div id="div_titulo_edicao_texto">
                            <h1>digite um texto:</h1>
                        </div>
                        <div id="div_iput_edicao_texto">
                            <textarea  name="txtIntroducaoSobre" maxlength="340">
                                <?= isset($textoCuriosidades) ? $textoCuriosidades : '';?>
                            </textarea>
                        </div>                    
                    </div>
                </div>
                <div id="div_btn_edicao_curiosidades">
                    <input type="submit" value="<?=$botao?>" name="btnEdicaoCuriosidades">
                </div>
            </form>  
            <table>
                <thead>
                    <tr id="td_cabecalho_edicao_curiosidades">
                        <th>imagem</th>
                        <th>titulo curiosidades</th>    
                        <th>subtitulo curiosidades</th>   
                        <th>texto curiosidades</th>                        
                        <th>opções</th>   
                    </tr>

                    <?php

                        $sql = "SELECT * from tbl_curiosidades";

                        $select = mysqli_query($conexao, $sql);

                        while($rs = mysqli_fetch_array($select)){
                    ?>

                    <tr id="td_linha_edicao_curiosidades">
                        <th id="coluna_imagem_curiosidades">
                            <img src="bd/arquivos/<?= $rs["img_curiosidades"];?>" alt="">
                        </th>
                        <th id="coluna_curiosidades_titulo">
                            <?= $rs["titulo_curiosidades"];?>
                        </th>
                        <th id="coluna_curiosidades_subtitulo">
                            <?= $rs["subtitulo_curiosidades"];?>
                        </th>
                        <th id="coluna_curiosidades_texto">
                            <?= $rs["texto_curiosidades"];?>
                        </th>
                        <th id="coluna_curiosidades_opcoes">                                
                            <a href="edicaoCuriosidades.php?modo=editar&codigo=<?=$rs['id_curiosidades'];?>">
                                <img src="imagens/icons/editPreto.png" alt="">
                            </a>  
                            <a onclick="return confirm('Deseja realmente excluir o registro ?');" href="bd/deletarCuriosidades.php?modo=excluir&codigo=<?=$rs['id_curiosidades'];?>&nomeFoto=<?=$rs['img_curiosidades'];?>">
                                <img src="imagens/icons/deletePreto.png" alt="">
                            </a> 
                            <a href="edicaoCuriosidades.php?modo=situacao&id=<?=$rs['id_curiosidades'];?>&situacao=<?=$rs['situacao_curiosidades'];?>">
                                <?php 
                                    if($rs['situacao_curiosidades'] == "atv"){
                                ?>
                                    <img src="imagens/icons/ativado_cheio.png" alt="">                 

                                <?php 
                                    }elseif($rs['situacao_curiosidades'] == "des"){
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
        </div>
        <!-- RODAPÉ -->
        <div id="div_rodape" class="conteudo">
            <h3>Desenvolvidado por: Igor Xavier</h3>
        </div>
    </body>
</html>