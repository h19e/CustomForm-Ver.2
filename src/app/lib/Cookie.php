<?php

class Cookie
{
    static public function set($name,$value,$time = 0)
    {
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256,MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size,MCRYPT_RAND);
        $encryptValue = mcrypt_encrypt(MCRYPT_RIJNDAEL_256,SECRET_KEY_FOR_COOKIE,$value,MCRYPT_MODE_CBC,$iv);
        setcookie($name,base64_encode($encryptValue),$item, "/" , DOMAIN_FOR_COOKIE);
        setcookie($name . "_key",base64_encode($iv),$time, "/" , DOMAIN_FOR_COOKIE);
   
    }

    static public function get($name)
    {

        if (isset($_COOKIE[$name . "_key"]) && isset($_COOKIE[$name])) {
            $iv = base64_decode($_COOKIE[$name . "_key"]);
            $encryptValue = base64_decode($_COOKIE[$name]);
            $value = mcrypt_decrypt(MCRYPT_RIJNDAEL_256,SECRET_KEY_FOR_COOKIE,$encryptValue,MCRYPT_MODE_CBC,$iv);
            return str_replace("\0","",$value);
        }
        return false;
    }

    static public function clean($name)
    {
        setcookie($name,"",time() - 3600,"/", DOMAIN_FOR_COOKIE);
        setcookie($name . "_key","",time() - 3600,"/", DOMAIN_FOR_COOKIE);
    }
}
        
