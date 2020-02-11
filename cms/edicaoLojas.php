<?php

    $botaoEstados = (string) "Enviar";
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
            if($_GET['situacao'] == 'atv'){
                $codigo = $_GET['id'];

                $sql = "UPDATE tbl_loja SET situacao_loja = 'des' WHERE id_loja=".$codigo;

                echo($sql);  
                mysqli_query($conexao, $sql);

            }elseif($_GET['situacao'] == 'des'){
                $codigo = $_GET['id'];

                $sql = "UPDATE tbl_loja SET situacao_loja = 'atv' WHERE id_loja=".$codigo;

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


        <script>

            jQuery(document).ready(function() {
                $('.vizualizar').click(function () {
                    $('#containerLojas').fadeIn(1000);                    

                });

                $('#fechar').click(function () {
                    $('#containerLojas').fadeOut(1000);
                });
                
            });          
            
            
            // function vizualizarFaleConosco(idMensagem){
            //     $.ajax(o

            //         type: "POST",
            //         url: "bd/modalContatos.php",
            //         data: {modo:'visualizar', codigo:idMensagem},
            //         sucess: function(dados){
            //             $('#textareaMensagemModal').html(dados);
            //         }
                 
            //     });
            // }
            
                        
            
        </script>

    </head>
    <body>
        <!-- MODAL -->
        <div id="containerLojas">
            <div id="modalLojas">
                <div id="btn_fechar_modal_contatos">
                    <a href="#" id="fechar">
                        <img src="imagens/icons/fechar.png" alt="">
                    </a>
                </div>
                    <div id="div_form_criacao_estados">
                        <form action="bd/inserirEstado.php" method="GET">
                            <div id="div_titulo_nome_criacao_estado">
                                <h3>digite o nome do estado:</h3>
                            </div>
                            <div id="div_input_nome_criacao_estado">
                                <input type="text" name="txtNomeEstado">
                            </div>
                            <div id="div_submit_criacao_estado">
                                <input type="submit" value="<?=$botaoEstados?>" name="btnCriacaoEstado">
                            </div>
                        </form>
                    </div>
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
                <h5>edição nossas lojas</h5>   
            </div>
            <div id="div_btn_criar_estado">
                <a href="#" class="vizualizar" onclick="visualizarFaleConosco(<?=$rs['codigo'];?>);">
                    <div id="div_btn_criar_estado">
                        <h1>crie um estado</h1>
                    </div>                    
                </a> 
            </div>
            <div id="div_criar_lojas">
                <form action="bd/inserirLoja.php" method="post">
                    <div class="tituloInputLoja">
                        <h1>Endereço:</h1>
                        <div class="div_inputs_criacao_loja">
                            <input type="text" name="txtEnderecoLoja">
                        </div>
                    </div>
                    
                    <div class="tituloInputLoja">
                        <h1>Número:</h1>
                        <div class="div_inputs_criacao_loja">
                            <input type="text" name="txtNumeroLoja">
                        </div>
                    </div>
                    <div class="tituloInputLoja">
                        <h1>Telefone:</h1>
                        <div class="div_inputs_criacao_loja">
                            <input type="text" name="txtTelefoneLoja">
                        </div>
                    </div>
                    <div class="tituloInputLoja">
                        <h1>Funcionamento:</h1>
                        <div class="div_inputs_criacao_loja">
                            <input type="text" name="txtFuncionamentoLoja">
                        </div>
                    </div>
                    <div class="tituloInputLoja">
                        <h1>Selecione um estado:</h1>
                        <select name="sltEstadosLoja" id="idSltEstadosLoja">
                            <option value="9"> Acre </option>
                            <option value="35"> Alagoas </option>
                            <option value="10"> Amapá</option>
                            <option value="11"> Amazonas</option>
                            <option value="12"> Bahia</option>
                            <option value="13"> Ceará</option>
                            <option value="14"> Distrito Federal</option>
                            <option value="15"> Espírito Santo</option>
                            <option value="16"> Goiás</option>
                            <option value="17"> Maranhão</option>
                            <option value="18"> Mato Grosso</option>
                            <option value="29"> Mato Grosso do Sul</option>
                            <option value="20"> Minas Gerais</option>
                            <option value="21"> Pará</option>
                            <option value="22"> Paraíba</option>
                            <option value="23"> Paraná </option>
                            <option value="24"> Pernambuco</option>
                            <option value="25"> Piauí </option>
                            <option value="26"> Rio de Janeiro</option>
                            <option value="27"> Rio Grande do Norte </option>
                            <option value="28"> Rio Grande do Sul</option>
                            <option value="29"> Rondônia</option>
                            <option value="30"> Roraima</option>
                            <option value="31"> Santa Catarina </option>
                            <option value="32"> São Paulo</option>
                            <option value="33"> Sergipe</option>
                            <option value="34"> Tocantins</option>
                        </select>
                    </div>
                    <div id="btnSubmitCriacaoLoja" class="tituloInputLoja">
                        <input type="submit" name="btnCriacaoLoja">                    
                    </div>
                </form>
            </div>
            <table>
                <thead>
                    <tr id="td_cabecalho_niveis">
                        <th>Nº loja</th>
                        <th>Endereço</th>
                        <th>telefone</th>    
                        <th>funcionamento</th>
                        <th>estado</th>    
                        <th>opções</th>                            
                    </tr>

                    <?php
                        $sql = "select l.*, e.nome_estado from tbl_loja l INNER JOIN tbl_estados e ON l.id_estado = e.id_estado; ";

                        $select = mysqli_query($conexao, $sql);

                        while($rs = mysqli_fetch_array($select)){
                    ?>

                        <tr id="td_linha_niveis">
                            <th><?= $rs["numero_loja"];?></th>
                            <th><?= $rs["endereco_loja"];?></th>
                            <th><?= $rs["telefone_loja"];?></th>
                            <th><?= $rs["funcionamento_loja"];?></th>
                            <th><?= $rs["nome_estado"];?></th>
                            <th>                                
                                <a href="admUsuarios.php?modo=editar&id=<?=$rs['id_loja'];?>">
                                    <img src="imagens/icons/editPreto.png" alt="">
                                </a>  
                                <a onclick="return confirm('Deseja realmente excluir esse usuário ?');" href="bd/deletarLoja.php?modo=excluir&id=<?=$rs['id_loja'];?>">
                                    <img src="imagens/icons/deletePreto.png" alt="">
                                </a>
                                <a href="admUsuarios.php?modo=situacao&id=<?=$rs['id_loja'];?>&situacao=<?=$rs['situacao_loja'];?>">
                                    <?php 
                                        if($rs['situacao_loja'] == "atv"){
                                    ?>
                                        <img src="imagens/icons/ativado.png" alt="">                 

                                    <?php 
                                        }elseif($rs['situacao_loja'] == "des"){
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