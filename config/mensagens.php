<?php

class Mensagens {

    public function __construct(){}

    public static function erro($msg) {
        //alert - funcao javascript para mostrar uma mensagem em pop up
        //history.back() retornar a página anterior
        echo "<script>alert('$msg');history.back();</script>";
        exit;
    }

    public static function sucesso($msg, $link) {

        echo "<script>alert('$msg');window.location='$link';</script>";
        exit;

}

}