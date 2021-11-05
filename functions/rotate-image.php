<?php 

$input = file_get_contents("php://input");
$array = json_decode($input, true);

$_POST = !empty($array) ? $array : $_POST;

// rotated image name
$fname = $_POST['fname'];

// Assign image file to variable 
$image_name = 'http://localhost:8080/AmbienteTeste/uniDigital/fotos/'.$fname; 

// degreess 
$degress = $_POST['degress'];

// Load image file 
$image = imagecreatefrompng($image_name);  
  
// Use imagerotate() function to rotate the image
$img = imagerotate($image, $degress, 0);
  
// Output image in the browser   
imagepng($img, "../fotos/".$fname); 
?> 
