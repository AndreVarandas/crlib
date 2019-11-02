<?php

namespace Varandas\Crlib;

class CrlibClient extends CrlibOperations
{
    public function __construct($authorization_token)
    {
        parent::__construct($authorization_token);
    }
    /**
     * Exception Handler
     *
     * @param string $err - The error message to show.
     *
     * @return void
     */
    public static function exception($err = '')
    {
        die($err);
    }
}
