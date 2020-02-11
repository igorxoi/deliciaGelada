<?php

if(isset($_POST['btnEdicaoCuriosidades'])){
    session_start();

    require_once('../../bd/conexao.php');

    $conexao = conexaoMysql();

    $tituloCuriosidades = $_POST['txtEdicaoTitulo'];
    $subtituloCuriosidades = $_POST['txtEdicaoSubtitulo'];
    $textoCuriosidades =  $_POST['txtIntroducaoSobre']; 

    if($_POST['btnEdicaoCuriosidades'] == "Editar" && $_FILES['fleImagemCuriosidades']['name'] == ""){
        $sql = "update tbl_curiosidades set titulo_curiosidades='".$tituloCuriosidades."', 
                                    subtitulo_curiosidades='".$subtituloCuriosidades."',
                                    texto_curiosidades='".$textoCuriosidades."'
                                    situacao_curiosidades='des'                                    
                                    where id_curiosidades=".$_SESSION['id'];

                                    echo($sql);
                                    // var_dump($_FILES['fleImagemCuriosidades']);
        
        //Executa um script no banco de dados 
        //precisa de dois paramentros o primeiro é a conexão, e o segundo é o string que você quer enviar para o banco 
        if(mysqli_query($conexao, $sql)){
            //verifica se existe a variavel de sessão, ela será criada na pagina anterior quando carregamos os dados nas caixas de texto.
            unset($_SESSION['id']);            
            // header('location:../index.php');
        }else{
            echo("Erro: Problema na execução do script no banco de dados");
        }
        
    }else{


    if($_POST['btnEdicaoCuriosidades'] == "Enviar"){

        if($tituloCuriosidades != "" && $subtituloCuriosidades != "" && $textoCuriosidades != ""){
            $sql = "INSERT INTO tbl_curiosidades(img_curiosidades, titulo_curiosidades, subtitulo_curiosidades, texto_curiosidades, situacao_curiosidades) 
            VALUES('".$_SESSION['nomeFoto']."','".$tituloCuriosidades."','".$subtituloCuriosidades."','".$textoCuriosidades."','des')";

            // echo($sql);

            mysqli_query($conexao, $sql);
            echo("<script>
                    alert('SUCESSO.');
                    window.location.href = '../edicaoCuriosidades.php';
                </script>");
            }

        }elseif($_POST['btnEdicaoCuriosidades'] == "Editar"){
                $sql = "update tbl_curiosidades set img_curiosidades='".$_SESSION['nomeFoto']."', 
                                            titulo_curiosidades='".$tituloCuriosidades."', 
                                            subtitulo_curiosidades='".$subtituloCuriosidades."',
                                            texto_curiosidades='".$textoCuriosidades."'
                                            situacao_curiosidades='des' 
                                            where codigo=".$_SESSION['id'];
                                            ; 
            }
    }
}

?>