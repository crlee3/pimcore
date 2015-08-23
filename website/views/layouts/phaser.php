<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
    // // we use the view helper here to have the cache buster functionality
    // $this->headLink()->appendStylesheet('/website/static/bootstrap/css/bootstrap.css');
    // $this->headLink()->appendStylesheet('/website/static/css/global.css');
    // $this->headLink()->appendStylesheet('/website/static/lib/video-js/video-js.min.css', "screen");
    // $this->headLink()->appendStylesheet('/website/static/lib/magnific/magnific.css', "screen");
    //
    // if($this->editmode) {
    //     $this->headLink()->appendStylesheet('/website/static/css/editmode.css', "screen");
    // }
?>

<?= $this->headLink(); ?>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="/website/static/js/html5shiv.js"></script>
<script src="/website/static/js/respond.min.js"></script>
<![endif]-->

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
    $this->headScript()->appendFile('/website/static/phaser/js/phaser.min.js');

    echo $this->headScript();
?>

<script type="text/javascript">

window.onload = function() {

    var game = new Phaser.Game(800, 600, Phaser.AUTO, '', { preload: preload, create: create, update: update, listener: listener });

    function preload () {

        // game.load.image('logo', '/website/static/phaser/img/phaser.png');

        game.load.image('sky', '/website/static/phaser/img/sky.png');
        game.load.image('ground', '/website/static/phaser/img/platform.png');
        game.load.image('star', '/website/static/phaser/img/star.png');
        game.load.spritesheet('dude', '/website/static/phaser/img/dude.png', 32, 48);

    }

    function create () {

        // var logo = game.add.sprite(game.world.centerX, game.world.centerY, 'logo');
        // logo.anchor.setTo(0.5, 0.5);

        game.add.sprite(0, 0, 'star');

    }

    function update () {



    }

	function listener () {


	}

};

</script>

</body>

</html>
