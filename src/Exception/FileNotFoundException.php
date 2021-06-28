<?php


class FileNotFoundException extends \Exception
{
    function __construct($message = "", $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}