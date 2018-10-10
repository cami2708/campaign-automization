<?php
  //echo "Hola a todos";
  header('Content-Type: image/gif');

  $color="red";
  $image="rose:";
  $scale="200%";
  $size="140x96";
  $string="A Rose by any Name";

  passthru( "convert -background none -fill '$color' -gravity center" .
            " -font Candice -size '$size' caption:'$string'" .
            " \\( '$image' -negate -resize '$scale' \\) +swap -composite" .
            " gif:-" );

//  echo "Hola mundo";
?>