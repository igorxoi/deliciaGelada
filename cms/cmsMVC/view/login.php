<!-- 
    /* Classe de Contato
     * Autor: Igor Xavier
     * Data de criação: 01/12/2019
     * Data de modificação:
     * Modificações realizadas:
     */ -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delícia Gelada - MVC</title>
        <!-- <link rel="shortcut icon" href="imagens/fav_icon.png"/> -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- <script src="js/jquery.js"></script>
        <script src="js/scroll.js"></script>
        <script src="js/jquery-3.1.0.min.js"></script>
	    <script src="js/main.js"></script> -->
    </head>
    <body>
        <div id="div_body">
            <div id="div_caixa_login">
                <div id="div_body_esquerda">
                    <div id="div_img_login">
                        <img src="imagens/logo.png" alt="">
                    </div>
                </div>
                <div id="div_body_direita">
                    <div id="div_back_home">
                        <a href="../../../index.php">
                            <h1>home?</h1>
                        </a>                        
                    </div>
                    <div id="div_titulo_login">
                        <h1>Login</h1>
                    </div>
                    <div id="div_form_login">
                        <form name="frmusuario" method="post"  action="../router.php?controller=usuario&modo=autenticar">
                            <div id="div_input_usuario_login">
                                <div id="div_titulo_input_usuario_login">
                                    <h1>Usuário</h1>
                                </div>
                                <div id="input_usuario_login">
                                    <input type="text" placeholder="usuario@usuario.com" name="txtUsuarioLogin">
                                </div>                                
                            </div>
                            <div id="div_input_senha_login">
                                <div id="div_titulo_input_senha_login" >
                                    <h1>Senha</h1>
                                </div>
                                <div id="input_senha_login">
                                    <input type="password" placeholder="Digite sua senha" name="txtUsuarioSenha">
                                </div>
                            </div>
                            <div id="div_input_btn_submit_login">
                                <input type="submit" value="Login">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>