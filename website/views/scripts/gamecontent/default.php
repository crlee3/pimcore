<?php $this->layout()->setLayout('standard'); ?>

<h1><?= $this->input("headline", array("width" => 540)); ?></h1>

<?php while ($this->block("contentblock")->loop()) { ?>
    <h2><?= $this->input("subline"); ?></h2>
    <?= $this->wysiwyg("content"); ?>
<?php } ?>
