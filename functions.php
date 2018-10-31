<?php

//This function crop an image with different focus
function thumbnail($image, $new_w, $new_h, $focus = 'center')
{
    $w = $image->getImageWidth();
    $h = $image->getImageHeight();

    if ($w > $h) {
        $resize_w = $w * $new_h / $h;
        $resize_h = $new_h;
    }
    else {
        $resize_w = $new_w;
        $resize_h = $h * $new_w / $w;
    }
    $image->resizeImage($resize_w, $resize_h, Imagick::FILTER_LANCZOS, 0.9);

    if($focus=='northwest') {
        $image->cropImage($new_w, $new_h, 0, 0);
    }elseif ($focus=='center') {
        $image->cropImage($new_w, $new_h, ($resize_w - $new_w) / 2, ($resize_h - $new_h) / 2);
    }elseif ($focus=='northeast') {
        $image->cropImage($new_w, $new_h, $resize_w - $new_w, 0);
    }elseif ($focus=='southwest') {
        $image->cropImage($new_w, $new_h, 0, $resize_h - $new_h);
    }elseif ($focus=='southeast') {        
        $image->cropImage($new_w, $new_h, $resize_w - $new_w, $resize_h - $new_h);
    }
    return $image;
}

?>