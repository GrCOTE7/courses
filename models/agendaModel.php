<?php

/**
 * (ɔ) Online FORMAPRO - Laggy - 2022.
 */

function getAgendas(): array
{
	return req('select * from users');
}

function getAgenda(int $id): array
{
	return req('select * from agenda where id=?', [$id]);
}