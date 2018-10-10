<?php

function polygon($strokeColor, $fillColor, $points) {

    $draw = new \ImagickDraw();

    $draw->setStrokeOpacity(1);
    $draw->setStrokeColor($strokeColor);
    $draw->setStrokeWidth(4);

    $draw->setFillColor($fillColor);

    $draw->polygon($points);

    return $draw;
    //header("Content-Type: image/png");
    //echo $image->getImageBlob();
}

?>