<?php
session_start();
if ($_GET["tur"]=="auto"):
    $rand = array("sum", "deduct", "multiply", "default");
    $gelen = array_rand($rand, 1);
    $value = $rand[$gelen];
else:
    $value = $_GET["tur"];
endif;
switch ($value):
    case "sum":
        $number1 = rand(1, 40);
        $number2 = rand(1, 30);
        $_SESSION["code"] = $number1 + $number2;
        $code = $number1 . "+" . $number2 . "= ?";

        break;
    case "deduct":
        $number1 = rand(1, 40);
        $number2 = rand(1, $number1);
        $_SESSION["code"] = $number1 - $number2;
        $code = $number1 . "-" . $number2 . "= ?";

        break;
    case "multiply":
        $number1 = rand(1, 9);
        $number2 = rand(1, 9);
        $_SESSION["code"] = $number1 * $number2;
        $code = $number1 . "*" . $number2 . "= ?";

        break;
    case "default":
        $code = substr(md5(mt_rand(1, 99999999999)), 0, 6); // bu değeri session olarak atayacağım.

        $_SESSION["code"] = $code;
        break;
endswitch;


header('Content-type: image/png');

$image = imagecreate(100, 50);
$background_color = imagecolorallocate($image, 245,197,32); // yellow
$font_color = imagecolorallocate($image, 30, 28, 28); // black
$line_color = imagecolorallocate($image, 64, 64, 64);

for ($i = 0; $i < 8; $i++):

    imageline($image, 0, rand() % 95, 200, rand() % 95, $line_color);


endfor;

$point_color = imagecolorallocate($image, 0, 0, 255);

for ($i = 0; $i < 1000; $i++):

    imagesetpixel($image, rand() % 100, rand() % 100, $point_color);


endfor;

imagestring($image, 35, 20, 20, $code, $font_color);
imagepng($image);
imagedestroy($image);



?>