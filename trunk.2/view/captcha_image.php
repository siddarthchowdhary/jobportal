<?Php

session_start();

if(isset($_SESSION['captcha']))
{
	unset($_SESSION['my_captcha']); // destroy the session if already there
}
////// Random string generation ////////
$string1="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$string2='1234567890~!@#$%^&*';
$string=$string1.$string2;
$string= str_shuffle($string);
$random_text= substr($string,0,7);


$_SESSION['captcha'] =$random_text; 


///// The image ////////
$captchaImage = imagecreate (80, 25) or die ("ERROR IN captcha_image.php");
imagecolorallocate ($captchaImage, 200, 200, 200); // Assign background color (white)
$text_color = imagecolorallocate ($captchaImage, 0, 0, 0);      // text color is given (black) 
// Random string  from session added 
imagestring($captchaImage,5,5,2,$_SESSION['captcha'],$text_color); 

imagepng ($captchaImage); // image display
imagedestroy($captchaImage); // Memory de-allocation for the image. 
?>
