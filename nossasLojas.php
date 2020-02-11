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
        
            
        <div id="div_conteudo_nossas_lojas" class="conteudo">
            <div id="div_titulo_nossas_lojas">
                <h3>Nossas Lojas</h3>
            </div>
            <div id="container_nossas_lojas">
                <div class="logradouro_lojas">
                    <div id="lojas_sao_paulo">
                        <h2>Lojas em São Paulo</h2>
                    </div>
                    <div class="numero_lojas">
                        <h3>Loja 1</h3>
                        <div class="dados_lojas">
                            <h4>
                                Endereço: Av. Luis Carlos Berrini, nº 666.<br>
                                Telefone: (11) 4212-9598.<br>
                                Aberto de segunda a sexta, das 8:00 às 20:00.
                            </h4>
                        </div>
                    </div> 
                    <div class="numero_lojas">
                        <h3>Loja 2</h3>
                        <div class="dados_lojas">
                            <h4>
                                Endereço: Av. Luis Carlos Berrini, nº 666.<br>
                                Telefone: (11) 4212-9598.<br>
                                Aberto de segunda a sexta, das 8:00 às 20:00.
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="logradouro_lojas">
                    <div id="lojas_rio_janeiro">
                        <h2>Lojas no Rio de Janeiro</h2>
                    </div>
                    <div class="numero_lojas">
                        <h3>Loja 3</h3>
                        <div class="dados_lojas">
                            <h4>
                                Endereço: Av. Luis Carlos Berrini, nº 666.<br>
                                Telefone: (11) 4212-9598.<br>
                                Aberto de segunda a sexta, das 8:00 às 20:00.
                            </h4>
                        </div>
                        
                    </div>
                    <div class="numero_lojas">
                        <h3>Loja 3</h3>
                        <div class="dados_lojas">
                            <h4>
                                Endereço: Av. Luis Carlos Berrini, nº 666.<br>
                                Telefone: (11) 4212-9598.<br>
                                Aberto de segunda a sexta, das 8:00 às 20:00.
                            </h4>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="logradouro_lojas">
                    <div id="lojas_rio_janeiro">
                        <h2>Lojas no Rio de Janeiro</h2>
                    </div>
                    <div class="numero_lojas">
                        <h3>Loja 3</h3>
                        <div class="dados_lojas">
                            <h4>
                                Endereço: Av. Luis Carlos Berrini, nº 666.<br>
                                Telefone: (11) 4212-9598.<br>
                                Aberto de segunda a sexta, das 8:00 às 20:00.
                            </h4>
                        </div>
                        
                    </div>
                    <div class="numero_lojas">
                        <h3>Loja 3</h3>
                        <div class="dados_lojas">
                            <h4>
                                Endereço: Av. Luis Carlos Berrini, nº 666.<br>
                                Telefone: (11) 4212-9598.<br>
                                Aberto de segunda a sexta, das 8:00 às 20:00.
                            </h4>
                        </div>
                        
                    </div>
                    
                </div>
                
                
            </div>
            <div id="div_mapas">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.0585542545346!2d-46.69419408502147!3d-23.602232884662683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5735c934cfbb%3A0x1c104064af0b9412!2sAv.%20Engenheiro%20Lu%C3%ADs%20Carlos%20Berrini%2C%20666%20-%20Itaim%20Bibi%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004533-085!5e0!3m2!1spt-BR!2sbr!4v1568037772092!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen=""></iframe>
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