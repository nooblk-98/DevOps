<?php

// define('HTTP_PATH', 'http://sites.local/freudenbergleisure/app/');
// define('DOC_ROOT', '/home/srimal/sites/freudenbergleisure/app/');

$siteKey = '6LelSBUUAAAAAAmNoIsbdYqC2Z13RNlwD5LV60YV';
$secret = '6LelSBUUAAAAAB6_Cw6AAjj7etuJlwOz8sJEdmhi';

define('MG_PRV_KEY','key-d4a34e95dbd0f5c92b46b31046501f5b');
define('MG_PUB_KEY','pubkey-6396e13810a4ed2143af439b030395df');
define('MG_DOMAIN','freudenbergleisure.lk');

define('RECAPTCHA_SITEKEY','6LelSBUUAAAAAAmNoIsbdYqC2Z13RNlwD5LV60YV');
define('RECAPTCHA_SECRET','6LelSBUUAAAAAB6_Cw6AAjj7etuJlwOz8sJEdmhi');

define('DEV_EMAIL','a3csdev@gmail.com');

define('WEB_HOOK_SLACK','https://hooks.slack.com/services/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');
define('SLACK_CHANNEL','#freudenberg-leisure');

define('MAIN_URL', 'http://localhost/');

$search_engine_data = array(
	'main' => array(
		'api_key'=> ' AIzaSyDeSh8EXGnARj7WV0sX4glfJY5Gu7UMm2o',
		'se_id' => '016178172283173824195:0npr4vgqcxi'
	),
	'firs' => array(
		'api_key' => 'AIzaSyBJJuqZqViQIJpfAw0lZZGXtmGlHHBCNJg',
		'se_id' => '014796383157145157001:w2ycguv2mvw'
	),
	'ellens' => array(
		'api_key' => 'AIzaSyBDTlq0l2mOJ5POKUFTxQONlD1EglaC3Y0',
		'se_id' => '014796383157145157001:a0awpwpwbfg'
	),
	'randholee' => array(
		'api_key' => 'AIzaSyDX2MvAGHqfqSkqVO5iXnt8lOjZcgBK_qA',
		'se_id' => '014796383157145157001:jzj4s7vou_o'
	)
);

$contact_mail_ellens = array('info@ellensplace.lk', 'vikum@fsalk.com', 'mgr.sales@freudenbergleisure.com', 'manager@ellensplace.lk', 'sales@freudenbergleisure.com');

$contact_mail_firs = array('info@firs.lk', 'vikum@fsalk.com', 'mgr.sales@freudenbergleisure.com', 'manager@firs.lk', 'accounts@firs.lk', 'sales@freudenbergleisure.com');

$contact_mail_randholee = array('reservations@randholeeresorts.com', 'vikum@fsalk.com', 'foe@randholeeresorts.com', 'mgr.sales@freudenbergleisure.com','sales@freudenbergleisure.com');

$contact_mail_main = array('reservation@freudenbergleisure.com','vikum@fsalk.com', 'sales@freudenbergleisure.com', 'mgr.sales@freudenbergleisure.com');

	// database config
	//my db
	$config['db'] = [
			'host' => 'mysql-common-db',
			'database' => 'freudenberg_php_2023',
			'username' => 'freudenberg_php_2023',
			'password' => 'cPdapNQJXz7ljSKs44HgNLDuZotwnA'
	];
?>