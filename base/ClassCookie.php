<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClassCookie
 *
 * @author pc
 */
require_once 'classErrorSimple.php';

class ClassCookie
{

    protected $sNameVar;
    protected $iTime;
    protected $sDir;
    protected $bSecure;
    protected $bHTTPOnly;
    protected $bHaveInfo;
    protected $sVar;
    protected $bIsSerialize;
    protected $oError;
    protected $bIsSession;

    function __construct($sNameVar = "Cookie", $iTime = '604800', $sDir = "/", $bSecure = false, $bHTTPOnly = false, $bIsSerialize = true)
    {
        $this->sNameVar = $sNameVar;
        $this->iTime = time() + $iTime;
        $this->sDir = $sDir;
        $this->bSecure = $bSecure;
        $this->bHTTPOnly = $bHTTPOnly;
        $this->oError = new ErrorSimple(ERROR_FILE);
        $this->bIsSession = false;

        $this->bIsSerialize = $bIsSerialize;
        if (!empty($_COOKIE[$this->sNameVar]))
        {
            $this->bHaveInfo = true;
            if ($this->bIsSerialize)
            {
                $aCookie = unserialize($_COOKIE[$this->sNameVar]);

                if ($aCookie !== false && is_array($aCookie))
                {
                    $this->sVar = $aCookie;
                    $this->bIsSession = true;
                }
            }
            else
            {
                $this->sVar = $_COOKIE[$this->sNameVar];
            }
        }
    }

    public function getITime()
    {
        return $this->iTime;
    }

    public function setITime($iTime)
    {
        $this->iTime = $iTime;
    }

    public function getSDir()
    {
        return $this->sDir;
    }

    public function setSDir($sDir)
    {
        $this->sDir = $sDir;
    }

    public function getBSecure()
    {
        return $this->bSecure;
    }

    public function setBSecure($bSecure)
    {
        $this->bSecure = $bSecure;
    }

    public function getBHTTPOnly()
    {
        return $this->bHTTPOnly;
    }

    public function setBHTTPOnly($bHTTPOnly)
    {
        $this->bHTTPOnly = $bHTTPOnly;
    }

    public function getBHaveInfo()
    {
        return $this->bHaveInfo;
    }

    public function setBHaveInfo($bHaveInfo)
    {
        $this->bHaveInfo = $bHaveInfo;
    }

    public function getSVar($sName)
    {
        if ($this->bIsSerialize)
        {
            if ($this->bHaveInfo)
            {
                if (isset($this->sVar[$sName]))
                {
                    return $this->sVar[$sName];
                }/* fin de isset($this->sVar[$sName]) */
                else
                {
                    $this->oError->SetError("Cookie", "code", "la Cookie con el nombre" . $sName . "no se ha encontrado en el vertor Cookie", "nombre a buscar:" . $sName);
                }/* Fin de else de isset($this->sVar[$sName]) */
            }/* fin de $this->bHaveInfo */
            else
            {
                $this->oError->SetError("Cookie", "code", "No hay informacion de la variable cookie", "nombre a buscar:" . $sName);
            }/* Fin de else de $this->bHaveInfo */
        }/* fin de $this->bIsSerialize */
        else
        {
         
            if (isset($_COOKIE[$sName]))
            {
                return $_COOKIE[$sName];
            }/* fin de isset($_COOKIE["sName"]) */
            else
            {
                $this->oError->SetError("Cookie", "code", "la Cookie con el nombre" . $sName . "no se ha encontrado en el vertor Cookie", "nombre a buscar:" . $sName);
            }/* Fin de else de isset($_COOKIE["sName"]) */
        }/* Fin de else de $this->bIsSerialize */
    }

    public function setSVar($sName, $sValue)
    {
        $this->sVar[$sName] = $sValue;
    }

    public function SaveAll()
    {

        if (empty($this->sVar))
        {
            $cookie_val = "";
        }
        else
        {
            if ($this->bIsSerialize == true)
            {
                $cookie_val = serialize($this->sVar);
            }
            else
            {
                $cookie_val = $this->sVar;
            }
        }

        if (strlen($cookie_val) > 4 * 1024)
        {
            trigger_error("The cookie $this->sNameVar exceeds the specification for the maximum cookie size.  Some data may be lost", E_USER_WARNING);
        }
        setcookie($this->sNameVar, $cookie_val, $this->iTime, $this->sDir, "");
    }

    public function getBIsSerialize()
    {
        return $this->bIsSerialize;
    }

    public function setBIsSerialize($bIsSerialize)
    {
        $this->bIsSerialize = $bIsSerialize;
    }

    public function SeeCookiesVars()
    {
        var_dump($_COOKIE);
    }

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
            setcookie($this->sNameVar, "", time() - 42000, "/", "");
            $this->bIsSession = false;
        }
    }

    public function IsSession()
    {
        return $this->bIsSession;
    }

}

?>
