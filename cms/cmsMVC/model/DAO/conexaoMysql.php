<?php
/* Classe de Contato
 * Autor: Igor Xavier
 * Data de criação: 01/12/2019
 * Data de modificação:
 * Modificações realizadas:
 */

    class conexaoMysql{
        private $server;
        private $user;
        private $password;
        private $database;

        // Construtor para alimentar os dados nos atributos
        public function __construct(){
            $this->server = "localhost";
            // $this->user = "root";
            $this->user = "igor";
            // $this->password = "bcd127";
            $this->password = "a12345678";
            // $this->database = "delicia_gelada";
            $this->database = "db_delicia_gelada";
        }

        //Conexão com o bd
        public function connectDatabase(){
            try{
                $conexao = new PDO('mysql:host='.$this->server.';dbname='.$this->database, $this->user, $this->password);
                return $conexao;
            }catch(PDOException $Erro){
                echo("Erro de conexão com o Banco de Dados. <br> Linha do erro: ".$Erro->getLine(). "Mensagem de erro: ".$Erro->getMessagem());
            }
            
        }
    }
?>