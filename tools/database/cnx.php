<?php

require_once __DIR__ . '/config.php';

try {
	$connection = new PDO(
		'mysql:host=' . CONFIG['database']['host'] . ';dbname=' . CONFIG['database']['name'] . ';charset=utf8',
		CONFIG['database']['user'],
		CONFIG['database']['password']
	);
} catch (\Exception $e) {
	exit('Erreur : ' . $e->getMessage());
}