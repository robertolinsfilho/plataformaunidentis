<?php 

$input = file_get_contents("php://input");
$array = json_decode($input, true);

$_POST = !empty($array) ? $array : $_POST;

// rotated image name
$fname = $_POST['fname'];
$imgType = explode('.', $fname);
$imgType = end($imgType);

// Assign image file to variable 
$image_name = 'http://localhost:8080/fotos/'.$fname;

// degreess 
$degress = $_POST['degress'];

if($imgType == 'png' || $imgType == 'PNG'):
// Load image file 
$image = imagecreatefrompng($image_name); 

// Use imagerotate() function to rotate the image
$img = imagerotate($image, $degress, 0);

// Output image in the browser   
imagepng($img, "../fotos/".$fname);

elseif($imgType == 'jpeg' || $imgType == 'jpg' || $imgType == 'JPG' || $imgType == 'JPEG'):
// Load image file  
$image = imagecreatefromjpeg($image_name);

// Use imagerotate() function to rotate the image
$img = imagerotate($image, $degress, 0);

// Output image in the browser   
imagejpeg($img, "../fotos/".$fname);

endif;