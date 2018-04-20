<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 02/03/18
 * Time: 16:34
 */

    class Conexao {

    const HOST      = "localhost";
    const NOMEBANCO = "3INFO3";
    const USUARIO   = "3INFO3";
    const SENHA     = "3INFO3";


    //!!!Substitua daqui para baixo
    public static $conexao = null;
    public static function getConexao(){

        try{
            if(self::$conexao == null){
                self::$conexao = new PDO("mysql:host=".self::HOST.";     dbname=".self::NOMEBANCO, self::USUARIO, self::SENHA);
                self::$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return self::$conexao;
        }catch(PDOException $e){
            die("Falhou a conexao ou ocorreu um erro no banco: " . $e->getMessage());
        }
        return $conexao;
    }
// class ends
}


