<?php

if(isset($_POST['btnEdicaoPerspectivaSobre'])){
    session_start();

    require_once('../../bd/conexao.php');

    $conexao = conexaoMysql();

    // $idEdicao = $_SESSION['idConteudoEdicao'];

    $imgPerspectiva1 = $_FILES['fleImagemPerspectiva1'];
    $tituloPerspectiva1 = $_POST['txtperspectiva1'];
    $textoPerspectiva1 = $_POST['textArea_icone1'];

    $imgPerspectiva2 = $_FILES['fleImagemPerspectiva2'];
    $tituloPerspectiva2 = $_POST['txtperspectiva2'];
    $textoPerspectiva2 = $_POST['textArea_icone2'];

    $imgPerspectiva3 = $_FILES['fleImagemPerspectiva3'];
    $tituloPerspectiva3 = $_POST['txtperspectiva3'];
    $textoPerspectiva3 = $_POST['textArea_icone3'];

    require_once("funcoes/funcoes.php");

    if($_POST['btnEdicaoPerspectivaSobre'] == "Enviar"){
        
        if($tituloPerspectiva1 != "" || $tituloPerspectiva2 != "" ||  $tituloPerspectiva3 != ""|| 
            $textoPerspectiva1 != "" ||  $textoPerspectiva2 != "" || $textoPerspectiva33 != "" ){

            $fotoInsercao1 = insercaoImagem($imgPerspectiva1);
            $fotoInsercao2 = insercaoImagem($imgPerspectiva2);
            $fotoInsercao3 = insercaoImagem($imgPerspectiva3);

            $sql = "INSERT INTO tbl_sobre_perspectiva(imagem1_perspectiva, titulo1_perspectiva, texto1_perspectiva, imagem2_perspectiva, titulo2_perspectiva, texto2_perspectiva,
                                                      imagem3_perspectiva, titulo3_perspectiva, texto3_perspectiva, situacao_sobre_perspectiva) 
                    VALUES('".$fotoInsercao1."','".$tituloPerspectiva1."', '".$textoPerspectiva1."','".$fotoInsercao2."', '".$tituloPerspectiva2."','".$textoPerspectiva2."', '".$fotoInsercao3."','".$tituloPerspectiva3."', '".$textoPerspectiva3."','des' )";

            echo($sql);
        
        }elseif($_POST['btnEdicaoIntroducaoSobre'] == "Editar"){
            
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
    // }
}


?>