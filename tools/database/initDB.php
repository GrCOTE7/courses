<?php

/**
 * [@param] bool $seed 1 → Seeds data.
 */
function initDB(bool $seed = false): void
{
	$operations = ['migration'];
	if ($seed) {
		array_push($operations, 'seed');
	}

	require_once __DIR__ . '/config.php';

	$migration = ['foreignKeysDrop', 'users', 'agendas', 'events', 'agendaEvent', 'agendaUser', 'foreignKeys'];
	// $migration = ['users', 'agendas', 'events', 'agendaEvent', 'agendaUser', 'foreignKeys'];

	$seed = ['users', 'agendas', 'events', 'agendaEvent', 'agendaUser'];

	// To completely reset database, uncomment the line above
	// require_once __DIR__ . '/migrations/dbResetMigration.php';

	foreach ($operations as $operation) {
		foreach (${$operation} as $data) {
			require_once $operation . 's/' . $data . ucfirst($operation) . '.php';
			foreach ($sqls as $sql) {
				try {
					req($sql);
				} catch (Exception $e) {
					echo 'Erreur : ' . $e->getMessage() . '<br />';
				}
			}
		}
	}
}
