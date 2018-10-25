<?php
  
  include("poligon.php");

  //Load the hero
  $image                = new \Imagick(realpath('Img/hero.jpg'));
  $logoUAI              = new \Imagick(realpath('Img/logoUAI.png'));
  //Draw another image
  $draw                 = new ImagickDraw();
  $facultyProperties    = new ImagickDraw();
  $backgroundColor      = '#cc00c0';
  $textHeader           = "/ CURSO";
  $programNameRow1      = "Gestión Ágil de Proyectos áéíóúü";
  $programNameRow2      = "para acelerar la transformaciÓn digital";
  $startDate            = "INICIO: 29 DE OCTUBRE DE 2018";
  
  // env is for "Escuela de negocios"
  $facultyCode          = "env";
  $colaborador          = FALSE;
  $facultyLogo          = new \Imagick(realpath('Img/'.$facultyCode.'-iz.png'));
  $facultyLogo->resizeImage(259,100,Imagick::FILTER_LANCZOS,1);
  $logoUAI->resizeImage(330,100,Imagick::FILTER_LANCZOS,1);

  $faculty              = "Escuela de negocios";
  $facultyColor         = "#ffff00";
  //$programNameRow1 = mb_strtoupper($programNameRow1, "UTF-8")

  // Faculty box //
  $pointsFaculty = [
        ['x' => 0, 'y' => 50],
        ['x' => 150, 'y' => 50], 
        ['x' => 150, 'y' => 50 + 150],
        ['x' => 0, 'y' => 50 + 150],
    ];
  $facultyBox = polygon(none, $facultyColor, $pointsFaculty);
  $image->drawImage($facultyBox);

  $image->setImageVirtualPixelMethod(Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
  $image->setImageArtifact('compose:args', "1,0,-0.5,0.5");
  $image->compositeImage($facultyLogo, Imagick::COMPOSITE_MATHEMATICS, 0, 50);
  $image->compositeImage($logoUAI, Imagick::COMPOSITE_MATHEMATICS, 1000, 50);
  /* Faculty text */
  // Set text color
  $facultyBox->setFillColor('white');
  // Set font properties
  $facultyBox->setFont('Bookman-DemiItalic');
  $facultyBox->setFontSize( 20 );
  /* Wrap up text */
  $str                = wordwrap($faculty, 10,"\r");
  $str_array          = explode("\n",$str);
  $padding            = 0;
  foreach($str_array as $line){
    $image->annotateImage( $facultyBox, 10, 120 + $padding, 0, $line );
    $padding = $padding + 50;
  }
  //$image->annotateImage($facultyBox, 10, 120, 0, "Caption:".strtoupper($faculty) );



  /* Header of text box */
  $headerBackground = $backgroundColor.'cc';
  $pointsHeader = [
    ['x' => 50, 'y' => 90 * 5],
    ['x' => 800, 'y' => 90 * 5], 
    ['x' => 850, 'y' => 100 * 5], 
    ['x' => 50, 'y' => 100 * 5],
  ];
  $textBoxHeader = polygon(none, $headerBackground, $pointsHeader);
  $image->drawImage($textBoxHeader);


  /* Text box */
  $pointsBox = [
        ['x' => 50, 'y' => 100 * 5],
        ['x' => 850, 'y' => 100 * 5], 
        ['x' => 850, 'y' => 130 * 5],
        ['x' => 50, 'y' => 130 * 5],
    ];
  $textBox = polygon(none, $backgroundColor, $pointsBox);
  $image->drawImage($textBox);

  /* Header text */
  // Set text color
  $draw->setFillColor('white');
  // Set font properties
  $draw->setFont('fonts/D-DINCondensed-Bold.otf');
  $draw->setFontSize( 45 );
  //$draw->setTextUnderColor($backgroundColor); 
// Create text @annotateImage($propeties, $x, $y, $angle, $text)
  $image->annotateImage($draw, 70, 490, 0, strtoupper($textHeader) );

  /* Program name*/
  $image->annotateImage($draw, 70, 550, 0, strtoupper($programNameRow1) );
  $image->annotateImage($draw, 70, 595, 0, strtoupper($programNameRow2) );

  /* Start date */
  $draw->setFont('fonts/D-DINExp.otf');
  $draw->setFontSize( 24 );
  $draw->setTextKerning(3);
  $image->annotateImage($draw, 70, 635, 0, strtoupper($startDate) );


  /* Final steps for display */
  // Give image a format
  $image->setImageFormat('png');
  // Output the image with headers
  header('Content-type: image/png');
  echo $image;

  $image->writeImage(realpath('Img/try1.png'));


 /*
    $backgroundColor = "rgb(255, 255, 255)";
    $fuzzFactor = 0.1;
 
    // Create a copy of the image, and paint all the pixels that
    // are the background color to be transparent
    $outlineImagick = clone $imagick;
    $outlineImagick->transparentPaintImage(
        $backgroundColor, 0, $fuzzFactor * \Imagick::getQuantum(), false
    );
     
    // Copy the input image
    $mask = clone $imagick;
    // Deactivate the alpha channel if the image has one, as later in the process
    // we want the mask alpha to be copied from the colour channel to the src
    // alpha channel. If the mask image has an alpha channel, it would be copied
    // from that instead of from the colour channel.
    $mask->setImageAlphaChannel(\Imagick::ALPHACHANNEL_DEACTIVATE);
    //Convert to gray scale to make life simpler
    $mask->transformImageColorSpace(\Imagick::COLORSPACE_GRAY);
 
    // DstOut does a "cookie-cutter" it leaves the shape remaining after the
    // outlineImagick image, is cut out of the mask.
    $mask->compositeImage(
        $outlineImagick,
        \Imagick::COMPOSITE_DSTOUT,
        0, 0
    );
     
    // The mask is now black where the objects are in the image and white
    // where the background is.
    // Negate the image, to have white where the objects are and black for
    // the background
    $mask->negateImage(false);
 
    $fillPixelHoles = false;
     
    if ($fillPixelHoles == true) {
        // If your image has pixel sized holes in it, you will want to fill them
        // in. This will however also make any acute corners in the image not be
        // transparent.
         
        // Fill holes - any black pixel that is surrounded by white will become
        // white
        $mask->blurimage(2, 1);
        $mask->whiteThresholdImage("rgb(10, 10, 10)");
 
        // Thinning - because the previous step made the outline thicker, we
        // attempt to make it thinner by an equivalent amount.
        $mask->blurimage(2, 1);
        $mask->blackThresholdImage("rgb(255, 255, 255)");
    }
 
    //Soften the edge of the mask to prevent jaggies on the outline.
    $mask->blurimage(2, 2);
 
    // We want the mask to go from full opaque to fully transparent quite quickly to
    // avoid having too many semi-transparent pixels. sigmoidalContrastImage does this
    // for us. Values to use were determined empirically.
    $contrast = 15;
    $midpoint = 0.7 * \Imagick::getQuantum();
    $mask->sigmoidalContrastImage(true, $contrast, $midpoint);
 
    // Copy the mask into the opacity channel of the original image.
    // You are probably done here if you just want the background removed.
    $imagick->compositeimage(
        $mask,
        \Imagick::COMPOSITE_COPYOPACITY,
        0, 0
    );
 
    // To show that the background has been removed (which is difficult to see
    // against a plain white webpage) we paste the image over a checkboard
    // so that the edges can be seen.
     
    // Create the check canvas
    $canvas = new \Imagick();
    $canvas->newPseudoImage(
        $imagick->getImageWidth(),
        $imagick->getImageHeight(),
        "pattern:checkerboard"
    );
 
    // Copy the image with the background removed over it.
    $canvas->compositeimage($imagick, \Imagick::COMPOSITE_OVER, 0, 0);
     
    //Output the final image
    $canvas->setImageFormat('png');
    

    header("Content-Type: image/png");
    echo $canvas->getImageBlob();


*/


?>