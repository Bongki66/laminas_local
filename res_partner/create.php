<?php

	require_once '../vendor/autoload.php';
	use Laminas\XmlRpc\Client;
	use Laminas\XmlRpc\Client\Exception\HttpException;

	$url = "http://localhost:8069";
	$db = "skj_api";
	$username = "admin";
	$password = "admin";

	$client = new Client("$url/xmlrpc/2/common");
	$client->setSkipSystemLookup(true);
	$uid = $client->call('authenticate', array($db, $username, $password, []));
	echo '<pre/>';
	echo 'uid: '.(string)$uid;
	echo '<pre/>';
	echo 'create res partner';

	$models = new Client("$url/xmlrpc/2/object");
	$models->setSkipSystemLookup(true);
	$ids = $models->call('execute_kw', [
		$db, 
		$uid, 
		$password, 
		'res.partner', 
		'create', 
		array(array('name'=>"Laminas 1"))
	]);
	echo '<pre/>';
	print_r($ids);
