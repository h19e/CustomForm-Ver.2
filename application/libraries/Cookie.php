<?php

class My_Cookie
{

    const CLOSE_KEY ="closekey";
    const DOMAIN_FOR_COOKIE = "";
    

    //Cookieをセットするメソッド
    public function set($name,$value,$time = 0)
    {
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
        //暗号化するためのキーを生成
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

        //closeKeyには、オリジナルの文字列を登録してください。
        $closeKey = self::CLOSE_KEY;

        $encryptValue = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $closeKey, $value, MCRYPT_MODE_CBC, $iv);

        //暗号化された値をCookieに書き込みます。
        //DOMAIN_FOR_COOKIEはCookieを使用するサイトのドメインです。
        setcookie($name,base64_encode($encryptValue),$time , "/", self::DOMAIN_FOR_COOKIE);

        //暗号化された値を解読するためのキーをCookieに書き込みます。
        setcookie("iv_" . $name ,base64_encode($iv),$time , "/", self::DOMAIN_FOR_COOKIE);

    }

    public function get($name)
    {
        $closeKey = self::CLOSE_KEY;

        if (isset($_COOKIE['iv_' . $name]) && isset($_COOKIE[$name])) {
            $iv = base64_decode($_COOKIE['iv_' . $name]);
            $encryptValue = base64_decode($_COOKIE[$name]);

            //Cookieに保存されていたキーを使用してCookieの値を複合します。
            $value = mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$closeKey,$encryptValue,MCRYPT_MODE_CBC,$iv);
            return str_replace("\0","",$value);
        }
        return false;
    }
	
    public function clean($name)
	{
		setcookie($name,"",time() - 3600,"/", self::DOMAIN_FOR_COOKIE);
		setcookie("iv_" . $name,"",time() - 3600,"/", self::DOMAIN_FOR_COOKIE);
	}
}
