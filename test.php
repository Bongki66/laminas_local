<?php

	require_once 'vendor/autoload.php';
	use Laminas\XmlRpc\Client;
	use Laminas\XmlRpc\Client\Exception\HttpException;

	$url = "http://localhost:8069";
	$db = "skj_api";
	$username = "admin";
	$password = "admin";

	$client = new Client("$url/xmlrpc/2/common");
	// try {
	// 	$uid = $client->call('authenticate', [$db, $username, $password, array()]);
	// 	echo 'uid: '.$uid;
	// } catch (HttpException $e) {
	// 	echo $e->getMessage();
	// }
