<?php

define('PUBNUB_LIB_BASE_DIR', __DIR__);

function pubnubAutoloader($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';

    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName .= str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }

    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    $fileName = PUBNUB_LIB_BASE_DIR.DIRECTORY_SEPARATOR.$fileName;

    if(file_exists($fileName)){
      require_once $fileName;
    }
}

spl_autoload_register('pubnubAutoloader', true, true);

use Pubnub\Pubnub;

function pushPublishUpdate($resourceId)
{
	$pushServiceSubscriptionKey = "sub-c-8f44a3e2-3fb9-11e7-b730-0619f8945a4f";
	$pushServicePublishKey = "pub-c-dc18fd78-1d30-45d2-bba8-40f6ab48083c";
	
	$pushServiceChannel = 'channel_resource_' . $resourceId;
    $message = "update" ;
    $pubnub = new Pubnub([
        "subscribe_key" =>$pushServiceSubscriptionKey,
        "publish_key" => $pushServicePublishKey
    ]);
    $result = $pubnub->publish($pushServiceChannel,$message) ;
}
