<?php

    if(isset($_POST['btnCriacaoLoja'])){

        require_once('../../bd/conexao.php');

        $conexao = conexaoMysql();
        
        $endereco = $_POST['txtEnderecoLoja'];
        $numero = $_POST['txtNumeroLoja'];
        $funcionamento = $_POST['txtFuncionamentoLoja'];
        $telefone = $_POST['txtTelefoneLoja'];
        $estado = $_POST['sltEstadosLoja'];

        if($estado != "" || $numero != "" || $funcionamento != "" || $telefone != ""){
            $sql = "INSERT INTO tbl_loja(numero_loja, endereco_loja, telefone_loja, funcionamento_loja, id_estado) 
            VALUES('".$numero."','".$endereco."','".$telefone."','".$funcionamento."',".$estado.")";

            mysqli_query($conexao, $sql);
            echo("<script>
                    alert('Estado criado.');
                    window.location.href = '../edicaoLojas.php';
                </script>");
            

        }else{
            echo("<script>
                    alert('Por Favor preencha o campo');
                    window.location.href = '../edicaoLojas.php';
                </script>");
                
        }
    }
    

    
?>