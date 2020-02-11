<?php

    if(isset($_GET['modo'])){
        if($_GET['modo'] == "excluir"){
            $codigo = $_GET['id'];            

            $sql = "delete from tbl_loja where id_loja=".$codigo;
            echo($sql);

            require_once('../../bd/conexao.php');
            $conexao = conexaoMysql();

            if(mysqli_query($conexao, $sql)){
                header('location:../edicaoCuriosidades.php');
            }else{
                echo("erro ao excluir o registro");
            }
        }
    }

?>