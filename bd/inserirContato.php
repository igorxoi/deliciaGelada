<?php

    //Declarando as variaveis que irão para o bd
    $nome = (string) "";
    $telefone = (string) "";
    $celular = (string) "";
    $email = (string) "";
    $homePage = (string) "";
    $linkFacebook = (string) "";
    $sugestao = (string) "";
    $mensagem = (string) "";
    $sexo = (string) "";
    $profissao = (string) "";

    if(isset($_POST['btnEnviar'])){
        require_once('conexao.php');
        
        //conexao com o banco
        $conexao = conexaoMysql();
        
        //passando o conteudo para as variaveis
        $nome = $_POST['txtNomeContato'];
        $telefone = $_POST['txtTelefoneContato'];
        $celular = $_POST['txtCelularContato'];
        $email = $_POST['txtEmailContato'];
        $homePage = $_POST['txtHomePageContato'];
        $linkFacebook = $_POST['txtFacebookContato'];
        $sugestao = $_POST['sltOpcaoContato'];
        $mensagem = $_POST['txtMensagemContato'];
        $sexo = $_POST['rdoSexoContatos'];
        $profissao = $_POST['txtProfissaoContato'];
        
        if($nome != "" && $celular != "" && $email != "" && $mensagem != "" && $profissao != ""){
            
            //mandando o script para o banco
            $sql = "INSERT INTO tbl_contato(nome, telefone, celular, email, home_page, link_facebook, sugestao, mensagem, sexo, profissao)
            VALUES('".$nome."','".$telefone."','".$celular."','".$email."','".$homePage."','".$linkFacebook."','".$sugestao."','".$mensagem."','".$sexo."','".$profissao."')";

            mysqli_query($conexao, $sql);
            echo("<script>
                    alert('Mensagem enviada com sucesso');
                    window.location.href = '../entreEmContato.php';
                </script>");
                
           
        }else{
            echo("<script>
                    alert('Por favor preencha os campos obrigatorios');
                    window.location.href = '../entreEmContato.php';
                </script>");
        }
        
    }
    

?>