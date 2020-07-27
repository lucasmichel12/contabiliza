<?php


namespace Contabiliza\Helpers;


class Message
{

    public function sucessMessage($msg)
    {
        echo "<script>alert('$msg')</script>";
    }
}