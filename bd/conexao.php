<?php  

    function conexaoMysql(){
        $server = (string) "localhost";
        // $user = (string) "root";
        $user = (string) "igor";
        // $user = (string) "";
        // $password = (string) "bcd127";
    //    $password = (string) "";
        $password = (string) "a12345678";
        $dataBase = (string) "db_delicia_gelada";
        
        $conexao = mysqli_connect($server, $user, $password, $dataBase);
        
        return $conexao;
        
    }

?>