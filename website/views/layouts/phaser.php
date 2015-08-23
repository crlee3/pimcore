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

    echo $this->headScript();
?>

<script type="text/javascript">

window.onload = function() {

    // This is our game object. We will use this game object with great fun!
    var game = new Phaser.Game(800, 600, Phaser.AUTO, '', { preload: preload, create: create, update: update });

    var player;
    var platforms;
    var cursors;

    var stars;

    var star_count = 12;
    var stars_collected = 0;

    var player_wins = false;

    // This function is called before the create function and allows us to prepare certain things for the game process
    function preload () {

        game.load.image('logo', '/website/static/phaser/img/phaser.png');

        game.load.image('sky', '/website/static/phaser/img/sky.png');
        game.load.image('ground', '/website/static/phaser/img/platform.png');
        game.load.image('star', '/website/static/phaser/img/star.png');
        game.load.spritesheet('dude', '/website/static/phaser/img/dude.png', 32, 48);

    }

    function create () {

        // TODO: Make a loading screen
        // var logo = game.add.sprite(game.world.centerX, game.world.centerY, 'logo');


        //  We're going to be using physics, so enable the Arcade Physics system
        game.physics.startSystem(Phaser.Physics.ARCADE);

        //  A simple background for our game
        game.add.sprite(0, 0, 'sky');

        //  The platforms group contains the ground and the 2 ledges we can jump on
        platforms = game.add.group();

        //  We will enable physics for any object that is created in this group
        platforms.enableBody = true;

        // Here we create the ground.
        var ground = platforms.create(0, game.world.height - 64, 'ground');

        //  Scale it to fit the width of the game (the original sprite is 400x32 in size)
        ground.scale.setTo(2, 2);

        //  This stops it from falling away when you jump on it
        ground.body.immovable = true;

        //  Now let's create two ledges
        var ledge = platforms.create(400, 400, 'ground');

        ledge.body.immovable = true;

        ledge = platforms.create(-150, 250, 'ground');

        ledge.body.immovable = true;

        // The player and its settings
        player = game.add.sprite(32, game.world.height - 150, 'dude');

        //  We need to enable physics on the player
        game.physics.arcade.enable(player);

        //  Player physics properties. Give the little guy a slight bounce.
        player.body.bounce.y = 0.2;
        player.body.gravity.y = 300;
        player.body.collideWorldBounds = true;

        //  Our two animations, walking left and right.
        player.animations.add('left', [0, 1, 2, 3], 10, true);
        player.animations.add('right', [5, 6, 7, 8], 10, true);

        //  Finally some stars to collect
        stars = game.add.group();

        //  We will enable physics for any star that is created in this group
        stars.enableBody = true;

        //  Here we'll create 12 of them evenly spaced apart
        for (var i = 0; i < star_count; i++)
        {
            //  Create a star inside of the 'stars' group
            var star = stars.create(i * 70, 0, 'star');

            //  Let gravity do its thing
            star.body.gravity.y = 300;

            //  This just gives each star a slightly random bounce value
            star.body.bounce.y = 0.7 + Math.random() * 0.2;
        }

        //  Our controls.
        cursors = game.input.keyboard.createCursorKeys();

    }

    function update () {

        if (stars_collected > 11 && player_wins == false) {
            alert("YOU WIN!");
            player_wins = true;
        }

        // We use this to check game input during the update function.
        // cursors = game.input.keyboard.createCursorKeys();

        //  Collide the player and the stars with the platforms
        game.physics.arcade.collide(player, platforms);
        game.physics.arcade.collide(stars, platforms);

        //  Checks to see if the player overlaps with any of the stars, if he does call the collectStar function
        game.physics.arcade.overlap(player, stars, collectStar, null, this);

        //  Reset the players velocity (movement)
        player.body.velocity.x = 0;

        if (cursors.left.isDown) {

           //  Move to the left
           player.body.velocity.x = -150;

           player.animations.play('left');

        } else if (cursors.right.isDown) {

           //  Move to the right
           player.body.velocity.x = 150;

           player.animations.play('right');

        } else {

           //  Stand still
           player.animations.stop();

           player.frame = 4;

        }

        //  Allow the player to jump if they are touching the ground.
        if (cursors.up.isDown && player.body.touching.down){

           player.body.velocity.y = -350;

        }

    }

    function collectStar (player, star) {

        // Removes the star from the screen
        star.kill();
        stars_collected += 1;

    }
};

</script>
<script src="//cdn.jsdelivr.net/phaser/2.4.2/phaser.min.js"></script>
</body>

</html>
