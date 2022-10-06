<?php

try { // Connection whithout dbname
	$connection = new PDO(
		'mysql:host=' . CONFIG['database']['host'] . ';charset=utf8',
		CONFIG['database']['user'],
		CONFIG['database']['password']
	);
} catch (\Exception $e) {
	exit('Erreur : ' . $e->getMessage());
}

$dbname = CONFIG['database']['name'];

$sqls = [
	'DROP DATABASE IF EXISTS ' . $dbname . ';',
	
	'CREATE DATABASE IF NOT EXISTS ' . $dbname . ';',
	
	'USE ' . $dbname . ';',
];

foreach ($sqls as $k => $sql) {
	try {
		if (2 == $k || $k >= 0) {
			// aff($sql);
			$req = $connection->prepare($sql);
			$req->execute();
		}
	} catch (Exception $e) {
		echo 'Erreur : ' . $e->getMessage() . '<br />';
	}
}

array_shift($migration);