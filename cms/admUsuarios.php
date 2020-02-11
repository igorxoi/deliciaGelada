<?php

    session_start();

    require_once('../bd/conexao.php');
    $conexao = conexaoMysql();

    $botao = (string) "Enviar";
    $idNivelEditar = (int) null;


    if(isset($_GET['modo'])){
    
        if($_GET['modo'] == "editar"){
            
            $id = $_GET['id'];
    
            $_SESSION['id'] = $id;
            
            $sql = "select u.*, n.nome_nivel from tbl_usuarios u inner join tbl_niveis n on u.id_nivel = n.id_nivel where u.id_usuario =".$id."";            
    
            //Existem tres formas de converter o resultado do select em um formato que o php consiga maninpular
            $select = mysqli_query($conexao, $sql);
    
            //Converte os dados do banco em array
            if($rs = mysqli_fetch_array($select)){
                $nomeUsuarioEditar = $rs['nome_usuario'];
                $emailUsuarioEditar = $rs['email_usuario'];
                $senhaUsuarioEditar = $rs['senha_usuario'];
                $nivelUsuarioEditar = $rs['nome_nivel'];
                $idNivelEditar = $rs['id_nivel'];
                
                $botao = "Editar";

                echo($sql);

            }
            
        }elseif($_GET['modo'] == "situacao"){
            if($_GET['situacao'] == 'atv'){
                $codigo = $_GET['id'];

                $sql = "UPDATE tbl_usuarios SET situacao_usuarios = 'des' WHERE id_usuario=".$codigo;

                echo($sql);  
                mysqli_query($conexao, $sql);

            }elseif($_GET['situacao'] == 'des'){
                $codigo = $_GET['id'];

                $sql = "UPDATE tbl_usuarios SET situacao_usuarios = 'atv' WHERE id_usuario=".$codigo;

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
                <h5>administração de usuários</h5>   
            </div>
            <form action="bd/inserirUsuario.php" method="post" >
                <div class="div_inputs_cadastrar_usuarios">
                    <div id="div_criar_nome_usuario">
                        Nome usuário:<input type="text" id="txtNomeCriacaoUsuario" name="txtNomeCriacaoUsuario" value="<?= isset($nomeUsuarioEditar) ? $nomeUsuarioEditar : '';?>">
                    </div>
                    <div id="div_criar_email_usuario">
                        E-mail usuário:<input type="text" id="txtEmailCriacaoUsuario" name="txtEmailCriacaoUsuario" value="<?= isset($emailUsuarioEditar) ? $emailUsuarioEditar : '';?>">
                    </div>               
                </div>
                <div class="div_inputs_cadastrar_usuarios">
                    <div id="div_criar_senha_usuario">
                        Digite senha:<input type="password" id="txtSenhaCriacaoUsuario" name="txtSenhaCriacaoUsuario" value="<?= isset($senhaUsuarioEditar) ? $senhaUsuarioEditar : '';?>">
                    </div> 
                    <div id="div_criar_confirme_senha_usuario">
                        Confirme a senha:<input type="password" id="txtConfSenhaCriacaoUsuario" name="txtConfSenhaCriacaoUsuario" value="<?= isset($senhaUsuarioEditar) ? $senhaUsuarioEditar : '';?>">
                    </div> 
                </div>
                <div class="div_inputs_cadastrar_usuarios">
                    <div id="div_select_niveis">
                        Selecione um nivel:
                        <select name="slc_niveis_cadastro_usuario" id="slc_niveis_cadastro_usuario">
                            <?php if($_GET['modo'] == "editar"){?>
                                <option selected value="<?=$idNivelEditar?>"><?=$nivelUsuarioEditar?></option> 
                                
                                <?php }else{ ?>
                                    <option selected value="" > Selecione uma opcão </option> 
                                <?php
                                    }
                                    // $sql = "select * from tbl_niveis";
                                    $sqlEditarEstados = "select * from tbl_niveis where id_nivel <>".$idNivelEditar;

                                    $select = mysqli_query($conexao, $sqlEditarEstados);
                                
                                    echo($sqlEditarEstados);
                                    while($rsNivel = mysqli_fetch_array($select)){                                       
                            ?>
                                <option value="<?=$rsNivel['id_nivel']?>"> <?=$rsNivel['nome_nivel']?> </option>
                            <?php
                                }
                            
                            ?>
                        </select>
                    </div> 
                    <div id="div_inputs_cadastrar_usuarios_btn_submit">
                        <input type="submit" value="<?=$botao?>" name="btnCadastrarUsuario" id="btnCadastrarUsuario">   
                    </div> 
                </div>
            </form>
            <table>
                <thead>
                    <tr id="td_cabecalho_niveis">
                        <th>Nome do usuário</th>
                        <th>E-mail</th>
                        <th>Nível cadastrado</th>    
                        <th>Opções</th>                        
                    </tr>

                    <?php
                        $sql = "select u.nome_usuario, u.id_usuario, u.situacao_usuarios, u.email_usuario, n.nome_nivel from tbl_usuarios u INNER JOIN tbl_niveis n ON u.id_nivel = n.id_nivel";

                        $select = mysqli_query($conexao, $sql);

                        while($rs = mysqli_fetch_array($select)){
                    ?>

                        <tr id="td_linha_niveis">
                            <th><?= $rs["nome_usuario"];?></th>
                            <th><?= $rs["email_usuario"];?></th>
                            <th><?= $rs["nome_nivel"];?></th>
                            <th>                                
                                <a href="admUsuarios.php?modo=editar&id=<?=$rs['id_usuario'];?>">
                                    <img src="imagens/icons/editPreto.png" alt="">
                                </a>  
                                <a onclick="return confirm('Deseja realmente excluir esse usuário ?');" href="bd/deletarUsuario.php?modo=excluir&id=<?=$rs['id_usuario'];?>">
                                    <img src="imagens/icons/deletePreto.png" alt="">
                                </a> 
                                <a href="admUsuarios.php?modo=situacao&id=<?=$rs['id_usuario'];?>&situacao=<?=$rs['situacao_usuarios'];?>">
                                    <?php 
                                        if($rs['situacao_usuarios'] == "atv"){
                                    ?>
                                        <img src="imagens/icons/ativado.png" alt="">                 

                                    <?php 
                                        }elseif($rs['situacao_usuarios'] == "des"){
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