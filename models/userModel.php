<?php

function getUsers(): array
{
    return req('select * from users');
}

function getUser(int $id): array
{
    return req('select * from users where id=?', [$id]);
}

/**
 * Return true if user exists else false.
 */
function userExists(string $username, string $pw): bool
{
    return (bool) req('
		select 
		case when 
		count(*) > 0
		then true else false end as userExists
		from users where username = "' . $username . '" and password = "' . $pw . '";')[0]['userExists'];
}
/**
 * Return id if user exists else 0.
 */
function getIdIfUserExists(string $username, string $pw): int
{
    return (req('select id from users where username = ? and password = ?', [
        $username, $pw
    ])[0]['id']??0);
}
