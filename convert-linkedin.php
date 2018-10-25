<?php
  
  include("polygon.php");

  //Load the hero
  $image                = new \Imagick(realpath("Img/hero.jpg"));
  $logoUAI              = new \Imagick(realpath("Img/logoUAI.png"));
  //Draw another image
  $draw                 = new ImagickDraw();
  $backgroundColor      = "#cc00c0";
  $textHeader           = "/ CURSO";
  $programNameRow1      = "Gestión Ágil de Proyectos áéíóúü";
  $programNameRow2      = "para acelerar la transformaciÓn digital";
  $startDate            = "INICIO: 29 DE OCTUBRE DE 2018";
  
  // env is for "Escuela de negocios"
  $facultyCode          = "env";
  $colaborador          = FALSE;
  if($colaborador){
    $facultyLogo        = new \Imagick(realpath("Img/".$facultyCode."-der.png"));
    $facultyLogo->resizeImage(259,100,Imagick::FILTER_LANCZOS,1);
    $image->compositeImage($facultyLogo, \Imagick::COMPOSITE_DEFAULT, 650, 50);

    $logoColaborador    = new \Imagick(realpath("Img/colaborador.png"));
    $logoColaborador->resizeImage(150,100,Imagick::FILTER_LANCZOS,1);
    $image->compositeImage($logoColaborador, \Imagick::COMPOSITE_DEFAULT, 0, 50);
    
  }else{
    $facultyLogo        = new \Imagick(realpath("Img/".$facultyCode."-iz.png"));
    $facultyLogo->resizeImage(259,100,Imagick::FILTER_LANCZOS,1);
    $image->compositeImage($facultyLogo, \Imagick::COMPOSITE_DEFAULT, 0, 50);
  }
  $logoUAI->resizeImage(330,100,Imagick::FILTER_LANCZOS,1);

  $image->setImageVirtualPixelMethod(Imagick::VIRTUALPIXELMETHOD_TRANSPARENT);
  $image->setImageArtifact("compose:args", "1,0,-0.5,0.5");
  $logoUAI->resizeImage(300,100,Imagick::FILTER_LANCZOS,1);
  $image->compositeImage($logoUAI, \Imagick::COMPOSITE_DEFAULT, 950, 50);
  


  /* Header of text box */
  $headerBackground = $backgroundColor."cc";
  $pointsHeader = [
    ["x" => 50, "y" => 90 * 5],
    ["x" => 800, "y" => 90 * 5], 
    ["x" => 850, "y" => 100 * 5], 
    ["x" => 50, "y" => 100 * 5],
  ];
  $textBoxHeader = polygon(none, $headerBackground, $pointsHeader);
  $image->drawImage($textBoxHeader);


  /* Text box */
  $pointsBox = [
        ["x" => 50, "y" => 100 * 5],
        ["x" => 850, "y" => 100 * 5], 
        ["x" => 850, "y" => 130 * 5],
        ["x" => 50, "y" => 130 * 5],
    ];
  $textBox = polygon(none, $backgroundColor, $pointsBox);
  $image->drawImage($textBox);

  /* Header text */
  // Set text color
  $draw->setFillColor("white");
  // Set font properties
  $draw->setFont("fonts/D-DINCondensed-Bold.otf");
  $draw->setFontSize( 45 );
  //$draw->setTextUnderColor($backgroundColor); 
// Create text @annotateImage($propeties, $x, $y, $angle, $text)
  $image->annotateImage($draw, 70, 490, 0, strtoupper($textHeader) );

  /* Program name*/
  $image->annotateImage($draw, 70, 550, 0, strtoupper($programNameRow1) );
  $image->annotateImage($draw, 70, 595, 0, strtoupper($programNameRow2) );

  /* Start date */
  $draw->setFont("fonts/D-DINExp.otf");
  $draw->setFontSize( 24 );
  $draw->setTextKerning(3);
  $image->annotateImage($draw, 70, 635, 0, strtoupper($startDate) );


  /* Final steps for display */
  // Give image a format
  $image->setImageFormat("png");
  // Output the image with headers
  header("Content-type: image/png");
  echo $image;

  //Save image
  //$image->writeImage("Img/try1.png");


?>