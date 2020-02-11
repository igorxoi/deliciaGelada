<?php

    //declarando as variaveis que serão enviadas para o banco
    $nome = (string) "";
    $OperadorConteudo = (bool) false;
    $admUsuario = (bool) false;
    $relacionamentoCliente = (bool) false;
    session_start();

    //ouvinte do botão
    if(isset($_GET['btnCadastrarNivel'])){
        
        //abrindo coneão com o banco
        require_once('../../bd/conexao.php');

        $conexao = conexaoMysql();

        @$_GET['rdoNivelOperadorDeConteudo'] == "" ? $OperadorConteudo = 'false' : $OperadorConteudo = $_GET['rdoNivelOperadorDeConteudo'];
        @$_GET['rdoNivelAdministrador'] == "" ? $admUsuario = 'false' : $admUsuario = $_GET['rdoNivelAdministrador'];
        @$_GET['rdoNivelRelacionamentoCliente'] == "" ? $relacionamentoCliente = 'false' : $relacionamentoCliente = $_GET['rdoNivelRelacionamentoCliente'];
        $nome = $_GET['txtCategoriaNomeUsuario'];

        $sql = "select nome_nivel from tbl_niveis where nome_nivel ='".$nome."'";
       
        $select = mysqli_query($conexao, $sql);

        $autenticador = mysqli_num_rows($select);

        echo($sql);
        echo($autenticador);
        if($_GET['btnCadastrarNivel'] == "Enviar"){
            if($autenticador >= 1){
                echo("<script>
                    alert('Este nome já está em uso. Tente outro.');
                    window.location.href = '../admNiveis.php';
                </script>");            
    
            }else{
                if($nome != "" && $OperadorConteudo != 'false' || $admUsuario != 'false' ||  $relacionamentoCliente != 'false'){
                    $sql = "INSERT INTO tbl_niveis(nome_nivel, adm_conteudo, adm_contato, adm_usuario, situacao_nivel) VALUES
                    ('".$nome."',".$OperadorConteudo.",".$relacionamentoCliente.",".$admUsuario.",'atv')";
        
                    mysqli_query($conexao, $sql);
                    echo("<script>
                            alert('Nível criado com sucesso!');
                            window.location.href = '../admNiveis.php';
                        </script>");
                        
                }else{
                    echo("<script>
                            alert('Por favor preencha os campos obrigatorios');
                            window.location.href = '../admNiveis.php';
                        </script>");
                }
                
            } 
        }elseif($_GET['btnCadastrarNivel'] == "Editar"){
            if($nome != ""){
                $sql = "UPDATE tbl_niveis set nome_nivel='".$nome."',
                                              adm_conteudo=".$OperadorConteudo.",
                                              adm_contato=".$relacionamentoCliente.",
                                              adm_usuario=".$admUsuario." where id_nivel=".$_SESSION['id'];

            mysqli_query($conexao, $sql);
            echo("<script>
                    alert('Nível editado com sucesso!');
                    window.location.href = '../admNiveis.php';
                </script>");
                echo($sql);
            }

        }
              

    }

?>