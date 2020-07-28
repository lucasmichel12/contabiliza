<?php


namespace Contabiliza\Helpers;


class Message
{

    public function error($msg)
    {
        //alert - funcao javascript para mostrar uma mensagem em pop up
		//history.back() retornar a página anterior
		echo "<script>alert('$msg');history.back();</script>";
		exit;
    }

    public function sucess($msg, $link)
    {
        echo "<script>alert('$msg');window.location='$link';</script>";
        exit;
    }
}