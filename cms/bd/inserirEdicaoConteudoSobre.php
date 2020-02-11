<?php

if(isset($_POST['btnEdicaoIntroducaoSobre'])){
    session_start();

    require_once('../../bd/conexao.php');

    $conexao = conexaoMysql();

    $idEdicao = $_SESSION['idConteudoEdicao'];

    $textoIntroducao = $_POST['txtIntroducaoSobre'];
    $imagemIntroducao = $_FILES['fleImagemIntroducaoSobre'];

    require_once("funcoes/funcoes.php");


    if($_FILES['fleImagemIntroducaoSobre']['name'] == "" && $_POST['btnEdicaoIntroducaoSobre'] == "Editar"){
        $sql = "UPDATE tbl_sobre_conteudo set texto_conteudo_sobre='".$textoIntroducao."'  
                                    where id_conteudo_sobre=".$idEdicao;
        
        //Executa um script no banco de dados 
        //precisa de dois paramentros o primeiro é a conexão, e o segundo é o string que você quer enviar para o banco 
        if(mysqli_query($conexao, $sql)){
            //verifica se existe a variavel de sessão, ela será criada na pagina anterior quando carregamos os dados nas caixas de texto.
            unset($_SESSION['idConteudoEdicao']);            
            echo($sql);
            header('location:../edicaoConteudoSobre.php');
        }else{
            echo("Erro: Problema na execução do script no banco de dados");
        }
                                        
    }else{

    if($_POST['btnEdicaoIntroducaoSobre'] == "Enviar"){
        
        if($textoIntroducao != ""){
            $fotoInsercao = insercaoImagem($imagemIntroducao);
            $sql = "INSERT INTO tbl_sobre_conteudo(img_conteudo_sobre, texto_conteudo_sobre, situacao_sobre_conteudo) 
            VALUES('".$fotoInsercao."','".$textoIntroducao."', 'des')";

            echo($sql);
        
        }elseif($_POST['btnEdicaoIntroducaoSobre'] == "Editar"){
            // $textoIntroducao = 'cddc';
            // $fotoInsercao = insercaoImagem($imagemIntroducao);
            
            $sql = "UPDATE tbl_sobre_conteudo set img_conteudo_sobre ='".$fotoInsercao."', 
                                        texto_conteudo_sobre='".$textoIntroducao."' 
                                        where id_conteudo_sobre=".$idEdicao;
        }
            echo("<script>
                    alert('SUCESSO.');
                    window.location.href = '../edicaoConteudoSobre.php';
                </script>");

            if(mysqli_query($conexao, $sql)){
                //verifica se existe a variavel de sessão, ela será criada na pagina anterior quando carregamos os dados nas caixas de texto.
                if(isset($_SESSION['fotoConteudoSobre'])){
                    unlink('arquivos/'.$_SESSION['fotoConteudoSobre']);
                    unset($_SESSION['fotoConteudoSobre']);
                    unset($_SESSION['idConteudoEdicao']);
                }
                // header('location:../edicaoConteudoSobre.php');
                echo($sql);
                
            }else{
                echo($sql);
                echo("Erro: Problema na execução do script no banco de dados");
            }
            
        }
    }
}


?>