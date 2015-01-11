<?php
class oSession
{
    protected $bIsEmptySession;
     /**
    * Descripcion aqui    
    
    *@access  
    *@return null    
    */
        function __construct()
    {
        session_start();
        if (empty($_SESSION) == 1)
        {
            $this->bIsSession = false;
        }
        else
        {
            $this->bIsSession = true;
        }
            }
     /**
    * Descripcion aqui    
    
    *@param String $sName 
    *@param Mix  $mValue 
    *@access public
    *@return null    
    */
      public function PutVar($sName, $mValue)
    {
        if ($this->bIsSession == false)
        {
            $this->bIsSession = true;
        }
        $_SESSION[$sName] = $mValue;
    }
     /**
    * Descripcion aqui    
    
    *@param String $sName 
    *@access public
    *@return null    
    */
      public function GetVar($sName)
    {
        if ($this->bIsSession)
        {
            if (isset($_SESSION[$sName]))
            {
                return $_SESSION[$sName];
            }
        }
        return null;
    }
     /**
    * Descripcion aqui    
    
    *@access public
    *@return null    
    */
      public function CloseSession()
    {
        if ($this->bIsSession)
        {
            $_SESSION = array();
            if (ini_get("session.use_cookies"))
            {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
                );
            }
            session_destroy();
            $this->bIsSession = false;
        }
    }
     /**
    * Descripcion aqui    
    
    *@access public
    *@return null    
    */
      public function isEmpty()
    {
        return $this->bIsSession;
    }
}
?>
