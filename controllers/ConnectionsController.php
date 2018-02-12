<?php

include_once (ROOT.'/models/Profile.php');
include_once (ROOT.'/models/Connections.php');

class ConnectionsController
{
    public function actionIndex()
    {
    	$conns = array();
    	$conn_ids = Connections::getConnections();
    	foreach ($conn_ids as $value)
    		$conns[] = Profile::getUserInfo($value);

    	$active = "connections";
        require_once(ROOT.'/views/connections/index.php');
        return true;
    }
}
