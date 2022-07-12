<?php

class encrypt {

/*
    public  function encode($value){ 
      
      $ciphering = "AES-128-CTR";
      $iv_length = openssl_cipher_iv_length($ciphering); 
      $options = 0;
      $encryption_iv = '1234567891011121';
      $encryption_key = "SuperCoolCow5!33";
      $output = openssl_encrypt($value, $ciphering, $encryption_key, $options, $encryption_iv);     

      return $output;

    } 

    

    public function decode($value){

      $ciphering = "AES-128-CTR";
      $iv_length = openssl_cipher_iv_length($ciphering); 
      $options = 0;
      $encryption_iv = '1234567891011121';
      $encryption_key = "SuperCoolCow5!33";
      $output = openssl_decrypt($value, $ciphering, $encryption_key, $options, $encryption_iv);     

      return $output;

    }  
 */   


    function decode($string)
{
    $encryption_key = "SuperCoolCow5!33";
    
    assert(isset($string) === TRUE);

    $result = '';
    $string = base64_decode($string);

    for ($i = 0; $i < strlen($string); $i++)
    {
        $char    = substr($string, $i, 1);
        $keychar = substr($encryption_key, ($i % strlen($encryption_key)) - 1, 1);
        $char    = chr(ord($char) - ord($keychar));
        $result .= $char;
    }

    return $result;
}


function encode($string)
{
    assert(isset($string) === TRUE);
    
    $encryption_key = "SuperCoolCow5!33";

    $string = (string) $string;
    $result = '';

    for ($i = 0; $i < strlen($string); $i++)
    {
        $char    = substr($string, $i, 1);
        $keychar = substr($encryption_key, ($i % strlen($encryption_key)) - 1, 1);
        $char    = chr(ord($char) + ord($keychar));
        $result .= $char;
    }

    return base64_encode($result);
}


}


?>