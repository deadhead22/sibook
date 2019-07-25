<?php
defined('BASEPATH') OR exit('No direct script access allowed');

return array(

	'config' => array(
		'base_url' => 'http://localhost/classroombookings/',
		'log_threshold' => 1,
		'index_page' => 'index.php',
		'uri_protocol' => 'REQUEST_URI',
	),

	'database' => array(
		'dsn' => 'mysql:host=localhost;dbname=classroombooking',
		'hostname' => '',
		'username' => 'crbs',
		'password' => 'crbs123',
		'database' => '',
		'dbdriver' => 'pdo',
	),

);
