<?php

    if(isset($_GET['modo'])){
        if($_GET['modo'] == "excluir"){
            $codigo = $_GET['codigo'];
            
            $nomeFoto = $_GET['nomeFoto'];

            $sql = "delete from tbl_curiosidades where id_curiosidades=".$codigo;
            // echo($sql);

            require_once('../../bd/conexao.php');
            $conexao = conexaoMysql();

            mysqli_query($conexao, $sql);

            if(mysqli_query($conexao, $sql)){
                unlink('arquivos/'.$nomeFoto);
                header('location:../edicaoCuriosidades.php');
            }else{
                echo("erro ao excluir o registro");
            }
        }
    }

?>