<?php

if(isset($_POST['modo'])){
    if($_POST['modo'] == "visualizarFaleConosco"){
        
        $codigo = $_POST['codigo'];
        
        require_once('../../bd/conexao.php');

        $conexao = conexaoMysql();        
        
        $sql = "select * from tbl_contato where codigo = ".$codigo;
        
        $select = mysqli_query($conexao, $sql);
        
        if($rsVisualizar = mysqli_fetch_array($select)){

            $nome = $rsVisualizar['nome'];
            $telefone = $rsVisualizar['telefone'];
            $celular = $rsVisualizar['celular'];
            $email = $rsVisualizar['email'];
            $home_page = $rsVisualizar['home_page'];
            $link_facebook = $rsVisualizar['link_facebook'];
            $sugestao = $rsVisualizar['sugestao'];
            $mensagem = $rsVisualizar['mensagem'];
            $sexo = $rsVisualizar['sexo'];
            $profissao = $rsVisualizar['profissao'];
                
            if($sexo == "M"){
                $sexo = "Masculino";
            }else{
                $sexo = "Feminino";
            }
            
            if($sugestao == "c"){
                $sugestao = "Crítica";
            }else{
                $sugestao = "Sugestão";
            }
        }      
        
    }
}

?>


<html>
    <head>
    
    </head>
    <body>    
        <div id="div_nome_sexo_modal">
            <div id="nome_modal">
                <h1>Nome:</h1>
                <input type="text" disabled name="txtNomeModal" id="txtNomeModal" class="txtModal" value="<?=$nome?>">
            </div>
            <div id="sexo_modal">
                <h1>Sexo:</h1>
                <input type="text" disabled name="txtSexoModal" id="txtSexoModal" class="txtModal" value="<?=$sexo?>">
            </div>                       
        </div>
        <div id="div_homePage_linkFcb_modal">
            <div id="home_page_modal">
                <h1>Home page:</h1>
                <input type="text" disabled name="txtHomePageModal" id="txtHomePageModal" class="txtModal" value="<?=$home_page?>">
            </div>
            <div id="link_facebook_modal">
                <h1>Link Facebook:</h1>
                <input type="text" disabled name="txtLinkFacebookModal" id="txtLinkFacebookModal" class="txtModal" value="<?=$link_facebook?>">
            </div>                    
        </div>
        <div id="div_telefone_celular_email_modal">
            <div id="telefone_modal">
                <h1>Telefone:</h1>
                <input type="text" disabled name="txtTelefoneModal" id="txtTelefoneModal" class="txtModal" value="<?=$telefone?>">
            </div>
            <div id="celular_modal">
                <h1>Celular:</h1>
                <input type="text" disabled name="txtCelularModal" id="txtCelularModal" class="txtModal" value="<?=$celular?>">
            </div>   
            <div id="email_modal">
                <h1>E-mail:</h1>
                <input type="text" disabled name="txtEmailModal" id="txtEmailModal" class="txtModal" value="<?=$email?>">
            </div>                   
        </div>
        <div id="div_profissao_tipoMensagem_modal">
            <div id="profissao_modal">
                <h1>Profissão:</h1>
                <input type="text" disabled name="txtProfissaoModal" id="txtProfissaoModal" class="txtModal" value="<?=$profissao?>">
            </div>
            <div id="tipo_mensagem_modal">
                <h1>Tipo Mensagem:</h1>
                <input type="text" disabled name="txtTipoModal" id="txtTipoModal" class="txtModal" value="<?=$sugestao?>">
            </div>                 
        </div>
        <div id="mensagem_modal">
            <h1>Mensagem:</h1>
            <textarea name="textareaMensagemModal" disabled id="textareaMensagemModal" cols="90" rows="6" ><?=$mensagem?></textarea>
        </div>  
    </body>
</html>