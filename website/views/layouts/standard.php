<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
    // we use the view helper here to have the cache buster functionality
    $this->headLink()->appendStylesheet('/website/static/bootstrap/css/bootstrap.css');
    $this->headLink()->appendStylesheet('/website/static/css/global.css');
    $this->headLink()->appendStylesheet('/website/static/lib/video-js/video-js.min.css', "screen");
    $this->headLink()->appendStylesheet('/website/static/lib/magnific/magnific.css', "screen");

    if($this->editmode) {
        $this->headLink()->appendStylesheet('/website/static/css/editmode.css', "screen");
    }
?>

<?= $this->headLink(); ?>

</head>

<body>

<?= $this->layout()->content ?>

<?php

    // global scripts, we use the view helper here to have the cache buster functionality
    $this->headScript()->appendFile('/website/static/js/jquery-1.11.0.min.js');
    $this->headScript()->appendFile('/website/static/bootstrap/js/bootstrap.js');
    $this->headScript()->appendFile('/website/static/lib/magnific/magnific.js');
    $this->headScript()->appendFile('/website/static/lib/video-js/video.js');
    $this->headScript()->appendFile('/website/static/js/srcset-polyfill.min.js');

    echo $this->headScript();
?>

</body>
</html>
