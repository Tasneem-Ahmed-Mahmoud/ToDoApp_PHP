<?php



class Session
{

    function issetSession($name)
    {
        if (isset($_SESSION[$name])) {
            return true;
        } else {
            return false;
        }
    }

    function setSession($name, $valu)
    {
        $_SESSION[$name] = $valu;
    }

    function getSession($name)
    {
        return $_SESSION[$name];
    }
    function destroySession($name)
    {
        unset($_SESSION[$name]);
    }


    function startSession()
    {
        session_start();
    }
}
