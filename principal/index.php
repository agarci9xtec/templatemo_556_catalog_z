<!DOCTYPE html>
<?php
function getimage($src)
{
$image = imagecreatefromjpeg($src);
$filename = 'images/cropped_whatever.jpg';

$thumb_width = 200;
$thumb_height = 150;

$width = imagesx($image);
$height = imagesy($image);

$original_aspect = $width / $height;
$thumb_aspect = $thumb_width / $thumb_height;

if ( $original_aspect >= $thumb_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_height = $thumb_height;
   $new_width = $width / ($height / $thumb_height);
}
else
{
   // If the thumbnail is wider than the image
   $new_width = $thumb_width;
   $new_height = $height / ($width / $thumb_width);
}

$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

// Resize and crop
imagecopyresampled($thumb,
                   $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);
imagejpeg($thumb, $filename, 80);
}


function getimage2($src)
{
    // Create an image from given image
$im = imagecreatefrompng($src);
      
    // find the size of image
    $size = min(imagesx($im), imagesy($im));
      
    // Set the crop image size 
    $im2 = imagecrop($im, ['x' => 0, 'y' => 0, 'width' => 250, 'height' => 150]);
    if ($im2 !== FALSE) {
        header("Content-type: image/png");
           imagepng($im2);
        imagedestroy($im2);
    }
    imagedestroy($im);
    
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog-Z Bootstrap 5.0 HTML Template</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/estils.css">
    <link rel="stylesheet" href="css/templatemo-style.css">


    <script src="js/filter.js" defer=""></script>
    <!--
        
        TemplateMo 556 Catalog-Z
        
        https://templatemo.com/tm-556-catalog-z
        
    -->
</head>

<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
        
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="img/LOGO_Inscastellet.png" alt="Institut Castellet" class="img-fluid logo">
                Institut Casallet
            </a>

            <h2>Projectes HTML5+CSS3 de 1er SMiX M08UF5</h2>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

        </div>
    </nav>
    
    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/descarga.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
        </form>
    </div>
    <div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Els vostres projectes          </h2>
            <div class="row tm-mb-90 tm-gallery">

            <?php 
    foreach(glob('../*', GLOB_ONLYDIR) as $dir) {
         $dirname = basename($dir);
         if ($dirname=="principal") continue;
         

         $project_name=explode("_",$dirname);
         if (isset($project_name[1])){
            $author=$project_name[1];
         }else{
            $author="";
         }
         
         $project_name=$project_name[0];
         $dirname="../".$dirname;
         if (file_exists($dirname."/portada.jpg")) $thumb=$dirname."/portada.jpg";
         if (file_exists($dirname."/portada.png")) $thumb=$dirname."/portada.png";
         if (file_exists($dirname."/thumb.jpg")) $thumb=$dirname."/thumb.jpg";
         if (file_exists($dirname."/thumb.png")) $thumb=$dirname."/thumb.png";
        ?>
            
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5 project" project-name="<?php echo $project_name ?>">
                    <figure class="effect-ming tm-video-item">
                        <img src="<?php echo $thumb?>" alt="Image" class="img-fluid">
                        <figcaption class="d-flex align-items-center justify-content-center">
                            <h2><?php echo $project_name ?><span class="autora"><?php echo $author ?></span></h2>
                            
                            <a href="<?php echo $dirname ?>/">View more</a>
                        </figcaption>                    
                    </figure>
                </div>
      <?php      }
    ?>
   
            </div> <!-- row -->
        </div> 
        <!-- container-fluid, tm-container-content -->
        
        <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
            <div class="container-fluid tm-container-small">
                <div class="row">
                    <div class="col-lg-10 col-md-12 col-12 px-5 mb-5 project" project-name="<?php echo $project_name ?>">
                        <h3 class="tm-text-primary mb-4 tm-footer-title">Projectes HTML5+CSS3</h3>
                        <p>Projectes HTML5+CSS3 és un catàleg dels projectes desenvolupats pels alumnes de 1er SMiX per l'assignatura M08UF5, a <a rel="sponsored" target="_blank" href="http://inscastellet.cat/cfgm-informatica/">l'Institut Castellet</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                        Copyright 2022 Catalog-Z Company. All rights reserved.
                    </div>
                    <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                        Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
                    </div>
                </div>
            </div>
        </footer>
        
        <script src="js/plugins.js"></script>
        <script>
            $(window).on("load", function() {
                $('body').addClass('loaded');
            });
        </script>
    </body>
    </html>