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
	echo 'create sale order';

	$models = new Client("$url/xmlrpc/2/object");
	$models->setSkipSystemLookup(true);
	$ids = $models->call('execute_kw', [
		$db, 
		$uid, 
		$password, 
		'sale.order', 
		'create', 
		array(
			array(
				'x_code'=>'SO-MAG/000001',
				'partner_code'=>'MAGC-0000001', 
				'order_line'=>array(
					array('product_code'=>'F-000001', 'product_uom_qty'=>10),
					array('product_code'=>'D-000001', 'product_uom_qty'=>15),
				),
			)
		),
		array(
			'context'=>array('from_magento'=>true),
		),
	]);
	echo '<pre/>';
	print_r($ids);