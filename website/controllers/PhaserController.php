<?php


use Website\Controller\Action;
use Pimcore\Model\Asset;

class PhaserController extends Action {

    public function defaultAction () {
        $this->enableLayout();
    }
}
