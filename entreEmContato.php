<!DOCTYPE html>
<html lang="pt">
    <head>
        <title>Delícia Gelada</title>
        <link rel="shortcut icon" href="imagens/fav_icon.png"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/modulo.js"></script>    
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
       <div id="div_conteudo_contato" class="conteudo">
            <div id="div_titulo_conteudo_contato">
                <h3>entre em contato conosco!</h3>
            </div>
            <div id="div_form_contato">
                <form method="post" name="frmIndexLogin" action="bd/inserirContato.php">
                    <div class="div_dados_contatos">
                        <input type="text" name="txtNomeContato" onkeypress="return validarEntrada(event, 'number')" id="txt_contato_nome" class="txt_dados_contato" placeholder="Nome" value=""><div class="asterisco">*</div>
                    </div>
                    <div class="div_dados_contatos">
                        <input type="text" name="txtTelefoneContato" maxlength="14" onkeypress="mascaraTelefone(this); return validarEntrada(event, 'caracter')"  id="txtTelefoneContato" class="txt_dados_contato" placeholder="Telefone" value="">
                    </div>  
                    <div class="div_dados_contatos">
                        <input type="text" name="txtCelularContato" maxlength="15" onkeypress="mascaraCelular(this); return validarEntrada(event, 'caracter')" id="txtCelularContato" class="txt_dados_contato" placeholder="Celular" value=""><div class="asterisco">*</div>
                    </div>   
                    <div class="div_dados_contatos">
                        <input type="email" name="txtEmailContato" id="txtEmailContato" class="txt_dados_contato" placeholder="E-mail" value=""><div class="asterisco">*</div>
                    </div>  
                    <div class="div_dados_contatos">
                        <input type="text" name="txtHomePageContato" id="txtHomePageContato" class="txt_dados_contato" placeholder="Home Page" value="">
                    </div>
                    <div class="div_dados_contatos">
                        <input type="text" name="txtFacebookContato" id="txtFacebookContato" class="txt_dados_contato" placeholder="Facebook" value=""> 
                    </div> 
                    <div class="div_dados_contatos">
                        <input type="text" name="txtProfissaoContato" onkeypress="return validarEntrada(event, 'number')" id="txtProfissaoContato" class="txt_dados_contato" placeholder="Profissão" value=""><div class="asterisco">*</div>
                    </div>
                    <div class="div_dados_contatos"><div id="asterisco_sexo">*</div>
                        <div id="rdo_conteudo_feminino">
                            <input type="radio" name="rdoSexoContatos" id="rdoSexoContatosF" checked class="rdo_dados_contato" value="F"><h2>Feminino</h2>
                        </div>
                        <div id="rdo_conteudo_masculino">
                            <input type="radio" name="rdoSexoContatos" id="rdoSexoContatosM" class="rdo_dados_contato" value="M"><h2>Masculino</h2>
                        </div>                        
                    </div>
                    <div class="div_dados_contatos">
                        <select name="sltOpcaoContato" id="sltOpcaoContato">
                            <option value="s">Sugestão</option>
                            <option value="c">Crítica</option>
                        </select>
                    </div>
                    <div id="div_mensagem_contatos"><div class="asterisco">*</div>
                        <input type="text" name="txtMensagemContato" id="txt_mensagem_contato" placeholder="Diga aqui o que você achou para a gente! :D " value="">
                    </div>
                    <div id="div_btn_contatos">
                        <input type="submit" name="btnEnviar" id="btn_enviar" value="Enviar">
                    </div>                    
                </form>
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
        <script src="js/modulo.js"></script>        
    </body>       
</html>