<?php

include_once (ROOT.'/models/Model.php');

class ModelController
{
    public function actionIndex()
    {


        require_once(ROOT.'/views/model/index.php');
        return true;
    }
}