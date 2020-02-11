<?php 
    session_start();
    /* DECLARANDO VARIAVEIS */
    $usuario = (string) "";
    $senha = (string) "";
    $nome = (string) "";
    
    //ouvinte do botão
    if(isset($_POST['btnOk'])){

        //abrinco conexão com o banco
        require_once('../bd/conexao.php');
        $conexao = conexaoMysql();

        //pegando o texto dos inputs
        $usuario = $_POST['txtUsuario'];
        $senha = $_POST['txtSenha'];

        //escrevendo o script de autenticação, colocando os values recebidos pelos inputs
        $sql = "select u.nome_usuario, n.adm_usuario, n.adm_contato, n.adm_conteudo from tbl_usuarios u INNER JOIN tbl_niveis n ON u.id_nivel = n.id_nivel 
        where u.email_usuario ='".$usuario."' AND u.senha_usuario = '".$senha."' AND u.situacao_usuarios = 'atv' AND n.situacao_nivel = 'atv'";
        // $sql = "select nome_usuario from tbl_usuarios where email_usuario ='".$usuario."' AND senha_usuario = '".$senha."'";
       
        //mandando o script para o banco, e guardando o retorno em uma variavel select
        $select = mysqli_query($conexao, $sql);

        /* pegando o retorno do select e colocando em uma variavel para acessar depois e conseguir resgatar 
        o nome do usuario */
        $rs = mysqli_fetch_array($select);

        /* vendo quantas linhas o select retorna e guardando em uma variavel para autenticação */
        $autenticador = mysqli_num_rows($select);

        /*if- se o select retornar uma linha significa que ele encontrou um registro com essas informações
        e autentica o usuario a entrar no cms do site */
        if($autenticador == 1){
            /* pegando o retorno do rs e guardando o nome do usuario e as permissões em uma variavel de sessão */
           $_SESSION['nome_usuario'] = $rs['nome_usuario'];

            $_SESSION['adm_usuario'] = $rs['adm_usuario'];

            $_SESSION['adm_conteudo'] = $rs['adm_conteudo'];

            $_SESSION['adm_contato'] = $rs['adm_contato'];
            
            echo("<script>
                    alert('logado com sucesso');
                    window.location.href = '../cms/index.php';
                </script>");
                
        /* else - se o retorno do banco for igual a 0, significa que ele não encontrou nenhuma linha com essas
        informações então o usuario não consegue se autenticar no cms e é encaminhado para a home  */
        }else{
            echo("<script>
                    alert('Erro ao autenticar, confira seu usúario e senha. Caso eles estiverem certos seu usúario ou nivel está desativado');
                    window.location.href = '../index.php';
                </script>");
        }

    }

?>