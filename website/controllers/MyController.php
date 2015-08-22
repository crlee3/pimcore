<?php


use Website\Controller\Action;
use Pimcore\Model\Asset;

class MyController extends Action {

    public function defaultAction () {
        $this->enableLayout();
    }
}
