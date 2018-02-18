<?php

include_once (ROOT.'/models/Map.php');

class MapController
{
    public function actionIndex()
    {
    	$array = Map::getMap();
    	if (!$array)
    		return false;
        require_once(ROOT.'/views/map/index.php');
        return true;
    }
}
