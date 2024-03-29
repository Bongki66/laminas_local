<?php

	require_once 'vendor/autoload.php';
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
	echo $uid;

	$models = new Client("$url/xmlrpc/2/object");
	$models->setSkipSystemLookup(true);
	$res_models = $models->call('execute_kw', [
		$db,
		$uid,
		$password,
		'res.partner',
		'check_access_rights',
		array('read'),
		array('raise_exception' => false)
	]);
	echo '<pre/>';
	echo $res_models;

	
