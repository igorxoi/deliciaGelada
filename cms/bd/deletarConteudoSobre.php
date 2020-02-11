<?php

    if(isset($_GET['modo'])){
        if($_GET['modo'] == "excluir"){
            $codigo = $_GET['codigo'];
            
            $nomeFoto = $_GET['nomeFoto'];

            $sql = "delete from tbl_sobre_conteudo where id_conteudo_sobre=".$codigo;
            echo($sql);

            require_once('../../bd/conexao.php');
            $conexao = conexaoMysql();

            mysqli_query($conexao, $sql);

            if(mysqli_query($conexao, $sql)){
                unlink('arquivos/'.$nomeFoto);
                header('location:../edicaoConteudoSobre.php');
            }else{
                echo("erro ao excluir o registro");
            }
        }
    }

?>