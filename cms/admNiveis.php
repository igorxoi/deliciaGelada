<?php

    $botao = (string) "Enviar";

    session_start();

    require_once('../bd/conexao.php');

    $conexao = conexaoMysql();

    if(isset($_GET['modo'])){
        if($_GET['modo'] == "editar"){
            $id = $_GET['id'];

            $_SESSION['id'] = $id;
            
            $sql = "select * from tbl_niveis where id_nivel=".$id;
            echo($sql);
            $select = mysqli_query($conexao, $sql);

            if($rs = mysqli_fetch_array($select)){
                $nomeEditar = $rs['nome_nivel'];
                $admUsuarioEditar = $rs['adm_usuario'];
                $admContatoEditar = $rs['adm_contato'];
                $admConteudoEditar = $rs['adm_conteudo'];

                $botao = "Editar";
            }

        }elseif($_GET['modo'] == "situacao"){
            if($_GET['situacao'] == 'atv'){
                $codigo = $_GET['id'];

                $sql = "UPDATE tbl_niveis SET situacao_nivel = 'des' WHERE id_nivel=".$codigo;
                
            }elseif($_GET['situacao'] == 'des'){
                $codigo = $_GET['id'];

                $sql = "UPDATE tbl_niveis SET situacao_nivel = 'atv' WHERE id_nivel=".$codigo;

            }

            mysqli_query($conexao, $sql);
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
        <div id="div_conteudo_adm_conteudo_usuarios" class="conteudo">
            <div id="div_titulo_tabela">
                <h5>administração de níveis</h5>   
            </div>
            <form action="bd/inserirNivel.php" method="get" name="">
                <div class="div_inputs_cadastrar_niveis">
                    <div id="div_criar_nome_nivel">
                        Nome usuário:<input type="text" maxlength="50" id="txtCategoriaNomeUsuario" name="txtCategoriaNomeUsuario" value="<?= isset($nomeEditar) ? $nomeEditar : '';?>">
                    </div>              
                </div>
                <div class="div_inputs_cadastrar_niveis">
                    <div id="div_criar_tipo_nivel">
                        <div class="div_radio_selecao_tipo">
                            <input type="checkbox" value="true" <?=isset($admConteudoEditar) && $admConteudoEditar == true ? 'checked' : '';?> name="rdoNivelOperadorDeConteudo">
                        </div>
                        <div class="div_nome_radio_selecao_tipo" value="" id="div_nome_radio_selecao_operador_conteudo">
                            Nível operador conteúdo
                        </div>
                        <div class="div_radio_selecao_tipo" >
                            <input type="checkbox" value="true" <?=isset($admUsuarioEditar) && $admUsuarioEditar == true ? 'checked' : '';?> name="rdoNivelAdministrador">
                        </div>
                        <div class="div_nome_radio_selecao_tipo" id="div_nome_radio_selecao_administrador">
                            Nível administrador
                        </div>
                        <div class="div_radio_selecao_tipo">
                            <input type="checkbox" value="true" <?=isset($admContatoEditar) && $admContatoEditar == true ? 'checked' : '';?> name="rdoNivelRelacionamentoCliente">
                        </div>
                        <div class="div_nome_radio_selecao_tipo">
                            Nível relacionamento com cliente
                        </div>                        
                    </div>                                                    
                </div>
                <div id="div_inputs_cadastrar_niveis">
                    <input type="submit" value="<?=$botao?>" id="btnCadastrarNivel" name="btnCadastrarNivel">
                </div>
            </form>
            <table>
                <thead>
                    <tr id="td_cabecalho_niveis">
                        <th>Nome do nível</th>
                        <th>Permissões do nível</th>
                        <th>Opções</th>
                    </tr>

                    <?php
                        require_once('../bd/conexao.php');

                        $conexao = conexaoMysql();

                        $sql = "select * from tbl_niveis";

                        $select = mysqli_query($conexao, $sql);

                        while($rs = mysqli_fetch_array($select)){

                            if($rs["adm_usuario"] == 1){
                                $admUsuario = "Nível administrador"."<br>";
                            }else{
                                $admUsuario = "";
                            }

                            if($rs["adm_contato"] == 1){
                                $admContato = "Relacionamento com o cliente"."<br>";
                            }else{
                                $admContato = "";
                            }

                            if($rs["adm_conteudo"] == 1){
                                $admConteudo = "Nível operador de conteúdo"."<br>";
                            }else{
                                $admConteudo = "";
                            }
                    ?>

                        <tr id="td_linha_niveis">
                            <th><?= $rs["nome_nivel"];?></th>
                            <th><?=$admUsuario,$admContato,$admConteudo?></th>
                            <th>                                
                                <a href="admNiveis.php?modo=editar&id=<?=$rs['id_nivel'];?>">
                                    <img src="imagens/icons/editPreto.png" alt="">
                                </a>  
                                <a onclick="return confirm('Deseja realmente excluir essa mensagem ?');" 
                                href="bd/deletarNivel.php?modo=excluir&id=<?=$rs['id_nivel'];?>">
                                    <img src="imagens/icons/deletePreto.png" alt="">
                                </a> 
                                <a href="admNiveis.php?modo=situacao&id=<?=$rs['id_nivel'];?>&situacao=<?=$rs['situacao_nivel'];?>">
                                    <?php 
                                        if($rs['situacao_nivel'] == "atv"){
                                    ?>
                                        <img src="imagens/icons/ativado.png" alt="">                 

                                    <?php 
                                        }elseif($rs['situacao_nivel'] == "des"){
                                    ?>
                                        <img src="imagens/icons/desativado.png" alt="">

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