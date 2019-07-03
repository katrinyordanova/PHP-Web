<?php
/**
 * Created by PhpStorm.
 * User: Kati
 * Date: 2.11.2018 г.
 * Time: 16:06
 */

class ErrorDTO
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }


}