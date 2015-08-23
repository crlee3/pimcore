<?php $this->layout()->setLayout('standard'); ?>

<h1><?= $this->input("headline", ["width" => 540]); ?></h1>

<?= $this->areablock("content"); ?>

<?php while ($this->block("contentblock")->loop()) { ?>
    <h2><?= $this->input("subline"); ?></h2>
    <?= $this->wysiwyg("content"); ?>
<?php } ?>
