<?php
  
  include("polygon.php");

  // Taking variables from form
  if(isset($_POST["programName1"])){
    $programNameRow1      = $_POST["programName1"];
  }else{
    $programNameRow1      = strtoupper("Gestión Ágil de Proyectos");
  }
  if(isset($_POST["programName2"])){
    $programNameRow2      = $_POST["programName2"];
  }else{
    $programNameRow2      = strtoupper("para acelerar la transformaciÓn digital");
  }
  if(isset($_FILE["hero"]["name"])){
    $image                = new \Imagick($_FILE["hero"]["name"]);
  }else{
    $image                = new \Imagick(realpath("Img/hero.jpg"));
  }
  if(isset($_FILE["colaborador"]["name"])){
    $colaborador          = TRUE;
  }else{
    $colaborador          = FALSE;
  }
  if(isset($_POST["programType"])){
    $textHeader           = "/ ".$_POST["programType"];
  }else{
    $textHeader           = "/ CURSO";
  }
  if(isset($_POST["facultyCode"])){
    $facultyCode          = $_POST["facultyCode"];
  }else{
    // env is for "Escuela de negocios"
    $facultyCode          = "env";
  }
  if(isset($_POST["startDate"])){
    setlocale(LC_ALL, 'es_CL.UTF-8');
    $startDate            = "INICIO: ".date("j", strtotime($_POST["startDate"]))
                            ." DE ".strftime('%B', strtotime($_POST["startDate"]))
                            ." DE ".date("Y", strtotime($_POST["startDate"]));
  }else{
    // env is for "Escuela de negocios"
    $startDate            = "INICIO: 29 DE OCTUBRE DE 2018";
  }
  
  //Load the logo
  $logoUAI                = new \Imagick(realpath("Img/logoUAI.png"));
  //Draw another image
  $draw                   = new ImagickDraw();
  $backgroundColor        = "#cc00c0";
  

  $image->resizeImage(1200,627,Imagick::FILTER_LANCZOS,1);
  if($colaborador){
    $facultyLogo        = new \Imagick(realpath("Img/".$facultyCode."-der.png"));
    $facultyLogo->resizeImage(259,100,Imagick::FILTER_LANCZOS,1);
    $image->compositeImage($facultyLogo, \Imagick::COMPOSITE_DEFAULT, 600, 50);

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
  $image->compositeImage($logoUAI, \Imagick::COMPOSITE_DEFAULT, 900, 50);
  


  /* Header of text box */
  $headerBackground = $backgroundColor."cc";
  $pointsHeader = [
    ["x" => 50, "y" => 90 * 5 - 55],
    ["x" => 800, "y" => 90 * 5 - 55], 
    ["x" => 850, "y" => 100 * 5 - 50], 
    ["x" => 50, "y" => 100 * 5 - 50],
  ];
  $textBoxHeader = polygon(none, $headerBackground, $pointsHeader);
  $image->drawImage($textBoxHeader);


  /* Text box */
  $pointsBox = [
        ["x" => 50, "y" => 100 * 5 - 50],
        ["x" => 850, "y" => 100 * 5 - 50], 
        ["x" => 850, "y" => 130 * 5 - 50],
        ["x" => 50, "y" => 130 * 5 - 50],
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
  $image->annotateImage($draw, 70, 490 - 50, 0, $textHeader );

  /* Program name*/
  $image->annotateImage($draw, 70, 550 - 50, 0, $programNameRow1 );
  $image->annotateImage($draw, 70, 595 - 50, 0, $programNameRow2 );

  /* Start date */
  $draw->setFont("fonts/D-DINExp.otf");
  $draw->setFontSize( 24 );
  $draw->setTextKerning(3);
  $image->annotateImage($draw, 70, 635 - 50, 0, strtoupper($startDate) );


  /* Final steps for display */
  // Give image a format
  $image->setImageFormat("png");
  // Output the image with headers
  header("Content-type: image/png");
  echo $image;

  //Save image
  //$image->writeImage("Img/try1.png");


?>