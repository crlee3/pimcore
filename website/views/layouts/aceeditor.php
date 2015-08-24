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
<style type="text/css" media="screen">
    #editor {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>
<div id="editor">function foo(items) {
    var x = "All this is syntax highlighted";
    return x;
}</div>

<script src="/website/static/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("/website/static/ace-builds/ace/theme/monokai");
    editor.getSession().setMode("/website/static/ace-builds/ace/mode/javascript");
</script>
</body>
</html>
