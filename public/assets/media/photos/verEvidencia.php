<?php
$evidencia = $_GET['ide'];
$filename = "evidencias/{$evidencia}";
if(file_exists($filename))
{
  $handle = fopen($filename, "rb");
  $contents = fread($handle, filesize($filename));
  fclose($handle);
}
else {
  $filename = "css_sin_evidencias.png";
  $handle = fopen($filename, "rb");
  $contents = fread($handle, filesize($filename));
  fclose($handle);
}
header("content-type: image/jpeg");

echo $contents;
?>
