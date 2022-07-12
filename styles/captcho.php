<?php



if($_SERVER["REMOTE_ADDR"] =="127.0.0.1") {



define('CAPTCHAFONT', $_SERVER["DOCUMENT_ROOT"]."/styles/monofont.ttf");

  

} else {



 define('CAPTCHAFONT', 'monofont.ttf');

}









session_start(); 



    $width = 200;

    $height = 60;

    $characters = 5;

    $font = CAPTCHAFONT;





    $chars = '23456789bcdfghjkmnpqrstvwxyz';

    $random_dots = 140;

    $random_lines = 5;

    $captcha_text_color="0x142864";

    $captcha_noise_color = "0x142864";



    $code = '';





    $i = 0;

    while( $i < $characters ) { 

        $code .= substr($chars, mt_rand(0, strlen($chars)-1), 1);

        $i++;

    }





    $font_size = $height * 0.75;

    $image = @imagecreate( $width, $height );





    $background_color = imagecolorallocate($image, 255, 255, 255);



    $rgb = hexrgb( $captcha_text_color );

    $text_color = imagecolorallocate($image, 

        $rgb->r,

        $rgb->g, 

        $rgb->b

    );



    $rgb = hexrgb( $captcha_noise_color );

    $noise_color = imagecolorallocate($image, 

        $rgb->r, 

        $rgb->g, 

        $rgb->b

    );





    /* generating the dots randomly in background */

    for( $i=0; $i < $random_dots; $i++ ) {

        imagefilledellipse( $image, mt_rand( 0, $width ), mt_rand( 0, $height ), 2, 3, $noise_color );

    }





    /* generating lines randomly in background of image */

    for( $i=0; $i < $random_lines; $i++ ) {

        imageline( $image, mt_rand( 0, $width ), mt_rand( 0, $height ), mt_rand( 0, $width ), mt_rand( 0, $height ), $noise_color );

    }





    /* create a text box and add 6 letters code in it */

    $textbox = imagettfbbox( $font_size, 0, $font, $code ); 

    $x = ( $width - $textbox[4] )/2;

    $y = ( $height - $textbox[5] )/2;

    imagettftext( $image, $font_size, 0, $x, $y, $text_color, $font , $code );







    header('Content-Type: image/jpeg');

    imagejpeg( $image );

    imagedestroy( $image );



    $_SESSION['captcha_code'] = $code;









    function hexrgb( $hexstr ){

      $int = hexdec( $hexstr );

      return (object)array(

            'r' => 0xFF & ($int >> 0x10),

            'g' => 0xFF & ($int >> 0x8),

            'b' => 0xFF & $int

        );

    }

?>