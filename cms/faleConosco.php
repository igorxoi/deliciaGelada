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
        
        
        <script>
            jQuery(document).ready(function() {
                $('.vizualizar').click(function () {
                    $('#container').fadeIn(1000);                    
                });

                $('#fechar').click(function () {
                    $('#container').fadeOut(1000);
                });
                
            });
            
            
            
            function vizualizarFaleConosco(idMensagem){
                $.ajax({
                    type: "POST",
                    url: "bd/modalContatos.php",
                    data: {modo:'visualizar', codigo:idMensagem},
                    sucess: function(dados){
                        $('#textareaMensagemModal').html(dados);
                    }
                 
                });
            }
            
            function visualizarFaleConosco(idItem){
                $.ajax({
                    type: "POST",
                    url: "bd/modalFaleConosco.php",
                    data: {modo:'visualizarFaleConosco', codigo:idItem},
                    success: function(dados){                        
                        $('#conteudoModal').html(dados);
                    }
                });
                    
            }
            
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
        <div id="div_conteudo_fale_conosco" class="conteudo">
            <div id="div_titulo_tabela">
                <h5>Mensagens</h5>
                <form method="get" name="fmrFaleConosco" action="faleConosco.php">
                    <select name="sltOpcao" id="sltOpcaoMensagem" onchange="this.form.submit()">
                        <option value="t" selected>Selecione uma categoria</option>
                        <option value="s">Sugestão</option>
                        <option value="c">Crítica</option>
                    </select>
                </form>  
            </div>
            <table>
                <thead>
                    <tr id="td_cabecalho_contatos">
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Opções</th>
                    </tr>

                    <?php

                        require_once('../bd/conexao.php');

                        $conexao = conexaoMysql();

                        $script = "select * from tbl_contato";                         

                        @$resultado = $_GET["sltOpcao"]; 
                        
                        if(isset($_GET["sltOpcao"])){                                                
                            $script = $script." where sugestao = '".$resultado."'";
                        }
                            $sql = $script. " ORDER BY codigo DESC";
                        
                        // echo($resultado);
                        // echo($sql);

                        $select = mysqli_query($conexao, $sql);
                        

                        while($rs = mysqli_fetch_array($select)){                           
                    
                    ?>
                        <tr id="td_linha_contatos">
                            <th><?= $rs["nome"];?></th>
                            <th><?= $rs["telefone"];?></th>
                            <th><?= $rs["celular"];?></th>
                            <th><?= $rs["email"];?></th>
                            <th>
                                
                                <a href="#" class="vizualizar" onclick="visualizarFaleConosco(<?=$rs['codigo'];?>);">
                                    <img src="imagens/icons/search.png" alt="">
                                </a>  
                                <a onclick="return confirm('Deseja realmente excluir o registro ?');" href="bd/deletarContato.php?modo=excluir&codigo=<?=$rs['codigo'];?>">
                                    <img src="imagens/icons/delete.png" alt="">
                                </a>   
                            </th>                                
                        </tr>

                    <?php
                            
                        }
//                    }

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